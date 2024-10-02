<?php

use Illuminate\Support\Facades\Route;

// Override default routes

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
