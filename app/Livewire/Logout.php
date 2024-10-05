<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Logout extends Component
{
    public function logout()
    {
        $current_locale = session('app_locale', config('locale', 'es'));

        Session::flush();

        session()->put('app_locale', $current_locale);

        Auth::logout(); // Log the user out

        // Redirect the user to the login page or homepage after logout
        return redirect()->route('frontend.home'); 
    }
}
