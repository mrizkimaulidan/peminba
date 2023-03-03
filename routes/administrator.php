<?php

use App\Http\Controllers\Authentication\LoginController;
use Illuminate\Support\Facades\Route;

Route::name('administrators.')->prefix('administrator')->group(function () {
    return 'Administrator dashboard';
});
