<?php

namespace App\Livewire;

use Livewire\Component;

class Rating extends Component
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
        return __appLivewireView('rating', [
            'product' => $this->product
        ]);
    }
}
