<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use Livewire\WithFileUploads; 

class Profile extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $phone_number;
    public $password;
    public $password_confirmation;
    public $profile_image;
    public $temp_image_url; 

    // Mount the current user's data
    public function mount()
    {
        $user = Auth::user();

        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone_number = $user->phone;
        $this->profile_image = $user->profile_image_url;
        $this->temp_image_url = null;
    }

    public function updatedProfileImage()
    {
        // Generate temporary URL for the new image
        if ($this->profile_image) {
            $this->temp_image_url = $this->profile_image->temporaryUrl();
        }
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

        // Handle the profile image upload
        if ($this->profile_image && !is_string($this->profile_image)) {
            $path = $this->profile_image->store('profile_images', 'public');
            $user->profile_image = $path;
            $this->temp_image_url = null;
        }

        $user->save();

        $this->dispatch('notify', 'success', __trans('Profile updated successfully!'));

        $this->skipRender();
    }

    public function render()
    {
        return view('livewire.profile', [
            'temp_image_url' => $this->temp_image_url
        ]);
    }
}
