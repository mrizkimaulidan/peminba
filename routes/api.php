<?php

use App\Http\Controllers\API\v1\CommodityController;
use App\Http\Controllers\API\v1\ProgramStudyController;
use App\Http\Controllers\API\v1\SchoolClassController;
use App\Http\Controllers\API\v1\StudentController;
use App\Http\Controllers\API\v1\SubjectController;
use App\Http\Controllers\API\v1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.v1.')->prefix('v1')->group(function () {
    Route::get('/commodities/{commodity}', [CommodityController::class, 'show'])->name('commodities.show');
    Route::get('/program-studies/{program_study}', [ProgramStudyController::class, 'show'])->name('program-studies.show');
    Route::get('/school-classes/{school_class}', [SchoolClassController::class, 'show'])->name('school-classes.show');
    Route::get('/subjects/{subject}', [SubjectController::class, 'show'])->name('subjects.show');
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
});
