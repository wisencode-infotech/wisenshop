<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\UserRole;
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
            'user_role_id' => UserRole::where('role', 'buyer')->first()->id,
            'referral_code' => $this->referral_code,
            'currency_id' => __userCurrency()->id
        ]);

        if (!empty($this->referral_code)) {

            $refferal_user = User::where('affiliate_code', $this->referral_code)->first();

            if (!empty($refferal_user)) {

                $data = [

                    'title' => $refferal_user->name.' is registered.',
                    'message' => $refferal_user->name.' is registered from your referral with '.$this->referral_code,
                    'user_id' => $refferal_user->id,
                    'is_global' => false,
                    'type' => 'referral_register',
                    'url' => '',
                    'meta_data' => [
                        'refferal_user_id' => $refferal_user->id
                    ],
                    'is_read' => false
                ];

                __addNotification($data);
            } 
        }

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
