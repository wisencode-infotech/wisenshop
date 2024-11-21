<?php

namespace App\Livewire;

use Livewire\Component;

class OrderProgress extends Component
{
    public $orderStatuses = [
        1 => 'Pending',
        2 => 'Accepted',
        3 => 'Shipped',
        4 => 'Finalized',
        5 => 'Cancelled',
        6 => 'Returned'
    ];

    protected $listeners = ['dispatchOrderStatus' => 'updateStatus'];

    public $currentStatus = 1; // Default status to 'Pending', update dynamically

    public function updateStatus($status)
    {
        $this->currentStatus = $status;
    }

    public function render()
    {
        return __appLivewireView('order-progress');
    }
}

