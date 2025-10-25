<?php

namespace Modules\Lessons\DTOs;

class LessonData
{
    public function __construct(
        public int $course_id,
        public string $video_url,
        public string $title,
        public bool $is_free_preview = false,
        public ?string $content = null,
        public int $order = 0,
    ) {}

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
