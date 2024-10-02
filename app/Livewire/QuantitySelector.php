<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class QuantitySelector extends Component
{
    public $quantity = 0; // Default quantity
    public $productId; // To hold the product ID
    public $itemPrice; // Price of the item
    public $is_cart_page = false; 

    public function mount($productId, $itemPrice, $is_cart_page = false)
    {
        $this->productId = $productId;
        $this->itemPrice = $itemPrice;
        $this->is_cart_page = $is_cart_page; // Make sure this gets set

        // Check if the product already exists in the session (cart)
        $cart = Session::get('cart', []);

        // If the item exists in the cart, set the quantity
        if (isset($cart[$this->productId])) {
            $this->quantity = $cart[$this->productId]['quantity'];
        }
    }

    public function increment()
    {
        $this->quantity++;

        // Update session cart
        $cart = Session::get('cart', []);

        // Add/update item in cart (store productId and quantity only)
        $cart[$this->productId] = [
            'quantity' => $this->quantity,
        ];

        // Save updated cart back to session
        Session::put('cart', $cart);

        // Only dispatch the event if the quantity is 1 or more
        if ($this->quantity == 1) {
            $this->dispatch('itemAdded', $this->itemPrice); // dispatch event with item price
        }

        // Dispatch an event for quantity change
        $this->dispatch('quantityUpdated', ['productId' => $this->productId, 'quantity' => $this->quantity]);
    }

    public function decrement()
    {
        if ($this->quantity > 0) {
            $this->quantity--;


             // Update session cart
            $cart = Session::get('cart', []);

            // dispatch the event when quantity decreases to 0
            if ($this->quantity == 0) {

                 // Remove item from cart if quantity is 0
                unset($cart[$this->productId]);


                $this->dispatch('itemRemoved', $this->itemPrice); // dispatch event for removing item
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
        }
    }

    public function render()
    {
        return view('livewire.quantity-selector');
    }
}
