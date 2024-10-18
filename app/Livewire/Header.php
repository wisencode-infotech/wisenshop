<?php

namespace App\Livewire;

use Livewire\Component;

class Header extends Component
{
    // public $search = '';

    // public function applyFilters()
    // {
    //     $this->dispatch('filterProducts', [
    //         'search' => $this->search,
    //     ]);
    // }

    public function render()
    {
        return view('livewire.header');
    }
}
