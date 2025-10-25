<?php

use Illuminate\Support\Facades\Route;
use Modules\Lessons\Http\Controllers\LessonsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('lessons', LessonsController::class)->names('lessons');
});
