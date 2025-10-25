<?php

namespace Modules\Courses\Livewire;

use Livewire\Component;
use Modules\Courses\Models\Course;

class CoursesDetails extends Component
{
    public $courses;

    public function mount()
    {
        
        $this->courses = Course::inRandomOrder()
            ->take(9)
            ->get();
    }
    public function render()
    {
        return view('courses::livewire.courses-details');
    }
}
