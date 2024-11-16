<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected $newPaymentService;

    public function __construct()
    {
        // Define newPaymentService if needed
    }

    public function process(Order $order, $method)
    {
        try {
            return match ($method) {
                'new_payment_method' => $this->newPaymentService->processPayment($order),
                default => redirect()->route('frontend.home')->with('error', __trans('Invalid payment method')),
            };

        } catch (\Exception $e) {
            return redirect()->route('frontend.payment.error')->with('error', __trans('Payment processing failed.'))->with('order', $order);
        }
    }

    public function callback(Request $request, $method)
    {
        Log::info("Payment callback received for method: $method", $request->all());

        return match ($method) {
            'new_payment_method' => $this->newPaymentService->handleCallback($request),
            default => abort(404, __trans('Payment method not found')),
        };
    }
}
