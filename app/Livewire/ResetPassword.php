<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str; // Import the Str facade

class ResetPassword extends Component
{
    public $email, $token, $password, $password_confirmation;

    public function mount($token)
    {
        $this->token = $token;
    }

    public function submit()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        // Reset the password
        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                ])->setRememberToken(Str::random(60)); // Use Str::random instead of str_random
                $user->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            session()->flash('message', __('Your password has been reset successfully!'));
            return redirect()->route('frontend.login'); // Redirect to login after successful reset
        } else {
            throw ValidationException::withMessages(['email' => __('Unable to reset password.')]);
        }
    }

    public function render()
    {
        return view('livewire.reset-password');
    }
}
