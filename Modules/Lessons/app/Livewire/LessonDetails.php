<?php

namespace Modules\Lessons\Livewire;

use Livewire\Component;
use Modules\Lessons\Models\Lesson;

class LessonDetails extends Component
{
    public $lesson;
    public $course;
    public $lessons;
    public $currentIndex;

    public function mount($id)
    {
        $this->lesson = Lesson::findOrFail($id);
        $this->course = $this->lesson->course;
        $this->lessons = $this->course->lessons()->orderBy('order')->get();

        
        $this->currentIndex = $this->lessons->search(fn($l) => $l->id === $this->lesson->id);
    }

    public function markComplete()
    {
       
        session()->flash('success', 'Lesson marked as complete ✅');
    }

    public function nextLesson()
    {
        if (isset($this->lessons[$this->currentIndex + 1])) {
            $nextLesson = $this->lessons[$this->currentIndex + 1];
            return redirect()->route('lessons.show', $nextLesson->id);
        }

        session()->flash('success', '🎉 Congratulations! You finished the course!');
    }

    public function render()
    {
        return view('lessons::livewire.lesson-details')->layout('cores::layouts.app');
    }
}
