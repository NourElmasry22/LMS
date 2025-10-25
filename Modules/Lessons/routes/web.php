<?php

use Illuminate\Support\Facades\Route;
use Modules\Lessons\Http\Controllers\LessonsController;
use Modules\Lessons\Livewire\LessonDetails;

Route::get('/lessons/{id}', LessonDetails::class)->name('lessons.show');
