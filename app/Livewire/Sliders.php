<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SiteBanner;

class Sliders extends Component
{
    public $banners;

    public function mount()
    {
        $this->banners = SiteBanner::all();
    }

    public function render()
    {  
        return view('livewire.sliders', [
            'banners' => $this->banners,
        ]);
    }
}
