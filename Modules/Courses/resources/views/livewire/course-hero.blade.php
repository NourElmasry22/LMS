<div 
    x-data="{ show: false }" 
    x-init="setTimeout(() => show = true, 100)" 
    x-show="show" 
    x-transition.duration.700ms
    class="max-w-5xl mx-auto mt-10 bg-white shadow-lg rounded-2xl overflow-hidden flex flex-col md:flex-row items-center md:items-start gap-6 p-6"
>
    <!-- Left: Course info -->
    <div class="flex-1 space-y-4">
        <h1 class="text-3xl font-bold text-gray-800">{{ $course->title }}</h1>

        <div class="flex items-center gap-4 text-sm text-gray-500">
            <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full font-medium">
                {{ $course->level ?? 'Beginner' }}
            </span>
            <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full font-medium">
                {{ $course->category ?? 'General' }}
            </span>
        </div>

        <p class="text-gray-600 leading-relaxed">{{ $course->description }}</p>

        <a href="/courses"
           class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-medium mt-4 transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke-width="2" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Back to all courses
        </a>
    </div>

    <!-- Right: Course image -->
    <div class="md:w-1/2 w-full">
        <img src="{{ asset('storage/' . $course->image) }}" 
             alt="{{ $course->title }}" 
             class="w-full h-64 md:h-full object-cover rounded-xl shadow-md transform transition duration-500 hover:scale-105">
    </div>

</div>

