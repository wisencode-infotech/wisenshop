<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductVariation extends Component
{
    public $product;

    public $selected_production_variation = null;

    protected $listeners = ['productWithVariationQuantityUpdated'];

    public function mount($product_id)
    {
        $this->product = Product::find($product_id);
    }

    public function productWithVariationQuantityUpdated($value)
    {
        dd($value);
    }

    public function render()
    {
        return view('livewire.product-variation', [
            'variations' => $this->product->variations
        ]);
    }
}
