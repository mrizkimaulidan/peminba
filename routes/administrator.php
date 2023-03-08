<?php

use App\Http\Controllers\Administrator\CommodityController;
use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Administrator\ProgramStudyController;
use App\Http\Controllers\Administrator\SchoolClassController;
use App\Http\Controllers\Administrator\StudentController;
use App\Http\Controllers\Administrator\SubjectController;
use App\Http\Controllers\Administrator\UserController;
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

    Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');
    Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects.store');
    Route::put('/subjects/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
    Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy'])->name('subjects.destroy');

    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});
