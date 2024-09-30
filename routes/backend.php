<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ReviewController;

// Admin Dashboard
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Product Management
    Route::prefix('admin/products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('/', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('/{product}', [ProductController::class, 'update'])->name('admin.products.update');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    });

    // Order Management
    Route::prefix('admin/orders')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('admin.orders.index');
        Route::get('/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
        Route::post('/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    });

    // Category Management
    Route::resource('admin/categories', CategoryController::class, ['as' => 'admin']);

    // User Management
    Route::resource('admin/users', UserController::class, ['as' => 'admin']);

    // Review Management
    Route::resource('admin/reviews', ReviewController::class, ['as' => 'admin']);
});
