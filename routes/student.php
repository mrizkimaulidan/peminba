<?php

use App\Http\Controllers\Student\BorrowingController;
use App\Http\Controllers\Student\BorrowingHistoryController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\ProfileSettingController;

Route::middleware('auth:student')->name('students.')->prefix('student')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource('borrowings', BorrowingController::class)->except(
        'create',
        'show',
        'edit',
        'destroy'
    );
    Route::put('/borrowings/return/{borrowing}', [BorrowingController::class, 'returnBorrowing'])->name('borrowings.return');

    Route::get('/borrowings/history', BorrowingHistoryController::class)->name('borrowings-history.index');

    Route::controller(ProfileSettingController::class)->group(function () {
        Route::get('/profile/settings', 'index')->name('profile-settings.index');
        Route::put('/profile/settings', 'update')->name('profile-settings.update');
    });
});
