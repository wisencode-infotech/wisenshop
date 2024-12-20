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
    public $isLoading = false;

    public function updatedSearch()
    {
        $this->isLoading = true;
        $this->suggestions = [];
        // sleep(5);
        if (strlen($this->search) > 1) {

            $categories = Category::where('name', 'like', '%' . $this->search . '%')
            ->with(['subcategories' => function ($query) {
                $query->select('id', 'parent_id', 'name');
            }])
            ->get();

            $categories = $categories->map(function ($category) {
                // Collect IDs for the category and its subcategories
                $categoryIds = $category->subcategories->pluck('id')->prepend($category->id);
                $productCount = Product::whereIn('category_id', $categoryIds)->count();

                // Prepare the category data
                $categoryData = [
                    'type' => 'category',
                    'id' => $category->id,
                    'name' => $category->name,
                    'count' => $productCount,
                    'subcategories' => [],
                ];

                // Check for subcategories
                if ($category->subcategories->isNotEmpty()) {
                    $categoryData['subcategories'] = $category->subcategories->map(function ($subcategory) {
                        $subcategoryProductCount = Product::where('category_id', $subcategory->id)->count();

                        return [
                            'id' => $subcategory->id,
                            'name' => $subcategory->name,
                            'count' => $subcategoryProductCount,
                        ];
                    })->toArray();
                }

                return $categoryData;
            });

            // Fetch products matching the search
            $products = Product::where('name', 'like', '%' . $this->search . '%')
                ->with('category')
                ->get()
                ->map(function ($product) {
                    return [
                        'type' => 'product',
                        'id' => $product->id,
                        'name' => $product->name,
                        'description' => $product->description,
                        'slug' => $product->slug,
                        'price' => $product->priceWithCurrency(),
                        'category' => $product->category->name,
                    ];
                });

            // Combine categories and products
            $this->suggestions = collect($categories)->merge($products)->toArray();
        }

        $this->isLoading = false; 
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
