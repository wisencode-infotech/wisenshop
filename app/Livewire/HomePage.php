<?php

namespace App\Livewire;

use Livewire\Component;

class HomePage extends Component
{
    
    public $default_categories;

    public function mount() {
        $this->default_categories = __homeSetting('display_specific_categories_on_page_load', true);
        if (request()->get('catid')) {
            $this->default_categories = [(int) request()->get('catid')];
        }
    }

    public function render()
    {
        return view('livewire.home-page');
    }
}