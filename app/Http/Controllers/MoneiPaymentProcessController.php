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
            $monei_data = [
                'amount' => $order->total_price * 100, // Amount in cents
                'currency' => $order->currency->code,
                'orderId' => (string)$order->id,
                'description' => 'Order #'.$order->id
            ];

            $monei_response = $this->createMoneiPayment($monei_data);

            // dd($monei_response);
            if ($monei_response && isset($monei_response['url'])) {
                return redirect($monei_response['url']); // Redirect to Monei payment page
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
            $monei = new MoneiClient(env('MONEI_API_KEY'));

            $payment = $monei->payments->create($data);

            if (isset($payment['status']) && $payment['status'] !== 'success') {
                Log::error('Monei API response status not OK: ' . $payment['status']);
                // dd('Monei API response status not OK: ' . $payment['status']);
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
            // dd('General error in Monei API call: ' . $e->getMessage());
            Log::error('General error in Monei API call: ' . $e->getMessage());
            return null;
        }
    }

    public function callback(Request $request)
    {
        // Handle the Monei payment response
        $order_id = $request->input('order_id');
        // $status = $request->input('status');
        $event_type = $request->input('event_type');
        $transaction_id = $request->input('transaction_id');

        // Load the order and update status based on the payment status
        $order = Order::find($order_id);
        $order_service = new OrderService();
        $order_service->setRecord($order);

        if ($event_type === 'account_invoice.paid') {
            $order_service->updateStatus(2); // Update to paid
            $order_service->saveOrderTransaction($request->input('transaction_id'), 'PAID');
        } else {
            $order_service->updateStatus(5); // Update to failed
            $order_service->saveOrderTransaction($request->input('transaction_id'), 'CANCELLED');
        }

        // Clear the cart after successful order placement
        CartHelper::clearDatabaseCart($order->user_id);
        
        return response()->json(['message' => 'Callback handled'], 200);
    }
}
