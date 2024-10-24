<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class MobileTopbarFilters extends Component
{
    public $product_categories;
    public $selected_category_id;

    public function mount()
    {
        $this->product_categories = $this->getCategory();
        $this->selected_category_id = null;
    }

    public function selectCategory($category_id = null)
    {
        if (empty($category_id)) {
            $this->selected_category_id = null;
        } else {
            $this->selected_category_id = $category_id;
        }

        $this->skipRender();
    }

    public function getCategory()
    {
        return Cache::rememberForever('all_categories', function () {
            return Category::where('parent_id', null)->get();
        });
    }

    public function render()
    {
        return view('livewire.mobile-topbar-filters', [
            'product_categories' => $this->product_categories,
        ]);
    }
}
