<?php

namespace Modules\Courses\DTOs;

use Illuminate\Http\Request;

class UpdateCourseData
{
    public function __construct(
        public ?string $title = null,
        public ?string $image = null,
        public ?string $category = null,
        public ?string $description = null,
        public ?string $level = null,
        public ?int $no_of_lectures = null,
        public ?int $duration = null,
    ) {}


 public function toArray(): array
    {
        return get_object_vars($this);
    }
}
