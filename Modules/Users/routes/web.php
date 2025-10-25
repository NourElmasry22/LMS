<?php

use Illuminate\Support\Facades\Route;
use Modules\Users\Http\Controllers\UsersController;



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UsersController::class, 'dashboard'])->name('dashboard');
});
