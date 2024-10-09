<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;

class MyOrders extends Component
{
    use WithPagination;

    public $paginate_count = 5;
    protected $paginationTheme = 'bootstrap';

    /**
     * Load more orders by increasing pagination count.
     */
    public function loadMore()
    {
        $this->paginate_count += 5; // Load 10 more orders
    }

    public function render()
    {
        $orders = Order::where('user_id', auth()->id())->orderBy('id', 'desc')
                       ->paginate($this->paginate_count);

        return view('livewire.my-orders', [
            'orders' => $orders,
        ]);
    }
}
