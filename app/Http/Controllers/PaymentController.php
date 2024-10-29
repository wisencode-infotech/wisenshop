<?php

namespace App\Http\Controllers;

use App\Helpers\CartHelper;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\CoinPaymentsService;
use App\Services\MoneiPaymentService;
use App\Services\VivaPaymentService;
use App\Services\OrderService;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected $coinPaymentsService;
    protected $moneiPaymentService;
    protected $orderService;
    protected $vivaPaymentService;

    public function __construct(CoinPaymentsService $coinPaymentsService, MoneiPaymentService $moneiPaymentService, OrderService $orderService, VivaPaymentService $vivaPaymentService)
    {
        $this->coinPaymentsService = $coinPaymentsService;
        $this->moneiPaymentService = $moneiPaymentService;
        $this->orderService = $orderService;
        $this->vivaPaymentService = $vivaPaymentService;
    }

    public function process(Order $order, $method)
    {
        try {

            return match ($method) {
                'coinpayments' => $this->coinPaymentsService->processPayment($order),
                'monei' => $this->moneiPaymentService->processPayment($order),
                'viva' => $this->vivaPaymentService->processVivaPayment($order),
                default => redirect()->route('frontend.home')->with('error', __('Invalid payment method')),
            };

        } catch (\Exception $e) {
            return redirect()->route('frontend.home')->with('error', $e->getMessage());
        }
    }

    public function callback(Request $request, $method)
    {
        \Log::info("Payment callback received for method: $method", $request->all());

        return match ($method) {
            'coinpayments' => $this->coinPaymentsService->handleCallback($request),
            'monei' => $this->moneiPaymentService->handleCallback($request),
            'viva' => $this->vivaPaymentService->handleVivaCallback($request->all()),
            default => abort(404, 'Payment method not found'),
        };
    }
}
