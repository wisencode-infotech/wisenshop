<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class MobileTopbarFilters extends Component
{
    public $product_categories;

    public function mount()
    {
        $this->product_categories = $this->getCategory();
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
