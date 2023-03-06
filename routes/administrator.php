<?php

use App\Http\Controllers\Administrator\CommodityController;
use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Administrator\ProgramStudyController;
use App\Http\Controllers\Authentication\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:administrator')->name('administrators.')->prefix('administrator')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/commodities', [CommodityController::class, 'index'])->name('commodities.index');
    Route::post('/commodities', [CommodityController::class, 'store'])->name('commodities.store');
    Route::put('/commodities/{commodity}', [CommodityController::class, 'update'])->name('commodities.update');
    Route::delete('/commodities/{commodity}', [CommodityController::class, 'destroy'])->name('commodities.destroy');

    Route::get('/program-studies', [ProgramStudyController::class, 'index'])->name('program-studies.index');
    Route::put('/program-studies/{program_study}', [ProgramStudyController::class, 'update'])->name('program-studies.update');
    Route::delete('/program-studies/{program_study}', [ProgramStudyController::class, 'destroy'])->name('program-studies.destroy');
});
