<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class MobileTopbarFilters extends Component
{
    public $product_categories;
    public $selected_category_id = null;

    public function mount()
    {
        $this->product_categories = $this->getCategories();
    }

    public function selectCategory($category_id = null)
    {
        $this->selected_category_id = $category_id;

        $this->skipRender();
    }

    public function getCategories()
    {
        return Cache::rememberForever('all-categories', function () {
            return Category::where('parent_id', null)->get();
        });
    }

    public function render()
    {
        return __appLivewireView('mobile-topbar-filters');
    }
}
