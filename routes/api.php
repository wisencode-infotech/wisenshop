<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\PaymentController;

// Authentication Routes (Sanctum/JWT)
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

// Protected Routes - Authenticated Users
Route::middleware('auth:sanctum')->group(function () {
    
    // Product & Category Routes
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{slug}', [CategoryController::class, 'show']);
    
    // Cart Routes
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add', [CartController::class, 'store']);
    Route::delete('/cart/remove/{id}', [CartController::class, 'destroy']);
    
    // Order Routes
    Route::post('/order', [OrderController::class, 'store']);
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{order_number}', [OrderController::class, 'show']);
    
    // User Routes
    Route::get('/user/profile', [UserController::class, 'profile']);
    Route::put('/user/update', [UserController::class, 'updateProfile']);
    Route::get('/user/orders', [UserController::class, 'orders']);

    // Review Routes
    Route::post('/product/{id}/review', [ReviewController::class, 'store']);
    
    // Payment Routes
    Route::post('/payment/checkout', [PaymentController::class, 'checkout']);
});

// Open Routes
Route::get('/product/{slug}', [ProductController::class, 'show']); // Product details
Route::get('/category/{slug}', [CategoryController::class, 'show']); // Category page
Route::get('/search', [ProductController::class, 'search']); // Search page
