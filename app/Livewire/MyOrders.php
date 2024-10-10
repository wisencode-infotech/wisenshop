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
    public $show_mobile_order_data = false;

    public function mount()
    {
        $this->order_data = Order::where('user_id', Auth::id())
                                ->orderBy('id', 'desc')
                                ->first();
    }

    public function loadMore()
    {
        $this->paginate_count += 5; // Load 10 more orders
    }

    public function showOrder($orderId) {
        $this->order_data = Order::find($orderId);
    }

    public function showMobileOrder($orderId) {
        $this->show_mobile_order_data = Order::find($orderId);
    }

    public function render()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id', 'desc')
                       ->paginate($this->paginate_count);

        return view('livewire.my-orders', [
            'orders' => $orders
        ]);
    }
}
