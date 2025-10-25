<?php

use Illuminate\Support\Facades\Route;
use Modules\Cores\Http\Controllers\CoresController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('cores', CoresController::class)->names('cores');
});

Route::get('/', [CoresController::class, 'index'])->name('home');

