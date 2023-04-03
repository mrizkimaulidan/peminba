<?php

use App\Http\Controllers\Student\DashboardController;

Route::middleware('auth:student')->name('students.')->prefix('student')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
});
