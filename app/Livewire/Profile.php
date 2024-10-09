<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Profile extends Component
{
    public $name;
    public $email;
    public $phone_number;
    public $password;
    public $password_confirmation;

    // Mount the current user's data
    public function mount()
    {
        $user = Auth::user();

        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone_number = $user->phone;
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone_number' => 'required|string|max:15',
            'password' => 'nullable|string|min:8|confirmed', // Password is optional
        ]);

        // Update the authenticated user's data
        $user = Auth::user();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->phone = $this->phone_number;

        // If a new password is provided, update it
        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        $user->save();

        return redirect()->route('frontend.home');
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
