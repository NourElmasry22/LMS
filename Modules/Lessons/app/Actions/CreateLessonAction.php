<?php

namespace Modules\Lessons\Actions;

use Modules\Lessons\DTOs\LessonData;
use Modules\Lessons\Repositories\LessonRepositoryInterface;

class CreateLessonAction
{
    public function __construct(protected LessonRepositoryInterface $repository) {}

    public function execute(LessonData $data)
    {
        return $this->repository->create($data->toArray());
    }
}
