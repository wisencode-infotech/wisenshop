<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SiteBanner;

class Sliders extends Component
{
    public $banners;

    public function mount()
    {
        // Fetch the banners data from the SiteBanner model
        $this->banners = SiteBanner::all(); // You can also use paginate() if needed
    }

    public function render()
    {
        return view('livewire.sliders', [
            'banners' => $this->banners,
        ]);
    }
}
