<?php

namespace Modules\Courses\Observers;
use Modules\Courses\Models\Course;

use Illuminate\Support\Str;


class CourseObserver
{
    /**
     * Handle the Course "created" event.
     */
    public function creating(Course $course): void {
         if (empty($course->slug)) {
            $course->slug = $this->generateUniqueSlug($course->title);
        }
    }

    /**
     * Handle the Course "updated" event.
     */
    public function updated(Course $course): void {
        if ($course->isDirty('title')) {
            $course->slug = $this->generateUniqueSlug($course->title, $course->id);
        }
    }
 

    /**
     * Handle the Course "deleted" event.
     */
    public function deleted(Course $course): void {}

    /**
     * Handle the Course "restored" event.
     */
    public function restored(Course $course): void {}

    /**
     * Handle the Course "force deleted" event.
     */
    public function forceDeleted(Course $course): void {}

    protected function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $original = $slug;
        $i = 1;

        while (
            Course::withTrashed()
                ->where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = "{$original}-{$i}";
            $i++;
        }

        return $slug;
    }
}
