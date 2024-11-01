<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SiteBanner;
use Illuminate\Support\Facades\Cache;

class Sliders extends Component
{
    public $banners;

    public function mount()
    {
        $this->banners = $this->getBanners();
    }

    public function getBanners()
    {
        return Cache::rememberForever('site-banners', function () {
            return SiteBanner::all();
        });
    }

    public function placeholder()
    {
        return view('livewire.slider-skeleton');
    }

    public function render()
    {  
        return view('livewire.sliders', [
            'banners' => $this->banners,
        ]);
    }
}
