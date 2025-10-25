<?php

namespace Modules\Courses\Repositories;

use Modules\Courses\Models\Course;
use Illuminate\Database\Eloquent\Collection;

class EloquentCourseRepository implements CourseRepositoryInterface
{
    public function all(): Collection
    {
        return Course::query()->withCount('lessons')->get();
    }

    public function find(int $id): ?Course
    {
        return Course::find($id);
    }

    public function findBySlug(string $slug): ?Course
    {
        return Course::with('lessons')->where('slug', $slug)->first();
    }

    public function create(array $data): Course
    {
        return Course::create($data);
    }

    public function update(Course $course, array $data): Course
    {
        $course->update($data);
        return $course;
    }

    public function delete(Course $course): void
    {
        $course->delete();
    }
}
