@extends('cores::layouts.app')
@section('content')

<section>
<div class="max-w-5xl mx-auto mt-10 space-y-6 pb-20">

    {{-- Courses in Progress --}}
    <div class="bg-white shadow-md rounded-2xl p-6">
        <h2 class="text-xl font-bold text-sky-700 mb-4">📘 Courses in Progress</h2>
        @if($inProgressCourses->isEmpty())
            <p class="text-gray-500">You haven’t started any courses yet.</p>
        @else
            <ul class="space-y-2">
                @foreach($inProgressCourses as $course)
                    <li class="p-3 bg-sky-50 rounded-lg flex justify-between">
                        <span>{{ $course->title }}</span>
                     <span class="text-sm text-gray-600">{{ $course->pivot->progress }}% done</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    {{-- Completed Courses --}}
    <div class="bg-white shadow-md rounded-2xl p-6">
        <h2 class="text-xl font-bold text-green-700 mb-4">🎓 Finished Courses</h2>
        @if($completedCourses->isEmpty())
            <p class="text-gray-500">No completed courses yet.</p>
        @else
            <ul class="space-y-2">
                @foreach($completedCourses as $course)
                    <li class="p-3 bg-green-50 rounded-lg">{{ $course->title }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</div>

    <livewire:courses::courses-details />


        
        
        
</section>
@endsection
