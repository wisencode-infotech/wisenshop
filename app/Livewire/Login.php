<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class Login extends Component
{
    public function authenticate(Request $request)
    {
        dd($request->all());
    }

    public function render()
    {
        return view('livewire.login');
    }
}
