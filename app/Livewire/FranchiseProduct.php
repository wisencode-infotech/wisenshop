<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FranchiseProductAvailability;

class FranchiseProduct extends Component
{
    public $product_id;
    public $franchise_grouped_availabilities;

    public function mount($product_id, $product_variation_id = null)
    {
        $this->product_id = $product_id;

        // Fetch and group data by user_id
        $availabilities = FranchiseProductAvailability::where('product_id', $this->product_id)
            ->with(['user', 'product', 'variation']) // Eager load relationships
            ->get();


        $this->franchise_grouped_availabilities = $availabilities->groupBy('user_id')->map(function ($items) {
            return [
                'user' => $items->first()->user, // Get the user object from the first item
                'availabilities' => $items,
            ];
        });
    }

    public function render()
    {
        return view('livewire.franchise-product', [
            'availabilities' => $this->franchise_grouped_availabilities,
        ]);
    }
}
