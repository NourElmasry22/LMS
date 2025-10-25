<?php

use Illuminate\Support\Facades\Route;
use Modules\Cores\Http\Controllers\CoresController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('cores', CoresController::class)->names('cores');
});
