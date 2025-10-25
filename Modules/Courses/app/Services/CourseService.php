<?php

namespace Modules\Courses\Services;

use Modules\Courses\Repositories\CourseRepositoryInterface;
use Modules\Courses\DTOs\CourseData;
use Modules\Courses\Models\Course;

class CourseService
{
    public function __construct(
        protected CourseRepositoryInterface $repository
    ) {}

    /**
     * Return all courses with lesson count.
     */
    public function listAll()
    {
        return $this->repository->all();
    }

    /**
     * Return course by slug with lessons.
     */
    public function getBySlug(string $slug): ?Course
    {
        return $this->repository->findBySlug($slug);
    }

    /**
     * Create a new course.
     */
    public function create(CourseData $data): Course
    {
        return $this->repository->create($data->toArray());
    }

    /**
     * Update an existing course.
     */
    public function update(Course $course, CourseData $data): Course
    {
        return $this->repository->update($course, $data->toArray());
    }

    /**
     * Delete a course.
     */
    public function delete(Course $course): void
    {
        $this->repository->delete($course);
    }
}
