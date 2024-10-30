<?php

namespace App\Services;

use App\Helpers\CartHelper;
use App\Models\Order;
use App\Models\PaymentMethod;
use CoinpaymentsAPI;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CoinPaymentsService
{
    protected CoinpaymentsAPI $api;

    protected $payments_method_detail;

    public function __construct()
    {
        $this->payments_method_detail = PaymentMethod::where('name','CoinPayments')->first();
        $this->api = new CoinpaymentsAPI($this->payments_method_detail->meta_info->api_secret, $this->payments_method_detail->meta_info->api_key, 'json');
    }

    public function processPayment(Order $order)
    {
        $transactionData = $this->getTransactionData($order, 'LTCT');
        $transaction = $this->createTransaction($transactionData);

        return isset($transaction['result']['checkout_url'])
            ? redirect($transaction['result']['checkout_url'])
            : redirect()->route('frontend.payment.error')->with('error', __trans('Something went wrong with CoinPayments'))->with('order', $order);
    }

    public function handleCallback(Request $request)
    {
        Log::info('CoinPayments IPN Callback received:', $request->all());

        if (!$this->isValidCallback($request)) {
            return response('Invalid request', 403);
        }

        $order = Order::find($request->input('custom'));
        if (!$order) {
            return response('Order not found', 404);
        }

        $this->updateOrderStatus($order, $request->input('status'), $request->input('txn_id'));
        CartHelper::clearDatabaseCart($order->user_id);
        return response('IPN handled', 200);
    }

    private function createTransaction(array $fields)
    {
        try {
            return $this->api->CreateCustomTransaction($fields);
        } catch (Exception $e) {
            throw new Exception("Transaction creation failed: " . $e->getMessage());
        }
    }

    private function getTransactionData(Order $order, string $currency)
    {
        return [
            'amount' => $order->total_price,
            'currency1' => $order->currency->code,
            'currency2' => $currency,
            'buyer_email' => $order->customer_contact_email,
            'buyer_name' => $order->customer->name ?? 'Guest',
            'custom' => (string) $order->id,
            'ipn_url' => route("frontend.payment.callback", ['method' => 'coinpayments']),
            'success_url' => route('frontend.payment.success', ['orderId' => $order->id]),
            'cancel_url' => route('frontend.payment.error') . '?payment_status=cancelled',
        ];
    }

    private function isValidCallback(Request $request): bool
    {
        $ipn_secret = $this->payments_method_detail->meta_info->ipn_secret;
        $merchant_id = $this->payments_method_detail->meta_info->merchant_id;

        return $request->header('HMAC') === hash_hmac('sha512', $request->getContent(), $ipn_secret)
            && $request->input('merchant') === $merchant_id;
    }

    private function updateOrderStatus(Order $order, int $status, string $transactionId): void
    {
        $orderService = new orderService(); // Ensure you have this service defined
        $orderService->setRecord($order); 

        switch ($status) {
            case $status >= 100:
                $orderService->updateStatus(2); // Mark as paid
                $orderService->saveOrderTransaction($transactionId, 'PAID');
                break;
            case $status < 0:
                $orderService->updateStatus(5); // Mark as cancelled
                $orderService->saveOrderTransaction($transactionId, 'CANCELLED');
                break;
            default:
                $orderService->saveOrderTransaction($transactionId, 'UNPAID');
                break;
        }
    }
}
