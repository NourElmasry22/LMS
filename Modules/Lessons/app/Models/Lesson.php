<?php

namespace Modules\Lessons\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Courses\Models\Course;
use Modules\Lessons\Database\Factories\LessonsFactory;

class lesson extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'course_id',
        'is_free_preview',
        'title',
        'content',
        'video_url',
        'order',
        'duration',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

     protected static function newFactory(): LessonsFactory
     {
          return LessonsFactory::new();
     }
}
