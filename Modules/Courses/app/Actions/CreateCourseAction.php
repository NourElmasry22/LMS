<?php

namespace Modules\Courses\Actions;

use Modules\Courses\DTOs\CreateCourseData;
use Modules\Courses\Repositories\CourseRepositoryInterface;

class CreateCourseAction
{
    public function __construct(protected CourseRepositoryInterface $repository) {}

    public function execute(CreateCourseData $data)
    {
        return $this->repository->create($data->toArray());
    }
}
