<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstallController;

// Route::get('/install', [InstallController::class, 'showInstallForm'])->name('install');
// Route::post('/install', [InstallController::class, 'install'])->name('install.post');

Route::get('install', [InstallController::class, 'showStep1Form'])->name('install');
Route::post('install/step1', [InstallController::class, 'handleStep1'])->name('install.step1.post');
Route::get('install/step2', [InstallController::class, 'showStep2Form'])->name('install.step2');
Route::post('install/step2', [InstallController::class, 'handleStep2'])->name('install.step2.post');