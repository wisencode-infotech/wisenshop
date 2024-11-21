<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ProductVariation;
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

    public $product_variation_id;
    public $stock = 0;

    protected $listeners = ['productVariantChanged'];

    public function mount($product, $product_variation_id = null)
    {
        // Check if the user is logged in
        $this->isLoggedIn = Auth::check();

        $this->product = $product;

        $this->product_variation_id = $product_variation_id;

        if (empty($product_variation_id)) {
            $product_variations_query = ProductVariation::select('id')->where('product_id', $this->product->id);
            $this->product_variation_id = ($product_variations_query->count() > 0) ? $product_variations_query->first()->id ?? null : null;
        }

        $this->setStock();

        // If logged in, set the user's email
        if ($this->isLoggedIn) {
            $this->email = Auth::user()->email;

            if (!empty($product_variation_id)) {
                $this->isReminded = StockReminder::where('product_id', $this->product->id)
                ->where('product_variation_id', $product_variation_id)
                ->where('email', Auth::user()->email)
                ->exists();
            } else {
                $this->isReminded = StockReminder::where('product_id', $this->product->id)
                            ->where('email', Auth::user()->email)
                            ->exists();
            }
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
                        'product_variation_id' => $this->product_variation_id,
                        'email' => $this->email,
                    ]);
                }

            $this->isReminded = true;
            
            $this->dispatch('notify', 'success', __trans('Reminder set successfully!'));
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
        ], [
            'email.required' => __trans('Email must be required'),
            'email.email' => __trans('Email must be valid')
        ]);

        if (!empty($this->product_variation_id)) {
            if (!StockReminder::where('product_id', $this->product->id)
            ->where('product_variation_id', $this->product_variation_id)
            ->where('email', $this->email)
            ->exists()) {
                StockReminder::create([
                'product_id' => $this->product->id,
                'product_variation_id' => $this->product_variation_id,
                'email' => $this->email,
                ]);
            }
        } else {
            if (!StockReminder::where('product_id', $this->product->id)
            ->where('email', $this->email)
            ->exists()) {
                StockReminder::create([
                'product_id' => $this->product->id,
                'email' => $this->email,
                ]);
            }
        }

        $this->isReminded = true;
        $this->isDrawerOpen = false; // Close the drawer after saving

        $this->dispatch('notify', 'success', __trans('Reminder set successfully!'));
    }

    public function setStock()
    {
        if (!empty($this->product_variation_id))
            $this->stock = ProductVariation::select('stock')->where('id', $this->product_variation_id)->first()->stock ?? 0;
        else
            $this->stock = Product::select('stock')->where('id', $this->product->id)->first()->stock ?? 0;
    }

    public function productVariantChanged($product_id, $product_variation_id = null)
    {
        $this->product_variation_id = $product_variation_id;

        $this->setStock();
    }

    public function render()
    {
        return __appLivewireView('remind-when-stock-available');
    }
}
