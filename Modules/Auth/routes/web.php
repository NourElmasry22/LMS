<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Livewire\Register;
use Modules\Auth\Http\Controllers\RegisterController;
use Modules\Auth\Livewire\Login;
use Modules\Auth\Http\Controllers\SessionController;


Route::middleware('guest')->group(function (){
    Route::get('\register', [Register::class, 'render'])->name('show.register');
    Route::get('\login', [Login::class, 'login'])->name('show.login');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/login', [SessionController::class, 'login'])->name('login');

});



Route::post('/logout', [SessionController::class, 'logout'])->name('logout');