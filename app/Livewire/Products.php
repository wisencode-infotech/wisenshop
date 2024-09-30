<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $category_id = null;
    public $perPage = 10;

    protected $paginationTheme = 'bootstrap'; // or 'tailwind', adjust as per your CSS framework

    public function loadMore()
    {
        // Increase perPage to load more products
        $this->perPage += 10;
    }

    public function updatedCategoryId()
    {
        // Reset pagination when the category is changed
        $this->resetPage();
    }

    public function render()
    {
        // Build the query for fetching products
        $query = Product::query();

        if ($this->category_id) {
            $query->where('category_id', $this->category_id);
        }

        // Paginate the products
        $products = $query->paginate($this->perPage);

        return view('livewire.products', [
            'products' => $products,
        ]);
    }
}
