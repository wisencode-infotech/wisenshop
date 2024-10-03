<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ContactPage;
use App\Livewire\HomePage;
use App\Livewire\Login;
use App\Livewire\ProductDetail;
use App\Livewire\CartPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Livewire\Livewire;

// Homepage
Route::get('/', HomePage::class)->name('home');

// Contact Us
Route::get('/contact-us', ContactPage::class)->name('contact-us');

Route::get('/product-detail/{product_slug}', ProductDetail::class)->name('product-detail');

Route::get('/cart', CartPage::class)->name('cart');

Route::get('login', Login::class)->name('login');
Route::post('login', [Login::class, 'authenticate'])->name('authenticate');
// Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('register', [RegisterController::class, 'register']);

// Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('password/reset', [ResetPasswordController::class, 'reset']);

Route::get('/locale/{locale}', function ($locale) {
    session(['locale' => $locale]);
    return redirect()->back();
});

Route::get('/fetch-session-cart', function() {
    return response()->json([
        'cart' => shoppingCart()
    ]);
})->name('fetch-session-cart');

Route::post('/sync-session-cart', function(Request $request) {

    $cart = $request->cart ?? [];
    $updated = false;

    if (!empty($cart) && empty(shoppingCart())) {
        Session::put('cart', $request->cart ?? []);
        $updated = true;
    }

    return response()->json([
        'cart' => shoppingCart(),
        'updated' => $updated
    ]);

})->name('sync-session-cart');

Livewire::setScriptRoute(function ($handle) {
    return Route::get(url('/') . '/livewire/livewire.js', $handle);
});
