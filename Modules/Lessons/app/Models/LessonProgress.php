<?php

namespace Modules\Lessons\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Lessons\Database\Factories\LessonProgressFactory;

class lessonProgress extends Model
{
    use HasFactory;

   protected $fillable = ['user_id', 'lesson_id', 'started_at', 'completed_at', 'watch_seconds'];

    public function lesson() {
        return $this->belongsTo(Lesson::class);
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }
}
