<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FooterMenuSection;
use Illuminate\Support\Facades\Cache;

class Footer extends Component
{
    public $message;

    public function render()
    {
        $menu_sections = Cache::rememberForever('footer-menu-sections', function () {
            return FooterMenuSection::all();
        });

        return __appLivewireView('footer', [
            'menu_sections' => $menu_sections
        ]);
    }
}
