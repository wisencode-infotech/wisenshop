<?php

namespace App\Livewire;

use App\Helpers\CartHelper;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CartIcon extends Component
{
    public $itemCount = 0; // Track the number of items in the cart

    protected $listeners = ['itemAdded', 'itemRemoved', 'quantityUpdated' => 'updateCartQuantity'];

    public function mount()
    {
        $cart = CartHelper::items();

        $this->itemCount = count($cart);
    }

    public function itemAdded()
    {
        $this->itemCount++; // Increment the item count when an item is added
    }

    public function itemRemoved()
    {
        if ($this->itemCount > 0) {
            $this->itemCount--; // Decrement the item count when an item is removed
        }
    }

    public function updateCartQuantity()
    {
        $cart = CartHelper::items();
        
        $this->itemCount = count($cart);
    }

    public function render()
    {
        return view('livewire.cart-icon');
    }
}
