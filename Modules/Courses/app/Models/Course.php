<?php

namespace Modules\Courses\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Courses\Enums\CourseLevel;
use Modules\Lessons\Models\Lesson;
use Modules\Courses\Database\Factories\CourseFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use softDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'image',
        'category',
        'description',
        'level',
        'no_of_lectures',
        
    ];
    protected $casts = [
        'level' => CourseLevel::class,
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('order');
    }

    protected static function newFactory(): CourseFactory
     {
          return CourseFactory::new();
    }
 
}
