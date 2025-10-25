<?php

namespace Modules\Courses\Actions;

use Modules\Courses\DTOs\UpdateCourseData;
use Modules\Courses\Models\Course;
use Modules\Courses\Repositories\CourseRepositoryInterface;

class UpdateCourseAction
{
    public function __construct(protected CourseRepositoryInterface $repository) {}

    public function execute(Course $course, UpdateCourseData $data)
    {
        return $this->repository->update($course, $data->toArray());
    }
}
