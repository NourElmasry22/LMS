<?php

namespace Modules\Courses\Livewire;

use Livewire\Component;
use Modules\Courses\Models\Course;
use Illuminate\Support\Facades\Auth;

class EnrollButton extends Component
{
    public $course;
    public $enrolled = false;

    public function mount(Course $course)
    {
        $this->course = $course;
        if (Auth::check()) {
            $this->enrolled = Auth::user()->courses()->where('course_id', $course->id)->exists();
        }
    }

    public function enroll()
    {
        if (!Auth::check()) return redirect()->route('login');

        $user = Auth::user();
        $user->courses()->syncWithoutDetaching([$this->course->id => [
            'progress' => 0,
            'status' => 'in_progress'
        ]]);

        $this->enrolled = true;
    }
   
    public function render()
    {
        return view('courses::livewire.enroll-button');
    }
}

