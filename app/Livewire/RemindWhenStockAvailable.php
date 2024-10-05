<?php

namespace App\Livewire;

use App\Models\StockReminder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RemindWhenStockAvailable extends Component
{
    public $email;
    public $isLoggedIn;
    public $isDrawerOpen = false;
    public $isReminded = false; // This will toggle the bell icon
    public $product;

    public function mount($product)
    {
        // Check if the user is logged in
        $this->isLoggedIn = Auth::check();

        $this->product = $product;

        // If logged in, set the user's email
        if ($this->isLoggedIn) {
            $this->email = Auth::user()->email;
            $this->isReminded = StockReminder::where('product_id', $this->product->id)
                            ->where('email', Auth::user()->email)
                            ->exists();
        }
    }

    public function remind()
    {
        // If the user is logged in, save the reminder directly
        if ($this->isLoggedIn) {
            // Logic to save the reminder, for example:
                if (!StockReminder::where('product_id', $this->product->id)
                ->where('email', $this->email)
                ->exists()) {
                    // Create stock reminder for user
                    StockReminder::create([
                        'product_id' => $this->product->id,
                        'email' => $this->email,
                    ]);
                }

            $this->isReminded = true;

            session()->flash('message', 'Reminder set successfully!');
        } else {
            // If the user is not logged in, open the drawer to ask for the email
            $this->isDrawerOpen = true;
        }
    }

    public function submitEmail()
    {
        // Validate email input
        $this->validate([
            'email' => 'required|email'
        ]);

        // Check if the product is already in the reminders for this email
        if (!StockReminder::where('product_id', $this->product->id)
                          ->where('email', $this->email)
                          ->exists()) {
            // Create stock reminder for guest
            StockReminder::create([
                'product_id' => $this->product->id,
                'email' => $this->email,
            ]);
        }

        $this->isReminded = true;
        $this->isDrawerOpen = false; // Close the drawer after saving

        session()->flash('message', 'Reminder set successfully!');
    }

    public function render()
    {
        return view('livewire.remind-when-stock-available');
    }
}
