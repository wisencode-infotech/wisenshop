<?php

namespace App\Livewire;

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
        $cart = shoppingCart();

        // If the item exists in the cart, set the quantity
        if (isset($cart[$this->productId])) {
            $this->quantity = $cart[$this->productId]['quantity'];
        }
    }

    public function increment()
    {
        $this->quantity++;

        // Update session cart
        $cart = shoppingCart();

        // Add/update item in cart (store productId and quantity only)
        $cart[$this->productId] = [
            'quantity' => $this->quantity,
        ];

        // Save updated cart back to session
        Session::put('cart', $cart);

        // Only dispatch the event if the quantity is 1 or more
        if ($this->quantity == 1) {
            $this->dispatch('itemAdded'); // dispatch event with item price
        }

        // Dispatch an event for quantity change
        $this->dispatch('quantityUpdated', ['productId' => $this->productId, 'quantity' => $this->quantity]);

        $this->dispatch('syncLocalCartFromSession');
    }

    public function decrement()
    {
        if ($this->quantity > 0) {
            $this->quantity--;


             // Update session cart
            $cart = shoppingCart();

            // dispatch the event when quantity decreases to 0
            if ($this->quantity == 0) {

                 // Remove item from cart if quantity is 0
                unset($cart[$this->productId]);


                $this->dispatch('itemRemoved'); // dispatch event for removing item
            } else {
                // Update item in cart
                $cart[$this->productId] = [
                    'quantity' => $this->quantity,
                ];
            }

            // Save updated cart back to session
            Session::put('cart', $cart);

            // Dispatch an event for quantity change
            $this->dispatch('quantityUpdated', ['productId' => $this->productId, 'quantity' => $this->quantity]);

            $this->dispatch('syncLocalCartFromSession');
        }
    }

    public function render()
    {
        return view('livewire.quantity-selector');
    }
}
