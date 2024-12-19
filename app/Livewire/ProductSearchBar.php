<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductSearchBar extends Component
{
    public $search = '';
    public $isFocused = false;
    public $suggestions = [];

    public function updatedSearch()
    {
        $this->suggestions = [];

        if (strlen($this->search) > 1) {

            $categories = Category::where('name', 'like', '%' . $this->search . '%')
            ->with(['subcategories' => function ($query) {
                $query->select('id', 'parent_id');
            }])
            ->withCount(['products as total_products' => function ($query) {
                $query->select(DB::raw('count(*)'));
            }])
            ->get();

            $categories = $categories->map(function ($category) {
                $categoryIds = $category->subcategories->pluck('id')->prepend($category->id);
                $productCount = Product::whereIn('category_id', $categoryIds)->count();

                return [
                    'type' => 'category',
                    'id' => $category->id,
                    'name' => $category->name,
                    'count' => $productCount,
                ];
            });

            $products = Product::where('name', 'like', '%' . $this->search . '%')
                ->with('category')
                ->get()
                ->map(function ($product) {
                    return [
                        'type' => 'product',
                        'id' => $product->id,
                        'name' => $product->name,
                        'slug' => $product->slug,
                        'price' => $product->price,
                        'category' => $product->category->name,
                    ];
                });

            $this->suggestions = collect($categories)->merge($products)->toArray();
        }
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->suggestions = [];
    }

    public function render()
    {
        return __appLivewireView('product-search-bar');
    }
}
