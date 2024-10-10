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

    public function mount($product_id)
    {
        $this->product_id = $product_id;
    }

    public function render()
    {
        // Fetch reviews with pagination
        $reviews = ProductReview::where('product_id', $this->product_id)
            ->with('user') // Eager load user data
            ->orderBy('created_at', 'desc')
            ->paginate(5); // Change the number per page as needed

        return view('livewire.product-reviews', [
            'reviews' => $reviews,
        ]);
    }
}
