<?php

use App\Http\Controllers\Administrator\CommodityController;
use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Administrator\ProgramStudyController;
use App\Http\Controllers\Administrator\SchoolClassController;
use App\Http\Controllers\Authentication\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:administrator')->name('administrators.')->prefix('administrator')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/commodities', [CommodityController::class, 'index'])->name('commodities.index');
    Route::post('/commodities', [CommodityController::class, 'store'])->name('commodities.store');
    Route::put('/commodities/{commodity}', [CommodityController::class, 'update'])->name('commodities.update');
    Route::delete('/commodities/{commodity}', [CommodityController::class, 'destroy'])->name('commodities.destroy');

    Route::get('/program-studies', [ProgramStudyController::class, 'index'])->name('program-studies.index');
    Route::post('/program-studies', [ProgramStudyController::class, 'store'])->name('program-studies.store');
    Route::put('/program-studies/{program_study}', [ProgramStudyController::class, 'update'])->name('program-studies.update');
    Route::delete('/program-studies/{program_study}', [ProgramStudyController::class, 'destroy'])->name('program-studies.destroy');

    Route::get('/school-classes', [SchoolClassController::class, 'index'])->name('school-classes.index');
    Route::post('/school-classes', [SchoolClassController::class, 'store'])->name('school-classes.store');
    Route::put('/school-classes/{school_class}', [SchoolClassController::class, 'update'])->name('school-classes.update');
    Route::delete('/school-classes/{school_class}', [SchoolClassController::class, 'destroy'])->name('school-classes.destroy');
});
