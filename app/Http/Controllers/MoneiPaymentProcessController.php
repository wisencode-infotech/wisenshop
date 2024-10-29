<?php

namespace App\Http\Controllers;

use App\Helpers\CartHelper;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\OrderService;
use Illuminate\Support\Facades\Log;
use Monei\MoneiClient;

class MoneiPaymentProcessController extends Controller
{
    public function index(Order $order)
    {
        try {
            $user = $order->user;

            $monei_data = [
                'amount' => $order->total_price * 100, // Amount in cents
                'currency' => $order->currency->code,
                'orderId' => (string) $order->id,
                'description' => 'Order #'.$order->id,
                'callbackUrl' => route('frontend.moneipayments.callback'),
                'completeUrl' => route('frontend.thank-you', [ $order ]),
                'failUrl' => route('frontend.payment-error', [ 'status' => 'failed' ]),
                'cancelUrl' => route('frontend.payment-error', [ 'status' => 'cancel' ]),
                'sessionId' => session()->id(),
                'generatePaymentToken' => true,
                'customer' => [
                    'email' => $user->email ?? '',
                    'name' => $user->name ?? '',
                    'phone' => $user->phone ?? ''
                ]
            ];

            $monei_response = $this->createMoneiPayment($monei_data);

            if (!empty($redirect_url = $monei_response['next_action']->getRedirectUrl())) {
                return redirect($redirect_url); // Redirect to Monei payment page
            } else {
                return redirect()->route('frontend.home')->with('error', __('Something went wrong'));   
            }

        } catch (\Exception $e) {
            return redirect()->route('frontend.home')->with('error', $e->getMessage());
        }
    }

    private function createMoneiPayment($data)
    {
        try {
            $monei = new MoneiClient('pk_test_8ac935c2a1083f011d458c63cbc348cd');

            $payment = $monei->payments->create($data);

            if (isset($payment['status']) && $payment['status'] !== 'success') {
                Log::error('Monei API response status not OK: ' . $payment['status']);
            }

            return $payment;

        } catch (\Monei\Exception\RequestException $e) {
            Log::error('Monei API request failed: ' . $e->getMessage());
            if ($e->hasResponse()) {
                $errorResponse = $e->getResponse()->getBody()->getContents();
                Log::error('Monei API error response: ' . $errorResponse);
            }
            return null;

        } catch (\Exception $e) {
            Log::error('General error in Monei API call: ' . $e->getMessage());
            return null;
        }
    }

    public function callback(Request $request)
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

        // Initialize the order service
        $orderService = new OrderService();
        $orderService->setRecord($order);

        // Update order status based on callback status
        if ($status === 'SUCCEEDED') {
            $orderService->updateStatus(2); // Update status to "Paid"
            $orderService->saveOrderTransaction($transactionId, 'PAID');
            // Clear the cart after successful payment
            CartHelper::clearDatabaseCart($order->user_id);
        } else {
            $orderService->updateStatus(5); // Update status to "Failed"
            $orderService->saveOrderTransaction($transactionId, 'FAILED');
        }

        return response()->json(['message' => 'Callback handled successfully'], 200);
    }
}
