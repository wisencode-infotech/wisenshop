<?php

namespace App\Livewire;

use Livewire\Component;

class ProductSearchBar extends Component
{
    public $search = '';
    public $isFocused = false;

    public function clearSearch()
    {
        $this->search = '';

        $this->dispatch('filterProducts', [
            'search' => $this->search,
        ]);
    }

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
        return __appLivewireView('product-search-bar');
    }
}
