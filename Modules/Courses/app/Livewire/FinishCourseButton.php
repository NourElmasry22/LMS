<?php

namespace Modules\Courses\Livewire;

use Livewire\Component;
use Modules\Courses\Models\Course;
use Illuminate\Support\Facades\Auth;
use Modules\Courses\Actions\UpdateCourseProgress;


class FinishCourseButton extends Component
{
    public $course;

    public function mount(Course $course)
    {
        $this->course = $course;
    }
 public function finish()
    {
        if (!Auth::check()) return redirect()->route('login');

        $user = Auth::user();
        $user->courses()->syncWithoutDetaching([$this->course->id => [
            'progress' => 100,
            'status' => 'completed'
        ]]);

        
    }


    public function render()
    {
        return view('courses::livewire.finish-course-button');
    }
}
