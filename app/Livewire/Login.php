<?php

namespace App\Livewire;

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
            
           $cart_items = Session::get('cart', []);

            foreach ($cart_items as $product_id => $value) {

                $cart_product = Cart::where('product_id', $product_id)->where('user_id', auth()->user()->id)->first();

                $quantity = $value['quantity'];

                if(!empty($cart_product)){
                    $quantity = $quantity + $cart_product->quantity;
                }else{
                    $cart_product = new Cart();
                }
                
                $cart_product->user_id = auth()->user()->id;
                $cart_product->product_id = $product_id;
                $cart_product->quantity = $quantity;
                $cart_product->save();
            }

            Session::forget('cart');

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
