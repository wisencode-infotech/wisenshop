<?php

namespace App\Livewire;

use App\Helpers\CartHelper;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CartIcon extends Component
{
    public $itemCount = 0;

    protected $listeners = ['itemAdded', 'itemRemoved', 'quantityUpdated' => 'updateCartQuantity'];

    public function mount()
    {
        $this->updateCartQuantity();
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
        return view('livewire.cart-icon');
    }
}
