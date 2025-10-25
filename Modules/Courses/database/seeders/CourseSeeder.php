<?php

namespace Modules\Courses\Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Modules\Courses\Models\Course;
use Modules\Lessons\Models\Lesson;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        Course::factory(10)
            ->create()
            ->each(function ($course) {
                // each course has 5–15 lessons
                Lesson::factory(rand(5, 15))->create([
                    'course_id' => $course->id,
                ]);
            });
    }
}
