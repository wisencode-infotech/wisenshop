<?php

namespace App\Livewire;

use Livewire\Component;

class ProductDetailComponent extends Component
{
    public $product;
    
    public function mount($product) {
        $this->product = $product;
    }

    public function placeholder()
    {
        return view('livewire.skeleton-detail-page-loader');
    }
    
    public function render()
    {
        return view('livewire.product-detail-component', [
            'product' => $this->product
        ]);
    }
}
