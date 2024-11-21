<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderDetails extends Component
{
    public $order_data;
    public $customer;

    // Use route model binding to receive the $order model directly
    public function mount(Order $order)
    {
        $this->order_data = $order;
        $this->customer = $this->order->customer ?? '';
    }

    public function render()
    {
        return __appLivewireView('order-details');
    }
}

