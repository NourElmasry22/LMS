<?php

use Illuminate\Support\Facades\Route;
use Modules\Courses\Http\Controllers\CoursesController;
use Modules\Courses\Livewire\CourseInfo;


Route::get('/courses', [CoursesController::class, 'index'])->name('courses.show');
Route::get('/courses/{slug}', CourseInfo::class)->name('courses.details');

