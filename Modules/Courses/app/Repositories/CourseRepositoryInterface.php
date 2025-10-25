<?php

namespace Modules\Courses\Repositories;

use Modules\Courses\Models\Course;
use Illuminate\Database\Eloquent\Collection;

interface CourseRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id): ?Course;
    public function findBySlug(string $slug): ?Course;
    public function create(array $data): Course;
    public function update(Course $course, array $data): Course;
    public function delete(Course $course): void;
}
