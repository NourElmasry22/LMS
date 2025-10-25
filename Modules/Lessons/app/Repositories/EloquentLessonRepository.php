<?php

namespace Modules\Lessons\Repositories;

use Modules\Lessons\Models\Lesson;
use Illuminate\Database\Eloquent\Collection;

class EloquentLessonRepository implements LessonRepositoryInterface
{
    public function allForCourse(int $courseId): Collection
    {
        return Lesson::where('course_id', $courseId)->orderBy('order')->get();
    }

    public function create(array $data): Lesson
    {
        return Lesson::create($data);
    }

    public function update(Lesson $lesson, array $data): Lesson
    {
        $lesson->update($data);
        return $lesson;
    }

    public function delete(Lesson $lesson): void
    {
        $lesson->delete();
    }
}
