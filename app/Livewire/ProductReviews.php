<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductReview;
use App\Models\User;

class ProductReviews extends Component
{
    use WithPagination;

    public $product_id;
    public $paginate_count = 3;
    public $per_page = 15;

    public function mount($product_id, $per_page = 3)
    {
        $this->product_id = $product_id;
        $this->per_page = $per_page;
        $this->paginate_count = $per_page;
    }

    public function loadMore()
    {
        $this->paginate_count += $this->per_page;
    }

    public function render()
    {
        // Fetch reviews with pagination
        $reviews = ProductReview::where('product_id', $this->product_id)
            ->with('user') // Eager load user data
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate_count); // Change the number per page as needed

        return view('livewire.product-reviews', [
            'reviews' => $reviews,
        ]);
    }
}
