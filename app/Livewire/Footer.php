<?php

namespace App\Livewire;

use Livewire\Component;

class Footer extends Component
{
    public $message;

    public function render()
    {
        return view('livewire.footer');
    }
}
