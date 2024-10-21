<?php

namespace App\Livewire;

use App\Helpers\CartHelper;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class ProductCartButton extends Component
{
    public $itemCount = 0; // Track item count
    public $totalPrice = 0; // Track total price

    protected $listeners = ['itemAdded', 'itemRemoved', 'quantityUpdated' => 'updateCart'];

    public function mount()
    {
        $this->updateCart();
    }

    public function updateCart()
    {
        $cart = CartHelper::items();
        $this->itemCount = count($cart);
        $this->totalPrice = CartHelper::total(); // Update total price
    }

    public function itemAdded()
    {
        $this->itemCount++;

        $this->totalPrice = CartHelper::total();
    }

    public function itemRemoved()
    {
        if ($this->itemCount > 0)
            $this->itemCount--;

        $this->totalPrice = CartHelper::total();
    }

    public function render()
    {
        return view('livewire.product-cart-button');
    }
}
