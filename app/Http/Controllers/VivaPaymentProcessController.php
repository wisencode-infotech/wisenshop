<?php

namespace App\Http\Controllers;

use App\Helpers\CartHelper;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\OrderService;

class VivaPaymentProcessController extends Controller
{
    public function index(Order $order)
    {
        try {
            // Prepare the data for Viva payment
            $vivaData = [
                'amount' => $order->total_price * 100, // Amount in cents
                'currency' => $order->currency->code,
                'order_id' => $order->id,
                'description' => 'Order #' . $order->id,
                'success_url' => route('frontend.home') . '?payment_status=completed',
                'cancel_url' => route('frontend.home') . '?payment_status=cancelled',
            ];

            // Call Viva API to create a payment session
            $vivaResponse = $this->createVivaPayment($vivaData);

            if ($vivaResponse && isset($vivaResponse['url'])) {
                return redirect($vivaResponse['url']); // Redirect to Viva payment page
            } else {
                return redirect()->route('frontend.home')->with('error', __('Something went wrong'));
            }
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->route('frontend.home')->with('error', $e->getMessage());
        }
    }

    private function createVivaPayment($data)
    {
        // Call Viva API to create a payment
        $client = new \GuzzleHttp\Client();
        
        $response = $client->post('https://api.viva.com/v1/checkout', [
            'json' => $data,
            'headers' => [
                'Authorization' => 'Bearer ' . env('VIVA_API_KEY'),
            ],
        ]);

        return json_decode($response->getBody(), true);
    }

    public function callback(Request $request)
    {
        // Handle the Viva payment response
        $order_id = $request->input('order_id');
        $status = $request->input('status'); // Adjust based on how Viva sends the status

        // Load the order and update status based on the payment status
        $order = Order::find($order_id);
        $order_service = new OrderService();
        $order_service->setRecord($order);

        if ($status === 'successful') {
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
