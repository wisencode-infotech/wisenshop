<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstallController;

Route::prefix('install')->name('install.')->middleware('is_install')->group(function () {
    Route::get('/', [InstallController::class, 'start'])->name('start');
    Route::post('/step-1', [InstallController::class, 'proceedStep1'])->name('step-1.proceed');
    Route::get('/complete', [InstallController::class, 'complete'])->name('complete');
    Route::post('/onComplete', [InstallController::class, 'onComplete'])->name('on-complete');
});