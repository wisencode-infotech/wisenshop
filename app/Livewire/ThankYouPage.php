<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;

class ThankYouPage extends Component
{
    public $order_data;

    public function mount($order_id)
    {
        $this->order_data = Order::find($order_id);

        if (!$this->order_data || $this->order_data->user_id != auth()->user()->id) {
            return redirect()->route('frontend.home');
        }
    }

    public function render()
    {
        return view('livewire.thank-you-page');
    }
}
