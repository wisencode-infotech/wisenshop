<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class MoneiPaymentService
{
    protected $moneiClient;

    public function __construct()
    {
        // Initialize the Monei client with your API key
        $this->moneiClient = new \Monei\MoneiClient('pk_test_8ac935c2a1083f011d458c63cbc348cd');
    }

    public function processPayment($order)
    {
        $user = $order->user;
        $moneiData = $this->prepareMoneiData($order, $user);

        $moneiResponse = $this->createPayment($moneiData);

        if (!empty($redirectUrl = $moneiResponse['next_action']->getRedirectUrl())) {
            return redirect($redirectUrl);
        }

        return redirect()->route('frontend.home')->with('error', __('Something went wrong with Monei payment'));
    }

    private function prepareMoneiData($order, $user)
    {
        return [
            'amount' => $order->total_price * 100, // Amount in cents
            'currency' => $order->currency->code,
            'orderId' => (string)$order->id,
            'description' => 'Order #' . $order->id,
            'callbackUrl' => route('frontend.payment.callback', ['method' => 'monei']),
            'completeUrl' => route('frontend.thank-you', [$order]),
            'failUrl' => route('frontend.payment-error', ['status' => 'failed']),
            'cancelUrl' => route('frontend.payment-error', ['status' => 'cancel']),
            'sessionId' => session()->id(),
            'generatePaymentToken' => true,
            'customer' => [
                'email' => $user->email ?? '',
                'name' => $user->name ?? '',
                'phone' => $user->phone ?? ''
            ]
        ];
    }

    private function createPayment(array $data)
    {
        try {
            $payment = $this->moneiClient->payments->create($data);

            if ($payment['status'] !== 'success') {
                Log::error('Monei API response status not OK: ' . $payment['status']);
            }

            return $payment;
        } catch (\Monei\Exception\RequestException $e) {
            Log::error('Monei Request Exception: ' . $e->getMessage());
            return [];
        } catch (\Exception $e) {
            Log::error('General error in Monei API call: ' . $e->getMessage());
            return [];
        }
    }

    public function handleCallback($request)
    {
        $payload = json_decode(file_get_contents('php://input'), true);
        $orderId = $payload['orderId'] ?? null;
        $status = $payload['status'] ?? null;
        $transactionId = $payload['id'] ?? null;

        if (!$orderId || !$status) {
            Log::error('Monei callback missing required order ID or status');
            return response()->json(['message' => 'Invalid callback data'], 400);
        }

        $order = Order::find($orderId);
        if (!$order) {
            Log::error('Order not found for callback', ['orderId' => $orderId]);
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Update order status based on callback status
        $this->updateOrderStatus($order, $status, $transactionId);
        return response()->json(['message' => 'Callback handled successfully'], 200);
    }

    private function updateOrderStatus(Order $order, $status, $transactionId)
    {
        $orderService = new OrderService();
        $orderService->setRecord($order);

        if ($status === 'SUCCEEDED') {
            $orderService->updateStatus(2); // Update status to "Paid"
            $orderService->saveOrderTransaction($transactionId, 'PAID');
            CartHelper::clearDatabaseCart($order->user_id);
        } else {
            $orderService->updateStatus(5); // Update status to "Failed"
            $orderService->saveOrderTransaction($transactionId, 'FAILED');
        }
    }
}
