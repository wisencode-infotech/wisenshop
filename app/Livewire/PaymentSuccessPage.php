<?php

namespace App\Livewire;

use Livewire\Component;

class PaymentSuccessPage extends Component
{
    public $transactionId;
    public $orderId;

    public function mount()
    {
        $this->transactionId = request()->query('id') ?? '';
        $this->orderId = request()->query('orderId') ?? '';
    }

    public function render()
    {
        return view('livewire.payment-success-page', [
            'transactionId' => $this->transactionId,
            'orderId' => $this->orderId,
        ]);
    }
}
