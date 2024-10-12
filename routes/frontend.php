<?php

use App\Helpers\CartHelper;
use App\Helpers\WishlistHelper;
use App\Http\Controllers\PaymentProcessController;
use Illuminate\Support\Facades\Route;
use App\Livewire\ContactPage;
use App\Livewire\HomePage;
use App\Livewire\Login;
use App\Livewire\Register;
use App\Livewire\ForgotPassword;
use App\Livewire\ResetPassword;
use App\Livewire\Logout;
use App\Livewire\ProductDetail;
use App\Livewire\CartPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Livewire\Livewire;
use Illuminate\Support\Facades\Cache;
use App\Livewire\GuestCheckout;
use App\Livewire\Checkout;
use App\Http\Middleware\RedirectIfNotLoggedIn;
use App\Livewire\OrderDetails;
use App\Livewire\MyOrders;
use App\Livewire\Profile;
use App\Livewire\MyWishlist;
use App\Livewire\ThankYouPage;
use App\Livewire\NotificationList;



// Homepage
Route::get('/', HomePage::class)->name('home');

// Contact Us
Route::get('/contact-us', ContactPage::class)->name('contact-us');

Route::get('/product-detail/{product_slug}', ProductDetail::class)->name('product-detail');

Route::get('/cart', CartPage::class)->name('cart');
Route::get('/my-wishlist', MyWishlist::class)->name('my-wishlist');

Route::get('login', Login::class)->name('login');
Route::post('login', [Login::class, 'authenticate'])->name('authenticate');
Route::get('logout', [Logout::class, 'logout'])->name('logout');

Route::get('register', Register::class)->name('register');
Route::get('forgot-password', ForgotPassword::class)->name('forgot-password');
Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');

Route::get('/guest-checkout', GuestCheckout::class)->name('guest.checkout');

Route::middleware(RedirectIfNotLoggedIn::class)->group(function () {
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/my-orders', MyOrders::class)->name('my-orders');
    Route::get('/checkout', Checkout::class)->name('checkout');
    Route::get('/thank-you/{order_id}', ThankYouPage::class)->name('thank-you');
    Route::get('/notifications', NotificationList::class)->name('notifications.index');
});

Route::prefix('orders')->name('orders.')->group(function () {
    Route::prefix('{order}')->group(function () {
        Route::get('details', OrderDetails::class)->name('details');
    });
});

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


Route::get('/fetch-session-preferences', function () {
    return response()->json([
        'cart' => CartHelper::items(),
        'wishlist' => WishlistHelper::items()
    ]);
})->name('fetch-session-preferences');

Route::post('/sync-session-preferences', function (Request $request) {

    $cart = $request->cart ?? [];
    $cart_updated = $wishlist_updated = false;

    $wishlist = $request->wishlist ?? [];

    $wishlist = array_filter($wishlist, function($item) {
        return !empty($item); // Filter out any empty items
    });

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

Route::get('/payment-process/{order}', [PaymentProcessController::class, 'index'])->name('payment-process');
Route::post('/coinpayments/callback', [PaymentProcessController::class, 'coinpayments_callback'])->name('coinpayments.callback');

Livewire::setScriptRoute(function ($handle) {
    return Route::get(url('/') . '/livewire/livewire.js', $handle);
});
