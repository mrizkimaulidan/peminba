<?php

use App\Http\Controllers\Exports\BorrowingReportExport;
use App\Http\Controllers\Officer\BorrowingController;
use App\Http\Controllers\Officer\BorrowingHistoryController;
use App\Http\Controllers\Officer\BorrowingReportController;
use App\Http\Controllers\Officer\DashboardController;
use App\Http\Controllers\Officer\ProfileSettingController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:officer')->name('officers.')->prefix('officer')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::controller(BorrowingController::class)->group(function () {
        Route::get('/borrowings', 'index')->name('borrowings.index');
        Route::get('/borrowings/validate/{borrowing}', 'validateBorrowing')->name('borrowings.validate');
    });

    Route::get('/borrowings/report', [BorrowingReportController::class, 'index'])->name('borrowings-report.index');
    Route::get('/borrowings/history', BorrowingHistoryController::class)->name('borrowings-history.index');

    Route::controller(ProfileSettingController::class)->group(function () {
        Route::get('/profile/settings', 'index')->name('profile-settings.index');
        Route::put('/profile/settings', 'update')->name('profile-settings.update');
    });

    Route::post('/borrowings/report/export', [BorrowingReportExport::class, 'export'])->name('borrowings-report.export');
});
