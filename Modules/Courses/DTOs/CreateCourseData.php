<?php

namespace Modules\Courses\DTOs;

class CreateCourseData
{
    public function __construct(
        public string $title,
        public string $slug ,
        public string $image ,
        public string $category,
        public string $description ,
        public string $level = 'beginner',
        public int $no_of_lectures = 0,
        public ?int $duration = null,
    ) {}

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
