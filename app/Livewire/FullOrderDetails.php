<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;

class FullOrderDetails extends Component
{
    public $order_data;

    protected $listeners = ['dispatchOrderData' => 'updateOrder'];

    public function mount($order_data)
    {
        $this->order_data = $order_data;
    }

    public function updateOrder($order_id)
    {
        $this->order_data = Order::find($order_id);
        $this->dispatch('dispatchOrderStatus', $this->order_data->status);
    }

    public function render()
    {
        return view('livewire.full-order-details');
    }
}

