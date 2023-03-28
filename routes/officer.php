<?php

use App\Http\Controllers\Officer\DashboardController;
use Illuminate\Support\Facades\Route;

Route::name('officers.')->prefix('officer')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
});
