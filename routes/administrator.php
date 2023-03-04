<?php

use App\Http\Controllers\Administrator\CommodityController;
use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Authentication\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:administrator')->name('administrators.')->prefix('administrator')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/commodities', [CommodityController::class, 'index'])->name('commodities.index');
});
