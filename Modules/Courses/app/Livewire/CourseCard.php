<?php

namespace Modules\Courses\Livewire;

use Livewire\Component;
use Modules\Courses\Models\Course;
use Livewire\WithPagination;


class CourseCard extends Component
{

    public $courses;
    use WithPagination;

    public string $viewType = 'home'; 

    protected $paginationTheme = 'tailwind';

    public function mount()
    {
        
        $this->courses = Course::inRandomOrder()
            ->take(9)
            ->get();
    }
    public function render()
    {
         if ($this->viewType === 'courses') {
           
            $courses = Course::latest()->paginate(9);
        } else {
           $courses = Course::latest()->take(3)->get();
        }
        return view('courses::livewire.course-card');
    }
}
