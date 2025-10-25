<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-10">
  @foreach ($courses as $course)
    <div 
      class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 cursor-pointer 
             transition-all duration-200 hover:shadow-lg hover:scale-[1.02] active:scale-[0.98]"
    >
      <img 
        src="{{ asset('storage/' . $course->image) }}" 
        alt="{{ $course->title }}" 
        class="w-full h-48 object-cover rounded-xl mb-4">

      <h3 class="text-lg font-semibold text-gray-900">{{ $course->title }}</h3>
      <p class="text-sm text-gray-500 mt-1">Category: {{ $course->category }}</p>

      <div class="mt-4 flex items-center">
    <a
        href="{{ route('courses.details', $course->slug) }}"
        class="ml-auto inline-block rounded-full border border-sky-700 bg-sky-700 px-6 py-3
               text-sm font-medium text-white transition focus:ring-2 focus:ring-sky-300 focus:outline-none"
    >
        View Details
    </a>
</div>

    </div>
  @endforeach
</div>

@if($viewType === 'courses')
  <div class="mt-8">
    {{ $courses->links() }}
  </div>
@endif
