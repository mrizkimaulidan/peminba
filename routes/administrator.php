<?php

use App\Http\Controllers\Administrator\BorrowingController;
use App\Http\Controllers\Administrator\BorrowingHistoryController;
use App\Http\Controllers\Administrator\BorrowingReportController;
use App\Http\Controllers\Administrator\CommodityController;
use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Administrator\ProfileSettingController;
use App\Http\Controllers\Administrator\ProgramStudyController;
use App\Http\Controllers\Administrator\SchoolClassController;
use App\Http\Controllers\Administrator\StudentController;
use App\Http\Controllers\Administrator\UserController;
use App\Http\Controllers\Exports\BorrowingReportExport;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:administrator')->name('administrators.')->prefix('administrator')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource('commodities', CommodityController::class)->except(
        'create',
        'show',
        'edit'
    );
    Route::post('/commodities/import', [CommodityController::class, 'import'])->name('commodities.import');

    Route::resource('program-studies', ProgramStudyController::class)->except(
        'create',
        'show',
        'edit'
    );
    Route::post('/program-studies/import', [ProgramStudyController::class, 'import'])->name('program-studies.import');

    Route::resource('school-classes', SchoolClassController::class)->except(
        'create',
        'show',
        'edit'
    );
    Route::post('/school-classes/import', [SchoolClassController::class, 'import'])->name('school-classes.import');

    Route::resource('students', StudentController::class)->except(
        'create',
        'show',
        'edit'
    );

    Route::resource('users', UserController::class)->except(
        'create',
        'show',
        'edit'
    );

    Route::get('/borrowings', [BorrowingController::class, 'index'])->name('borrowings.index');
    Route::get('/borrowings/report', [BorrowingReportController::class, 'index'])->name('borrowings-report.index');

    Route::get('/borrowings/history', BorrowingHistoryController::class)->name('borrowings-history.index');

    Route::controller(ProfileSettingController::class)->group(function () {
        Route::get('/profile/settings', 'index')->name('profile-settings.index');
        Route::put('/profile/settings', 'update')->name('profile-settings.update');
    });

    Route::get('/borrowings/report/export/{start_date}/{end_date}', [BorrowingReportExport::class, 'export'])->name('borrowings-report.export');
});
