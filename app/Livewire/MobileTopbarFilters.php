<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class MobileTopbarFilters extends Component
{
    public $product_categories;

    public function mount()
    {
        $this->product_categories = Category::all();
    }

    public function render()
    {
        return view('livewire.mobile-topbar-filters', [
            'product_categories' => $this->product_categories,
        ]);
    }
}
