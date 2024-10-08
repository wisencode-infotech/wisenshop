<?php

use App\Helpers\CartHelper;
use App\Helpers\WishlistHelper;
use Illuminate\Support\Facades\Route;
use App\Livewire\ContactPage;
use App\Livewire\HomePage;
use App\Livewire\Login;
use App\Livewire\Logout;
use App\Livewire\ProductDetail;
use App\Livewire\CartPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Livewire\Livewire;
use Illuminate\Support\Facades\App;
use App\Http\Middleware\SetLocale;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Cache;
use App\Livewire\GuestCheckout;
use App\Livewire\Checkout;
use App\Http\Middleware\RedirectIfNotLoggedIn;

// Homepage
Route::get('/', HomePage::class)->name('home');

// Contact Us
Route::get('/contact-us', ContactPage::class)->name('contact-us');

Route::get('/product-detail/{product_slug}', ProductDetail::class)->name('product-detail');

Route::get('/cart', CartPage::class)->name('cart');

Route::get('login', Login::class)->name('login');
Route::post('login', [Login::class, 'authenticate'])->name('authenticate');
Route::get('logout', [Logout::class, 'logout'])->name('logout');

Route::get('/guest-checkout', GuestCheckout::class)->name('guest.checkout');
Route::get('/checkout', Checkout::class)->name('checkout')->middleware(RedirectIfNotLoggedIn::class);

// Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('register', [RegisterController::class, 'register']);

// Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('password/reset', [ResetPasswordController::class, 'reset']);

// Route::get('/locale/{locale}', function ($locale) {
//     app()->setLocale($locale);
//     return redirect()->back();
// });

// Route::get('/locale/{locale}', function ($locale) {
//     app()->setLocale($locale);
//     Session::put('locale', $locale);
//     return redirect()->back();
// })->name('change.locale');

Route::get('/locale/{locale}', function (string $locale) {
    Session::put('app_locale', $locale);

    return redirect()->back();
})->name('change.locale');

Route::get('/currency/{currency}', function (string $currency) {
    
    $cache_key = "user.currency";

    Cache::forget($cache_key);

    Session::put('user_currency_code', $currency);

    return redirect()->back();
})->name('change.currency');


Route::get('/fetch-session-preferences', function() {
    return response()->json([
        'cart' => CartHelper::items(),
        'wishlist' => WishlistHelper::items()
    ]);
})->name('fetch-session-preferences');

Route::post('/sync-session-preferences', function(Request $request) {

    $cart = $request->cart ?? [];
    $cart_updated = $wishlist_updated = false;

    $wishlist = $request->wishlist ?? [];

    $stored_shopping_cart = CartHelper::items();
    $stored_wishlist = WishlistHelper::items();

    if (!empty($cart) && empty($stored_shopping_cart)) {
        Session::put('cart', $cart ?? []);
        $cart_updated = true;
    }

    if (!empty($wishlist) && empty($stored_wishlist)) {
        Session::put('wishlist', $wishlist ?? []);
        $wishlist_updated = true;
    }

    return response()->json([
        'cart' => $stored_shopping_cart,
        'wishlist' => $stored_wishlist,
        'cart_updated' => $cart_updated,
        'wishlist_updated' => $wishlist_updated
    ]);

})->name('sync-session-preferences');

Livewire::setScriptRoute(function ($handle) {
    return Route::get(url('/') . '/livewire/livewire.js', $handle);
});