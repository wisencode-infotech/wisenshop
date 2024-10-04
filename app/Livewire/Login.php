<?php

namespace App\Livewire;

use App\Helpers\CartHelper;
use App\Helpers\WishlistHelper;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function authenticate()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {

            // Sync session cart to user
            CartHelper::syncToDatabse();

            // Sync session wishlist to user
            WishlistHelper::syncWishlistToUser();

            $this->dispatch('shoppingCartUpdated');

            return redirect()->intended('/');
        } else {
            // Handle failed authentication
            $this->addError('email', 'The provided credentials do not match our records.');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
