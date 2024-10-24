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
        return view('livewire.skeleton-detail-page-loader');
    }
    
    public function render()
    {
        return view('livewire.rating', [
            'product' => $this->product
        ]);
    }
}
