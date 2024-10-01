<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductDetails extends Component
{
    public $product_slug;

    public function render()
    {
        $product = Product::where('slug', $this->product_slug)->first();

        return view('livewire.product-details', [
            'product_info' => $product,
        ]);
    }
}
