<?php

namespace App\Livewire;

use App\Helpers\CartHelper;
use Livewire\Component;

class QuantitySelector extends Component
{
    public $quantity = 0; // Default quantity
    public $product_id; // To hold the product ID
    public $product_has_variation = false;
    public $layout = 'slim'; 

    public function mount($product_id, $layout = 'slim', $product_has_variation = false)
    {
        $this->product_id = $product_id;
        $this->layout = $layout;
        $this->product_has_variation = $product_has_variation;

        // Check if the product already exists in the session (cart)
        $cart = CartHelper::items();

        // If the item exists in the cart, set the quantity
        if (isset($cart[$this->product_id])) {
            $this->quantity = $cart[$this->product_id]['quantity'];
        }
    }

    public function increment()
    {
        $this->quantity++;

        CartHelper::saveQuantity($this->product_id, $this->quantity);

        if ($this->quantity == 1) {
            $this->dispatch('itemAdded'); // dispatch event with item price
        }

        // Dispatch an event for quantity change
        $this->dispatch('quantityUpdated', ['product_id' => $this->product_id, 'quantity' => $this->quantity]);

        $this->dispatch('shoppingCartUpdated');
    }

    public function decrement()
    {
        if ($this->quantity > 0) {
            $this->quantity--;

            CartHelper::saveQuantity($this->product_id, $this->quantity);

            if ($this->quantity == 0) {
                $this->dispatch('itemRemoved');
            }

            // Dispatch an event for quantity change
            $this->dispatch('quantityUpdated', ['product_id' => $this->product_id, 'quantity' => $this->quantity]);

            $this->dispatch('shoppingCartUpdated');
        }
    }

    public function render()
    {
        return view('livewire.quantity-selector');
    }
}
