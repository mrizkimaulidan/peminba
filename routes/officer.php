<?php

use App\Http\Controllers\Exports\BorrowingReportExport;
use App\Http\Controllers\Officer\BorrowingController;
use App\Http\Controllers\Officer\BorrowingHistoryController;
use App\Http\Controllers\Officer\BorrowingReportController;
use App\Http\Controllers\Officer\CommodityController;
use App\Http\Controllers\Officer\DashboardController;
use App\Http\Controllers\Officer\ProfileSettingController;
use App\Http\Controllers\Officer\StudentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:officer')->name('officers.')->prefix('officer')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/commodities', [CommodityController::class, 'index'])->name('commodities.index');
    Route::post('/commodities', [CommodityController::class, 'store'])->name('commodities.store');
    Route::put('/commodities/{commodity}', [CommodityController::class, 'update'])->name('commodities.update');
    Route::delete('/commodities/{commodity}', [CommodityController::class, 'destroy'])->name('commodities.destroy');

    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::put('/students/{commodity}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{commodity}', [StudentController::class, 'destroy'])->name('students.destroy');

    Route::get('/borrowings', [BorrowingController::class, 'index'])->name('borrowings.index');
    Route::get('/borrowings/report', [BorrowingReportController::class, 'index'])->name('borrowings-report.index');
    Route::get('/borrowings/validate/{borrowing}', [BorrowingController::class, 'validateBorrowing'])->name('borrowings.validate');

    Route::get('/borrowings/history', BorrowingHistoryController::class)->name('borrowings-history.index');

    Route::get('/profile/settings', [ProfileSettingController::class, 'index'])->name('profile-settings.index');
    Route::put('/profile/settings', [ProfileSettingController::class, 'update'])->name('profile-settings.update');

    Route::get('/borrowings/report/export/{start_date}/{end_date}', [BorrowingReportExport::class, 'export'])->name('borrowings-report.export');
});
