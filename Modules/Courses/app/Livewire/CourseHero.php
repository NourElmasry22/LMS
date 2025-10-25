<?php

namespace Modules\Courses\Livewire;

use Livewire\Component;
use Modules\Courses\Models\Course;

class CourseHero extends Component
{
    public $course;

    public function mount($slug)
    {
    
        $this->course = Course::where('slug', $slug)->firstOrFail();
    }
    public function render()
    {
        return view('courses::livewire.course-hero') ->layout('cores::layouts.app');
    }
}
