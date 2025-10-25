<?php

namespace Modules\Lessons\Actions;


class UpdateLessonProgress
{
    public function markLessonCompleted($lessonId)
{
    $user = auth()->user();
    $lesson = \Modules\Lessons\Models\Lesson::findOrFail($lessonId);

    $progress = \Modules\Lessons\Models\LessonProgress::updateOrCreate(
        ['user_id' => $user->id, 'lesson_id' => $lessonId],
        ['completed_at' => now()]
    );

    $course = $lesson->course;
    $totalLessons = $course->lessons()->count();
    $completedLessons = $course->lessons()->whereHas('progress', fn($q) => $q->where('user_id', $user->id)->whereNotNull('completed_at'))->count();

    $courseProgress = intval($completedLessons / $totalLessons * 100);
    $status = $completedLessons === $totalLessons ? 'completed' : 'in_progress';

    $user->courses()->updateExistingPivot($course->id, [
        'progress' => $courseProgress,
        'status' => $status
    ]);

    if ($status === 'completed') {
        // Dispatch Completion Email
    }
}

}
