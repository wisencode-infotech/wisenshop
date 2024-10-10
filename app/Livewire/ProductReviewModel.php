<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\ProductReview; // Import ProductReview model

class ProductReviewModel extends Component
{
    use WithFileUploads;

    public $is_open = false;
    public $rating = 0;
    public $comment;
    public $product; // Holds the product data

    protected $listeners = ['openReviewModal'];

    public function openReviewModal($product_id)
    {
        $this->product = Product::find($product_id);

        if ($this->product) {
            $this->is_open = true;
        }
    }

    public function close()
    {
        $this->is_open = false;
        $this->reset(['rating', 'comment', 'product']); // Reset data on close
    }

    public function submit()
    {
        // Validate inputs
        $this->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255'
        ]);

        // Save the review to the database
        ProductReview::create([
            'user_id' => auth()->id(), // Assuming the user is authenticated
            'product_id' => $this->product->id,
            'rating' => $this->rating,
            'review' => $this->comment,
        ]);

        // Reset form after submission
        $this->reset(['rating', 'comment', 'product']);

        // Close modal
        $this->close();

        // Optionally, send a message to the frontend
        session()->flash('message', 'Review submitted successfully.');
    }

    public function render()
    {
        return view('livewire.product-review-model');
    }
}
