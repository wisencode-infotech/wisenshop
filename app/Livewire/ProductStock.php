<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ProductVariation;
use Livewire\Component;

class ProductStock extends Component
{
    public $product_id;
    public $product_variation_id;
    public $stock = 0;
    public $layout = 'default';

    public function mount($product_id, $product_variation_id = null, $layout = null)
    {
        $this->product_id = $product_id;
        $this->product_variation_id = $product_variation_id;
        $this->layout = $layout;

        if (empty($product_variation_id)) {
            $product_variations_query = ProductVariation::select('id')->where('product_id', $this->product_id);
            $this->product_variation_id = ($product_variations_query->count() > 0) ? $product_variations_query->first()->id ?? null : null;
        }

        $this->setStock();
    }

    public function getListeners()
    {
        return [
            "productVariantChanged-{$this->product_id}" => 'productVariantChanged'
        ];
    }

    public function productVariantChanged($product_id, $product_variation_id = null)
    {
        $this->product_id = $product_id;

        $this->product_variation_id = $product_variation_id;

        $this->setStock();
    }

    public function setStock()
    {
        if (!empty($this->product_variation_id))
            $this->stock = ProductVariation::select('stock')->where('id', $this->product_variation_id)->first()->stock ?? 0;
        else
            $this->stock = Product::select('stock')->where('id', $this->product_id)->first()->stock ?? 0;

        $this->dispatch('productStockChanged-' . $this->product_id, $this->product_id, $this->product_variation_id, $this->stock);
    }

    public function render()
    {
        return view('livewire.product-stock');
    }
}
