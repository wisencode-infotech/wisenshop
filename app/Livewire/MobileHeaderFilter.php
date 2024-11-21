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

    public function resetFilters()
    {
        $this->search = '';
        $this->sort = 'asc'; // reset to default sorting
        $this->minPrice = null;
        $this->maxPrice = null;
        
        // Optionally, you can dispatch an event to reset filters in the parent component
        $this->dispatch('filterProducts', [
            'search' => $this->search,
            'sort' => $this->sort,
            'minPrice' => $this->minPrice,
            'maxPrice' => $this->maxPrice,
        ]);
    }
    

    public function render()
    {
        return __appLivewireView('mobile-header-filter');
    }
}
