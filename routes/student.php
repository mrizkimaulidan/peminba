<?php

use App\Http\Controllers\Student\BorrowingController;
use App\Http\Controllers\Student\DashboardController;

Route::middleware('auth:student')->name('students.')->prefix('student')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/borrowings', [BorrowingController::class, 'index'])->name('borrowings.index');
    Route::put('/borrowings/{borrowing}', [BorrowingController::class, 'update'])->name('borrowings.update');
    Route::put('/borrowings/returned/{borrowing}', [BorrowingController::class, 'returned'])->name('borrowings.returned');
});
