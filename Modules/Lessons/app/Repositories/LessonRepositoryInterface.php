<?php

namespace Modules\Lessons\Repositories;

use Modules\Lessons\Models\Lesson;
use Illuminate\Database\Eloquent\Collection;

interface LessonRepositoryInterface
{
    public function allForCourse(int $courseId): Collection;
    public function create(array $data): Lesson;
    public function update(Lesson $lesson, array $data): Lesson;
    public function delete(Lesson $lesson): void;
}
