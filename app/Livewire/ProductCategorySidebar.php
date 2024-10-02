<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class ProductCategorySidebar extends Component
{
    public $product_categories;
    public $selectedCategoryId;

    public function mount()
    {
        $this->product_categories = Category::all();
        $this->selectedCategoryId = request()->get('catid');
    }

    public function render()
    {
        return view('livewire.product-category-sidebar', [
            'product_categories' => $this->product_categories,
            'selectedCategoryId' => $this->selectedCategoryId, 
        ]);
    }
}
