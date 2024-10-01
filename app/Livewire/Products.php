<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $category_id = null;
    public $paginate_count = 10;
    public $per_page = 10;

    protected $paginationTheme = 'bootstrap'; // or 'tailwind', adjust as per your CSS framework

    public function mount($category_id = null, $per_page = 10)
    {
        $this->category_id = $category_id;
        $this->per_page = $per_page;
        $this->paginate_count = $per_page;
    }

    public function loadMore()
    {
        $this->paginate_count += $this->per_page;
    }

    public function updatedCategoryId()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Product::query();

        if ($this->category_id) {
            if (is_array($this->category_id))
                $query->whereIn('category_id', $this->category_id);
            else
                $query->where('category_id', $this->category_id);
        }

        $products = $query->paginate($this->paginate_count);

        return view('livewire.products', [
            'products' => $products,
        ]);
    }
}
