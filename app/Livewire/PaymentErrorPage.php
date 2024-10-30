<?php

namespace App\Livewire;

use Livewire\Component;

class PaymentErrorPage extends Component
{
    public $status;
    public $orderId;
    public $message;

    public function mount()
    {
        $this->status = request()->query('status') ?? 'FAILED';
        $this->orderId = request()->query('orderId') ?? (session('order') ? session('order')->id : '');
        $this->message = request()->query('message') ?? session('error', __trans('An error occurred while processing your payment.'));
    }

    public function render()
    {
        return view('livewire.payment-error-page', [
            'status' => $this->status,
            'orderId' => $this->orderId,
            'message' => $this->message,
        ]);
    }
}
