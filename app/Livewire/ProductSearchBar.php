<?php

namespace App\Livewire;

use Livewire\Component;

class ProductSearchBar extends Component
{
    public $search = '';

    public function updatedSearch()
    {
        $this->dispatch('filterProducts', [
            'search' => $this->search,
        ]);
    }

    public function applyFilters()
    {
        $this->dispatch('filterProducts', [
            'search' => $this->search,
        ]);
    }

    public function render()
    {
        return view('livewire.product-search-bar');
    }
}
