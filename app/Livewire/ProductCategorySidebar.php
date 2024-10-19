<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class ProductCategorySidebar extends Component
{
    public $product_categories;
    public $selectedCategoryId = null;
    public $subcategories = [];
    public $filter = ''; // For filtering subcategories
    public $showSubcategories = false; // Track whether to show subcategories

    public function mount($default_categories = null)
    {
        $this->product_categories = Category::whereNull('parent_id')->get();
        
        if (request()->get('catid')) {
            $this->selectedCategoryId = (int) request()->get('catid');
        } elseif (!empty($default_categories)) {
            $this->selectedCategoryId = $default_categories;
        }
    }

    public function updatedSelectedCategoryId($categoryId)
    {
        // Fetch subcategories if a category is selected
        if ($categoryId) {
            $this->subcategories = Category::where('parent_id', $categoryId)->get();
            $this->showSubcategories = !empty($this->subcategories) && $this->subcategories->count(); // Show subcategories if available
        }

        $this->dispatch('filter_category_updated_event');

    }

    public function goBack()
    {
        $this->showSubcategories = false; // Hide subcategories
        $this->selectedCategoryId = $this->selectedCategoryId; // Reset selected category
        $this->subcategories = []; // Clear subcategories
    }

    public function render()
    {
        $banner_settings = __homeSetting('banner_settings', true);

        return view('livewire.product-category-sidebar', [
            'product_categories' => $this->product_categories,
            'selectedCategoryId' => $this->selectedCategoryId, 
            'subcategories' => $this->subcategories, // Pass filtered subcategories
            'banner_settings' => $banner_settings, 
            'showSubcategories' => $this->showSubcategories, // Track visibility of subcategories
        ]);
    }
}
