<?php

namespace App\Livewire;

use App\Helpers\CartHelper;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CartIcon extends Component
{
    public $itemCount = 0;

    public $current_page = '';

    protected $listeners = ['itemAdded', 'itemRemoved', 'quantityUpdated' => 'updateCartQuantity'];

    public function mount()
    {
        $this->updateCartQuantity();
        $this->current_page = \Request::route()->getName();
    }

    public function itemAdded()
    {
        $this->itemCount++;
    }

    public function itemRemoved()
    {
        if ($this->itemCount > 0) {
            $this->itemCount--;
        }
    }

    public function updateCartQuantity()
    {   
        $this->itemCount = CartHelper::itemCount();
        
    }

    public function render()
    {
        return __appLivewireView('cart-icon');
    }
}
