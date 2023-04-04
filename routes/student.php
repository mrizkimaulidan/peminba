<?php

use App\Http\Controllers\Student\BorrowingController;
use App\Http\Controllers\Student\DashboardController;

Route::middleware('auth:student')->name('students.')->prefix('student')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/borrowings', [BorrowingController::class, 'index'])->name('borrowings.index');
});
