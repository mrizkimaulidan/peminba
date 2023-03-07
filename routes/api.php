<?php

use App\Http\Controllers\Administrator\API\v1\CommodityController;
use App\Http\Controllers\Administrator\API\v1\ProgramStudyController;
use App\Http\Controllers\Administrator\API\v1\SchoolClassController;
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

Route::name('administrator.api.v1.')->prefix('v1')->group(function () {
    Route::get('/commodities/{commodity}', [CommodityController::class, 'show'])->name('commodities.show');
    Route::get('/program-studies/{program_study}', [ProgramStudyController::class, 'show'])->name('program-studies.show');
    Route::get('/school-classes/{school_class}', [SchoolClassController::class, 'show'])->name('school-classes.show');
});
