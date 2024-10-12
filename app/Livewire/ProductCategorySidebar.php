<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class ProductCategorySidebar extends Component
{
    public $product_categories;
    public $selectedCategoryIds = [];

    public function mount($default_categories = null)
    {
        $this->product_categories = Category::all();
        
        if (request()->get('catid')) {
            $this->selectedCategoryIds = [(int) request()->get('catid')];
        } else if( !empty($default_categories) ) {
            $this->selectedCategoryIds = $default_categories;
        }
    }

    public function render()
    {
        $banner_settings = __homeSetting('banner_settings', true);

        return view('livewire.product-category-sidebar', [
            'product_categories' => $this->product_categories,
            'selectedCategoryIds' => $this->selectedCategoryIds, 
            'banner_settings' => $banner_settings, 
        ]);
    }
}
