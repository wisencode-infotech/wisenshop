<?php

namespace App\Livewire;

use App\Helpers\CartHelper;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class QuantitySelector extends Component
{
    public $quantity = 0; // Default quantity
    public $productId; // To hold the product ID
    public $layout = 'slim'; 

    public function mount($productId, $layout = 'slim')
    {
        $this->productId = $productId;
        $this->layout = $layout;

        // Check if the product already exists in the session (cart)
        $cart = CartHelper::items();

        // If the item exists in the cart, set the quantity
        if (isset($cart[$this->productId])) {
            $this->quantity = $cart[$this->productId]['quantity'];
        }
    }

    public function increment()
    {
        $this->quantity++;

        CartHelper::saveQuantity($this->productId, $this->quantity);

        if ($this->quantity == 1) {
            $this->dispatch('itemAdded'); // dispatch event with item price
        }

        // Dispatch an event for quantity change
        $this->dispatch('quantityUpdated', ['productId' => $this->productId, 'quantity' => $this->quantity]);

        $this->dispatch('shoppingCartUpdated');
    }

    public function decrement()
    {
        if ($this->quantity > 0) {
            $this->quantity--;

            CartHelper::saveQuantity($this->productId, $this->quantity);

            if ($this->quantity == 0) {
                $this->dispatch('itemRemoved');
            }

            // Dispatch an event for quantity change
            $this->dispatch('quantityUpdated', ['productId' => $this->productId, 'quantity' => $this->quantity]);

            $this->dispatch('shoppingCartUpdated');
        }
    }

    public function render()
    {
        return view('livewire.quantity-selector');
    }
}
