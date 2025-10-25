<div class="max-w-6xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden p-6 mt-10">
    <!-- Course Info Section -->
    <div class="flex flex-col md:flex-row items-center gap-8">
        <!-- Image -->
        <div class="w-full md:w-1/2">
            <img src="{{ asset('storage/' . $course->image) }}"
                 alt="{{ $course->title }}"
                 class="rounded-xl shadow-md hover:scale-105 transition duration-500 ease-in-out">
        </div>

        <!-- Info -->
        <div class="w-full md:w-1/2 space-y-4">
            <h1 class="text-3xl font-bold text-gray-900">{{ $course->title }}</h1>
            <div class="flex gap-3 text-sm text-gray-600">
                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-medium">Level: {{ $course->level ?? 'N/A' }}</span>
                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full font-medium">Category: {{ $course->category ?? 'General' }}</span>
            </div>
            <p class="text-gray-700 leading-relaxed">{{ $course->description }}</p>

            <a href="/courses"
               class="text-blue-500 underline font-medium hover:text-blue-700 transition duration-200 block mt-4">← Back to all courses</a>
        </div>
    </div>

    <!-- Lessons Section -->
    <div x-data="{ open: false }" class="mt-10 border-t border-gray-200 pt-6">
        <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
            <h2 class="text-2xl font-bold text-gray-800">Lessons</h2>
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg"
                 class="w-6 h-6 text-gray-600 transform transition-transform duration-300"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            <svg x-show="open" xmlns="http://www.w3.org/2000/svg"
                 class="w-6 h-6 text-gray-600 transform rotate-180 transition-transform duration-300"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"/>
            </svg>
        </div>

        <div x-show="open" x-transition.duration.400ms class="mt-5 space-y-3">
            @forelse($course->lessons as $lesson)
                <a href="{{ route('lessons.show', $lesson->id) }}"
                   class="block p-4 bg-gray-50 hover:bg-blue-50 border border-gray-200 rounded-lg shadow-sm transition duration-300">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $lesson->title }}</h3>
                        <span class="text-sm text-gray-500">{{ $lesson->duration ?? '—' }}</span>
                    </div>
                    <p class="text-sm text-gray-600 mt-1 line-clamp-2">{{ $lesson->description ?? '' }}</p>
                </a>
            @empty
                <p class="text-gray-500 italic">No lessons added yet.</p>
            @endforelse
        </div>
    </div>
</div>
