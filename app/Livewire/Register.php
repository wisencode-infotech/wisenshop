<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Helpers\CartHelper;
use App\Helpers\WishlistHelper;

class Register extends Component
{
    public $name;
    public $email;
    public $phone_number;
    public $password;
    public $password_confirmation;
    public $referral_code; 

    public function mount()
    {
        $this->referral_code = request()->query('referral_code');
    }

    // Handle registration form submission
    public function submit()
    {
        // Validate form inputs
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed', // Check password confirmation
        ]);

        // Create the user with the hashed password
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone_number,
            'password' => Hash::make($this->password),
            'user_role_id' => 2,
            'referral_code' => $this->referral_code,
        ]);

        // Automatically log in the user after registration
        auth()->login($user);

        // Sync session cart to user
        CartHelper::syncToDatabse();

        // Sync session wishlist to user
        WishlistHelper::syncWishlistToUser();

        $this->dispatch('shoppingCartUpdated');

        // Redirect to intended page or home
        return redirect()->intended('/'); // Adjust the redirection as needed
    }

    public function render()
    {
        return view('livewire.register');
    }
}
