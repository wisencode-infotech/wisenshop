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
    public $stock_available = true;

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

        // If the item exists in the cart, set the quantity
        $this->quantity = CartHelper::getQuantity($this->product_id, $this->product_variation_id, $this->quantity);
    }

    public function getListeners()
    {
        return [
            "productVariantChanged-{$this->product_id}" => 'productVariantChanged',
            "productStockChanged-{$this->product_id}" => 'productStockChanged'
        ];
    }

    public function productVariantChanged($product_id, $product_variation_id = null)
    {
        if ($this->product_id !== $product_id)
            return;
        
        $this->product_id = $product_id;

        $this->product_variation_id = $product_variation_id;

        $this->quantity = CartHelper::getQuantity($this->product_id, $this->product_variation_id);
    }

    public function productStockChanged($product_id, $product_variation_id, $stock)
    {
        $this->stock_available = $stock > 0;
    }

    public function increment()
    {
        // $this->quantity++;

        CartHelper::saveQuantity($this->product_id, $this->product_variation_id, $this->quantity);

        if ($this->quantity == 1) {
            $this->dispatch('itemAdded');
            $this->dispatch('notify', 'success', __trans('Item added to the cart'));
        }

        $this->dispatch('quantityUpdated', ['product_id' => $this->product_id, 'product_variation_id' => $this->product_variation_id, 'quantity' => $this->quantity]);

        $this->dispatch('shoppingCartUpdated');

        $this->skipRender();
    }

    public function decrement()
    {
        if ($this->quantity > 0 || true) {
            // $this->quantity--;

            CartHelper::saveQuantity($this->product_id, $this->product_variation_id, $this->quantity);

            if ($this->quantity == 0) {
                $this->dispatch('itemRemoved');
                $this->dispatch('notify', 'success', __trans('Item removed from the cart'));
            }

            $this->dispatch('quantityUpdated', ['product_id' => $this->product_id, 'product_variation_id' => $this->product_variation_id, 'quantity' => $this->quantity]);

            $this->dispatch('shoppingCartUpdated');
        }

        $this->skipRender();
    }

    public function render()
    {
        return view('livewire.quantity-selector');
    }
}
