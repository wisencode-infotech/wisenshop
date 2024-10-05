<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductVariation extends Component
{
    public $product;
    public $production_variations;
    public $selected_product_variation;

    public function mount($product_id)
    {
        $this->product = Product::find($product_id);
        $this->production_variations = $this->product->variations;
        $this->selected_product_variation = ($this->production_variations->count() > 0) ? $this->production_variations->first()->id ?? null : null;
    }

    public function updateProductVariant()
    {
        $this->dispatch('productVariantChanged', $this->selected_product_variation);
    }

    public function render()
    {
        return view('livewire.product-variation', [
            'variations' => $this->production_variations
        ]);
    }
}
