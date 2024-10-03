<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class ProductCartButton extends Component
{
    public $itemCount = 0; // Track item count
    public $totalPrice = 0; // Track total price

    public function mount()
    {
        $cart = shoppingCart();

        $this->totalPrice = shoppingCartTotal();

        $this->itemCount = count($cart);
    }

    protected $listeners = ['itemAdded', 'itemRemoved', 'quantityUpdated' => 'updateCartQuantity'];

    public function itemAdded()
    {
        $this->itemCount++;

        $this->totalPrice = shoppingCartTotal();
    }

    public function itemRemoved()
    {
        if ($this->itemCount > 0)
            $this->itemCount--;

        $this->totalPrice = shoppingCartTotal();
    }

    public function updateCartQuantity()
    {
        $cart = shoppingCart();

        $this->itemCount = count($cart);

        $this->totalPrice = shoppingCartTotal();
    }

    public function render()
    {
        return view('livewire.product-cart-button');
    }
}
