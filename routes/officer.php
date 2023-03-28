<?php

use App\Http\Controllers\Officer\BorrowingController;
use App\Http\Controllers\Officer\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:officer')->name('officers.')->prefix('officer')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/borrowings', [BorrowingController::class, 'index'])->name('borrowings.index');
    Route::get('/borrowings/validate/{borrowing}', [BorrowingController::class, 'validateBorrowing'])->name('borrowings.validate');
});
