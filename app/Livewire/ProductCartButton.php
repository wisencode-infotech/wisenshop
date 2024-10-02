<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class ProductCartButton extends Component
{
    public $itemCount = 0; // Track item count
    public $totalPrice = 0; // Track total price
    public $itemPrice;

    // Optionally make itemPrice required in the constructor
    public function mount($itemPrice = 0)
    {
        $this->itemPrice = $itemPrice; // Set the item price during mounting

        $cart = Session::get('cart', []);

        $this->itemCount = count($cart);
    }

    protected $listeners = ['itemAdded', 'itemRemoved'];

    public function itemAdded($itemPrice)
    {
        $this->itemCount++; // Increment item count
        // $this->totalPrice += $itemPrice; 
    }

    public function itemRemoved($itemPrice)
    {
        if ($this->itemCount > 0) {
            $this->itemCount--; // Decrement item count
            // $this->totalPrice -= $itemPrice;
        }
    }

    public function render()
    {
        return view('livewire.product-cart-button');
    }
}
