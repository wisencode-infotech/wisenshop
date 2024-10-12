<?php

namespace App\Http\Controllers;

use App\Helpers\CartHelper;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\CoinPaymentsService;
use App\Services\OrderService;

class PaymentProcessController extends Controller
{
    public function index(Order $order) {
        try {
            $coinPaymentsService = new CoinPaymentsService();
            // $rates = $coinPaymentsService->getSupportedCoins();
            // dd($rates);
            $transaction = $coinPaymentsService->createTransaction(
                [
                    'amount' => $order->total_price,
                    'currency1' => $order->currency->code,
                    'currency2' => 'LTCT',
                    'buyer_email' => $order->customer_contact_email,
                    'buyer_name' => 'Ali',
                    'custom' => "$order->id",
                    'ipn_url' => route('frontend.coinpayments.callback'),
                    'success_url' => route('frontend.home').'?payment_status=completed',
                    'cancel_url' => route('frontend.home').'?payment_status=cancelled'
                ]);

            if ( isset($transaction['result']) ) {
                return redirect($transaction['result']['checkout_url']); // Redirect to the payment page
            } else {
                return redirect()->route('frontend.home')->with('error', __trans('Something went wrong'));
            }
        } catch (\Exception $e) {
            return redirect()->route('frontend.home')->with('error', $e->getMessage());
        }
    }

    public function coinpayments_callback(Request $request)
    {
        
         // Log the entire request data for debugging
        \Log::info('CoinPayments IPN Callback received:', $request->all());

        // Define the required CoinPayments IPN fields
        $ipn_secret = env('COINPAYMENTS_IPN_SECRET');  // Ensure you set this in .env
        $merchant_id = env('COINPAYMENTS_MERCHANT_ID');
        
        // Verify that this request comes from CoinPayments
        if ($request->header('HMAC') !== hash_hmac('sha512', $request->getContent(), $ipn_secret)) {
            abort(403, 'Invalid HMAC signature');
        }
        
        // Check merchant ID
        if ($request->input('merchant') != $merchant_id) {
            abort(403, 'Invalid merchant ID');
        }

        // Process the IPN
        $status = $request->input('status');

        $order_id = $request->input('custom');  // The order ID we passed when creating the transaction.
        
        // Retrieve the transaction ID (txn_id) from the IPN data
        $transaction_id = $request->input('txn_id');

        // Log the transaction ID (optional)
        \Log::info('CoinPayments IPN received for order: ' . $order_id . ', Transaction ID: ' . $transaction_id . ', status: ' . $status);

        // Load the order from the database
        $order = Order::find($order_id);

        if (!$order) {
            return response('Order not found', 404);
        }

        $order_service = new OrderService();
        $order_service->setRecord($order);

        // Update the order status based on CoinPayments status codes
        if ($status >= 100) {
            // Payment Accepted
            $order_service->updateStatus(2);

            $order_service->saveOrderTransaction($transaction_id, 'PAID');

        } elseif ($status < 0) {
            // Payment failed
            $order_service->updateStatus(5);

            $order_service->saveOrderTransaction($transaction_id, 'CANCELLED');

        } else {
            // Payment pending
            $order_service->saveOrderTransaction($transaction_id, 'UNPAID');
        }

        // Clear the cart after successful order placement
        CartHelper::clearDatabaseCart($order->user_id);

        // Send a 200 OK response back to CoinPayments
        return response('IPN handled', 200);
    }

}
