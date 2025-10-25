<?php

namespace Modules\Courses\Livewire;

use Livewire\Component;
use Modules\Courses\Models\Course;

class CourseInfo extends Component
{
   public $course;

    public function mount($slug)
    {
    
        //$this->course = Course::where('slug', $slug)->firstOrFail();
         $this->course = Course::with('lessons')->where('slug', $slug)->firstOrFail();
    }
    public function render()
    {
        return view('courses::livewire.course-info') ->layout('cores::layouts.app');

    }
}
