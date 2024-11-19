<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public $payment_method;

    public $payment_method_service;

    public function __construct() {}

    public function via($payment_method)
    {
        $this->payment_method = $payment_method;
    }

    public function process(Order $order, $method = '')
    {
        if (!empty($method))
            $this->payment_method = $method;

        if (!$this->isServiceFileAvailable())
            return $this->throwBackIfInvalid();

        if (!$this->isServiceClassAvailable())
            return $this->throwBackIfInvalid();

        $payment_method_service_class_name = "App\\Services\\PaymentGateway\\" . ucfirst(Str::camel($this->payment_method));

        try {

            $this->payment_method_service = app($payment_method_service_class_name);
            
            return $this->payment_method_service->processPayment($order);

        } catch (\Exception $e) {
            return redirect()->route('frontend.payment.error')->with('error', __trans('Payment processing failed.'))->with('order', $order);
        }
    }

    public function callback(Request $request, $method)
    {
        if (!$this->isServiceFileAvailable())
            return $this->abortIfNotFound();

        if (!$this->isServiceClassAvailable())
            return $this->abortIfNotFound();

        Log::info("Payment callback received for method: $method", $request->all());

        return $this->payment_method_service->handleCallback($request);
    }

    protected function isServiceFileAvailable()
    {
        return File::exists(app_path('Services/PaymentGateway/' . ucfirst(Str::camel($this->payment_method)) . '.php'));
    }

    protected function isServiceClassAvailable()
    {
        return class_exists("App\\Services\\PaymentGateway\\" . ucfirst(Str::camel($this->payment_method)));
    }

    protected function throwBackIfInvalid($abort = false, $status_code = 404, $message = 'not_found')
    {
        Log::info("Payment [" . $this->payment_method . "] callback error", [
            'payment_method' => $this->payment_method,
            'payment_method_service' => $this->payment_method_service
        ]);

        if ($abort)
            return abort($status_code, $message);

        return redirect()->route('frontend.home')->with('error', __trans('Invalid payment method'));
    }

    protected function abortIfNotFound()
    {
        return $this->throwBackIfInvalid(true, 404, __trans('Payment method [' . $this->payment_method . '] not found'));
    }
}
