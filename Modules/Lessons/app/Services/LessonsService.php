<?php

namespace Modules\Lessons\Services;

use Modules\Lessons\Models\Lesson;
use Modules\Courses\Models\Course;
use App\Models\User;

class LessonVisibilityService
{
    /**
     * Determine if the given user can view the lesson.
     * Guests can see only free preview lessons.
     */
    public function canViewLesson(?User $user, Lesson $lesson): bool
    {
        if ($lesson->is_free_preview) {
            return true;
        }

        if (!$user) {
            return false;
        }

        // You can customize this check with an enrollment table later.
        return $this->isUserEnrolledInCourse($user, $lesson->course);
    }

    protected function isUserEnrolledInCourse(User $user, Course $course): bool
    {
        // Example placeholder for enrollment logic
        return $user->enrollments()
            ->where('course_id', $course->id)
            ->exists();
    }
}
