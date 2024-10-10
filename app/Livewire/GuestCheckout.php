<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Helpers\CartHelper;
use App\Helpers\WishlistHelper;
use Illuminate\Support\Facades\Auth;

class GuestCheckout extends Component
{
    public $name;
    public $email;
    public $phone_number;
    public $password;

    public function mount()
    {
        if (Auth::check())
            return redirect()->intended(route('frontend.checkout'));
    }

    // Handle guest checkout form submission
    public function submit()
    {
        // Generate a random password for the user
        $this->password = Str::random(8);

        // Validate form inputs
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|max:15',
        ]);

        // Create the guest user with the hashed password
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone_number,
            'password' => Hash::make($this->password),
        ]);

        // Automatically log in the user after registration
        auth()->login($user);

        // Sync session cart to user
        CartHelper::syncToDatabse();

        // Sync session wishlist to user
        WishlistHelper::syncWishlistToUser();

        $this->dispatch('shoppingCartUpdated'); 

        return redirect()->intended('/checkout');
    }

    public function render()
    {
        return view('livewire.guest-checkout');
    }
}
