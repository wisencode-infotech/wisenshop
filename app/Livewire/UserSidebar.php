<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Request;

class UserSidebar extends Component
{
    public function render()
    {
        $current_route = Request::route()->getName();
        
        return view('livewire.user-sidebar', [
            'current_route' => $current_route,
        ]);
    }
}
