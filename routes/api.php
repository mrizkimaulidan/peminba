<?php

use App\Http\Controllers\Administrator\API\v1\CommodityController as AdministratorCommodityController;
use App\Http\Controllers\Administrator\API\v1\ProgramStudyController as AdministratorProgramStudyController;
use App\Http\Controllers\Administrator\API\v1\SchoolClassController as AdministratorSchoolClassController;
use App\Http\Controllers\Administrator\API\v1\StudentController as AdministratorStudentController;
use App\Http\Controllers\Administrator\API\v1\SubjectController as AdministratorSubjectController;
use App\Http\Controllers\Administrator\API\v1\UserController as AdministratorUserController;
use App\Http\Controllers\Officer\API\v1\CommodityController as OfficerCommodityController;
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
    Route::get('/commodities/{commodity}', [AdministratorCommodityController::class, 'show'])->name('commodities.show');
    Route::get('/program-studies/{program_study}', [AdministratorProgramStudyController::class, 'show'])->name('program-studies.show');
    Route::get('/school-classes/{school_class}', [AdministratorSchoolClassController::class, 'show'])->name('school-classes.show');
    Route::get('/subjects/{subject}', [AdministratorSubjectController::class, 'show'])->name('subjects.show');
    Route::get('/students/{student}', [AdministratorStudentController::class, 'show'])->name('students.show');
    Route::get('/users/{user}', [AdministratorUserController::class, 'show'])->name('users.show');
});
