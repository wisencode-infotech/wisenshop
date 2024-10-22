<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Notifications\CustomResetPasswordNotification; // Import your custom notification
use App\Models\User;

class ForgotPassword extends Component
{
    public $email;

    public function submit()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Check if the email exists and generate a token
        $user = User::where('email', $this->email)->first();

        if (!$user) {
            $this->dispatch('notify', 'error', __trans('No user found with that email.'));
            return;
        }

        // Generate a password reset token
        $token = Password::createToken($user);

        // Send the password reset email using the custom notification
        try {
            $user->notify(new CustomResetPasswordNotification($token)); // Use your custom notification
            $this->dispatch('notify', 'success', __trans('A password reset link has been sent to your email.'));
        } catch (\Exception $e) {
            
            $this->dispatch('notify', 'error', __trans('There was an error sending the reset link. Please try again.'));
        }

        // Clear the email input after submission
        $this->email = '';
    }

    public function render()
    {
        return view('livewire.forgot-password');
    }
}
