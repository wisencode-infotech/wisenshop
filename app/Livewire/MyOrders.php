<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class MyOrders extends Component
{
    use WithPagination;

    public $paginate_count = 5;
    protected $paginationTheme = 'bootstrap';
    public $order_data;
    public $selected_order_id;

    public function mount()
    {
        $this->order_data = Order::where('user_id', Auth::id())
                            ->orderBy('id', 'desc')
                            ->first();

        $this->selected_order_id = $this->order_data->id;                          
    }

    public function loadMore()
    {
        $this->paginate_count += 5; // Load 10 more orders
    }

    public function showOrder($order_id) 
    {
        $this->selected_order_id = $order_id;
        $this->dispatch('dispatchOrderData', $order_id);
    }

    public function render()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id', 'desc')
                       ->paginate($this->paginate_count);

        return view('livewire.my-orders', [
            'orders' => $orders,
            'order_data' => $this->order_data
        ]);
    }
}
