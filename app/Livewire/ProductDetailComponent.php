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
        return __appLivewireView('skeleton-detail-page-loader');
    }
    
    public function render()
    {
        return __appLivewireView('product-detail-component', [
            'product' => $this->product
        ]);
    }
}
