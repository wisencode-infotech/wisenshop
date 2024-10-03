<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SiteBannerController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\TranslationController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\CurrencyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SettingController;

Auth::routes();

Route::get('/', [HomeController::class, 'root'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('category', CategoryController::class);
    Route::resource('site-banner', SiteBannerController::class);
    Route::resource('product', ProductController::class);
    Route::resource('translation', TranslationController::class);
    Route::resource('order', OrderController::class);
    Route::resource('currency', CurrencyController::class);
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('update-settings', [SettingController::class, 'update'])->name('settings.update');
});