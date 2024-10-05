<?php

namespace App\Livewire;

use App\Helpers\CartHelper;
use App\Models\ProductVariation;
use Livewire\Component;

class QuantitySelector extends Component
{
    public $quantity = 0; // Default quantity
    public $product_id; // To hold the product ID
    public $product_variation_id = null; // To hold the product variant ID
    public $layout = 'slim';

    protected $listeners = ['productVariantChanged'];

    public function mount($product_id, $layout = 'slim', $product_variation_id = null)
    {
        $this->product_id = $product_id;
        $this->layout = $layout;

        if (!empty($product_variation_id)) {
            $this->product_variation_id = $product_variation_id;
        } else {
            $product_variations_query = ProductVariation::select('id')->where('product_id', $this->product_id);
            $this->product_variation_id = ($product_variations_query->count() > 0) ? $product_variations_query->first()->id ?? null : null;
        }

        // Check if the product already exists in the session (cart)
        $cart = CartHelper::items();

        // If the item exists in the cart, set the quantity
        if (isset($cart[CartHelper::generateKey($this->product_id, $this->product_variation_id)])) {
            $this->quantity = $cart[CartHelper::generateKey($this->product_id, $this->product_variation_id)]['quantity'];
        }
    }

    public function productVariantChanged($product_variation_id)
    {
        $this->product_variation_id = $product_variation_id;
    }

    public function increment()
    {
        $this->quantity++;

        CartHelper::saveQuantity($this->product_id, $this->product_variation_id, $this->quantity);

        if ($this->quantity == 1) {
            $this->dispatch('itemAdded'); // dispatch event with item price
        }

        // Dispatch an event for quantity change
        $this->dispatch('quantityUpdated', ['product_id' => $this->product_id, 'product_variation_id' => $this->product_variation_id, 'quantity' => $this->quantity]);

        $this->dispatch('shoppingCartUpdated');
    }

    public function decrement()
    {
        if ($this->quantity > 0) {
            $this->quantity--;

            CartHelper::saveQuantity($this->product_id, $this->product_variation_id, $this->quantity);

            if ($this->quantity == 0) {
                $this->dispatch('itemRemoved');
            }

            // Dispatch an event for quantity change
            $this->dispatch('quantityUpdated', ['product_id' => $this->product_id, 'product_variation_id' => $this->product_variation_id, 'quantity' => $this->quantity]);

            $this->dispatch('shoppingCartUpdated');
        }
    }

    public function render()
    {
        return view('livewire.quantity-selector');
    }
}
