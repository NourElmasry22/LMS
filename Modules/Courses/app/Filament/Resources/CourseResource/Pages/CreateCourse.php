<?php

namespace Modules\Courses\Filament\Resources\CourseResource\Pages;

use Modules\Courses\Filament\Resources\CourseResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCourse extends CreateRecord
{
    protected static string $resource = CourseResource::class;
}
