<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\UserController;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('frontend.home');

// Category Page with SEO-friendly URL
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('frontend.category');

// Product Details Page with SEO-friendly URL
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('frontend.product');

// Cart Page
Route::get('/cart', [CartController::class, 'index'])->name('frontend.cart');

// Checkout Page
Route::get('/checkout', [OrderController::class, 'checkout'])->name('frontend.checkout');

// User Dashboard (React will handle internal routing)
Route::get('/user/{section?}', [UserController::class, 'dashboard'])->name('frontend.user.dashboard');

// Search Page
Route::get('/search', [ProductController::class, 'search'])->name('frontend.search');

// Order Confirmation (SEO-friendly)
Route::get('/order/confirmation/{order_number}', [OrderController::class, 'confirmation'])->name('frontend.order.confirmation');

// Fallback for React Routing
Route::get('{any}', function () {
    return view('frontend.index'); // This serves the React app
})->where('any', '.*');
