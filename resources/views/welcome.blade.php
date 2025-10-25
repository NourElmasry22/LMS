<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Courses</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

    <header class="text-center py-10 bg-white shadow">
        <h1 class="text-4xl font-bold text-gray-800">Available Courses</h1>
        <p class="text-gray-500 mt-2">Explore what you can learn today</p>
    </header>

    <main class="max-w-6xl mx-auto py-10 px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($courses as $course)
                <div class="bg-white rounded-2xl shadow p-4 hover:shadow-lg transition">
                    <img src="{{ $course->image }}" 
                         alt="{{ $course->title }}" 
                         class="w-full h-48 object-cover rounded-xl mb-4">
                    <h2 class="text-xl font-semibold text-gray-800 mb-1">{{ $course->title }}</h2>
                    <div class="text-sm text-gray-500">
                        <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded">
                            {{ ucfirst($course->level->value ?? $course->level) }}
                        </span>
                        <span class="ml-2 text-indigo-600 font-medium">
                            {{ $course->category }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

</body>
</html>
