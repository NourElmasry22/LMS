@extends('cores::layouts.app')
@section('content')
<section class="py-16 bg-gray-100">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-sky-700 mb-10">📚 All Courses</h2>
  
    <livewire:cores::search-bar />
     <livewire:courses::course-filter />
    <livewire:courses::course-card viewType="courses.show" />
</div>

    
</section>
@endsection

