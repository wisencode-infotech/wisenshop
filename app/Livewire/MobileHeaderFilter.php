<?php

namespace App\Livewire;

use Livewire\Component;

class MobileHeaderFilter extends Component
{
    public $search = '';
    public $sort = 'asc'; // default sorting
    public $minPrice = null;
    public $maxPrice = null;

    public function applyFilters()
    {
         $this->dispatch('filterProducts', [
            'search' => $this->search,
            'sort' => $this->sort,
            'minPrice' => $this->minPrice,
            'maxPrice' => $this->maxPrice,
        ]);
    }

    public function render()
    {
        return view('livewire.mobile-header-filter');
    }
}
