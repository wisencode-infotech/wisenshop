<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    // Declare properties
    public $category_id = null;
    public $paginate_count = 10;
    public $per_page = 10;

    // Pagination theme - adjust as per your CSS framework
    protected $paginationTheme = 'bootstrap'; // or 'tailwind'

    // Listen for event to update category
    protected $listeners = ['category-selected' => 'setCategory'];

    /**
     * Mount method is called when the component is first rendered.
     * @param int|null $category_id
     * @param int $per_page
     */
    public function mount($category_id = null, $per_page = 10)
    {
        $this->category_id = $category_id ?? null;
        $this->per_page = $per_page;
        $this->paginate_count = $per_page;
    }

    /**
     * Set the category and reset pagination.
     * This method is triggered by the event listener.
     *
     * @param int $category_id
     */
    public function setCategory($category_id = null)
    {
        $this->category_id = $category_id;
        $this->resetPage(); 
    }

    /**
     * Load more products by increasing pagination count.
     */
    public function loadMore()
    {
        $this->paginate_count += $this->per_page;
    }

    /**
     * Reset pagination when category ID is updated.
     */
    public function updatedCategoryId()
    {
        $this->resetPage();
    }

    /**
     * Render the component.
     * @return \Illuminate\View\View
     */
    public function render()
    {
        // Start building the query for products
        $query = Product::query();

        // Filter by category if a category_id is set
        if ($this->category_id) {
            $query->where('category_id', $this->category_id);
        }

        // Paginate results
        $products = $query->paginate($this->paginate_count);

        // Return the view with the paginated products
        return view('livewire.products', [
            'products' => $products,
        ]);
    }
}
