<div>
    @if($enrolled)
        <a href="{{ route('lessons.show', $course->lessons->first()?->id ?? '#') }}"
           class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
            Continue Course
        </a>
    @else
        <button wire:click="enroll"
                class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            Enroll Now
        </button>
    @endif
</div>
