<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Livewire\Register;
use Modules\Auth\Http\Controllers\RegisterController;


Route::get('\register', [Register::class, 'render'])->name('show.register');
Route::post('\register', [RegisterController::class, 'register'])->name('register');
