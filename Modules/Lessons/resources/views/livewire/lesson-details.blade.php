<!-- Include Plyr CSS -->
<link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />

<div 
    x-data="lessonPlayer('{{ $lesson->video_url }}')" 
    x-init="initPlyr()" 
    class="flex flex-col lg:flex-row max-w-7xl mx-auto mt-10 bg-white shadow-2xl rounded-3xl overflow-hidden"
>

    <!-- Right Sidebar (Lessons List) -->
    <aside class="w-full lg:w-4/12 bg-gradient-to-b from-gray-800 to-gray-900 p-6 space-y-4 pb-20">
        <h2 class="text-2xl font-bold text-white mb-4 border-b border-gray-700 pb-2">{{ $course->title }}</h2>

        <div class="space-y-3 max-h-[calc(100vh-200px)] overflow-y-auto pr-1">
            @foreach($course->lessons as $courseLesson)
                <div 
                    class="flex items-center space-x-3 p-3 rounded-lg transition-all duration-200 cursor-pointer"
                    :class="{
                        'bg-gray-700/30': currentLesson === {{ $courseLesson->id }},
                        'hover:bg-gray-700/20': currentLesson !== {{ $courseLesson->id }}
                    }"
                    @click="changeLesson('{{ $courseLesson->video_url }}', {{ $courseLesson->id }})"
                >
                    <!-- Completion Circle -->
                    <button 
                        @click.stop="toggleComplete({{ $courseLesson->id }})"
                        class="w-6 h-6 rounded-full border-2 flex items-center justify-center transition-all duration-200"
                        :class="isCompleted({{ $courseLesson->id }}) 
                            ? 'border-green-400 bg-green-400/20' 
                            : 'border-gray-500 hover:border-gray-400'"
                    >
                        <svg 
                            x-show="isCompleted({{ $courseLesson->id }})"
                            class="w-4 h-4 text-green-400"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path 
                                stroke-linecap="round" 
                                stroke-linejoin="round" 
                                stroke-width="2" 
                                d="M5 13l4 4L19 7"
                            />
                        </svg>
                    </button>

                    <!-- Lesson Title -->
                    <span 
                        class="flex-1 text-gray-300 hover:text-white transition-colors duration-200"
                        :class="{ 'text-white font-medium': currentLesson === {{ $courseLesson->id }} }"
                    >
                        {{ $courseLesson->title }}
                    </span>

                    <!-- Duration Badge -->
                    <span class="text-xs text-gray-400 bg-gray-700/50 px-2 py-1 rounded">
                        {{ $courseLesson->duration }}
                    </span>
                </div>
            @endforeach
        </div>
    </aside>

   <main class="flex-1 flex flex-col bg-white">
    <!-- Lesson Title -->
    <div class="p-8 pb-0">
        <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center" x-text="lessonTitle"></h1>
    </div>

    <!-- Video Player -->
    <div class="flex justify-center mb-6">
        <div class="w-full md:w-3/4 lg:w-2/3 bg-black rounded-xl overflow-hidden shadow-lg">
            <div id="playerContainer" class="aspect-video"></div>
        </div>
    </div>

    <!-- Lesson Description + Buttons -->
    <div class="p-8 flex-1 flex flex-col justify-between">
        <div class="prose prose-blue max-w-none mb-8">
            {!! $lesson->description !!}
        </div>

        <!-- Navigation & Completion Buttons -->
        <div class="flex items-center justify-between pt-6 border-t">
            <button
                @click="toggleComplete(currentLesson)"
                class="flex items-center space-x-2 px-6 py-3 rounded-lg transition-all duration-200"
                :class="isCompleted(currentLesson)
                    ? 'bg-green-100 text-green-700 hover:bg-green-200'
                    : 'bg-blue-100 text-blue-700 hover:bg-blue-200'"
            >
                <svg 
                    x-show="!isCompleted(currentLesson)"
                    class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path 
                        stroke-linecap="round" 
                        stroke-linejoin="round" 
                        stroke-width="2" 
                        d="M5 13l4 4L19 7"
                    />
                </svg>
                <svg 
                    x-show="isCompleted(currentLesson)"
                    class="w-5 h-5"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                >
                    <path 
                        fill-rule="evenodd" 
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" 
                        clip-rule="evenodd"
                    />
                </svg>
                <span x-text="isCompleted(currentLesson) ? 'Completed' : 'Mark as Complete'"></span>
            </button>

           
    @php
        $nextLesson = $course->lessons->where('id', '>', $lesson->id)->first();
    @endphp

@if($nextLesson)
   <a
    href="{{ route('lessons.show', $nextLesson) }}"
    class="mt-4 inline-flex items-center space-x-10 px-5 py-3 bg-sky-600 text-white rounded-lg hover:bg-sky-700 transition-colors duration-200"
>
    <span>Next Lesson</span>
    <svg 
        class="w-5 h-5"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
    >
        <path 
            stroke-linecap="round" 
            stroke-linejoin="round" 
            stroke-width="2" 
            d="M9 5l7 7-7 7"
        />
    </svg>
</a>

@else
<livewire:courses::finish-course-button :course="$course" />

@endif

</div>

     
    </div>
</main>

</div>

<!-- Plyr JS -->
<script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>

<script>
function lessonPlayer(initialUrl) {
    return {
        currentLesson: {{ $lesson->id }},
        lessonTitle: "{{ $lesson->title }}",
        completed: JSON.parse(localStorage.getItem('completedLessons') || '[]'),
        player: null,

        initPlyr() {
            this.loadVideo(initialUrl);
        },

        loadVideo(url) {
            const container = document.getElementById('playerContainer');
            container.innerHTML = '';

            let embed = '';
            if (url.includes('youtube.com') || url.includes('youtu.be')) {
                embed = `<iframe 
                            src="https://www.youtube.com/embed/${this.extractYouTubeId(url)}" 
                            allowfullscreen 
                            allow="autoplay"
                            class="w-full h-full"
                         ></iframe>`;
            } else if (url.includes('facebook.com')) {
                embed = `<iframe 
                            src="https://www.facebook.com/plugins/video.php?href=${encodeURIComponent(url)}&show_text=0&width=560"
                            allowfullscreen
                            allow="autoplay"
                            class="w-full h-full"
                         ></iframe>`;
            } else {
                embed = `<video id="player" playsinline controls class="w-full h-full">
                            <source src="${url}" type="video/mp4">
                            <source src="${url}" type="video/webm">
                         </video>`;
            }

            container.innerHTML = embed;

            if (!url.includes('youtube.com') && !url.includes('facebook.com')) {
                this.player = new Plyr('#player', {
                    controls: ['play', 'progress', 'current-time', 'mute', 'volume', 'settings', 'fullscreen'],
                    ratio: '16:9'
                });
            }
        },

        extractYouTubeId(url) {
            const match = url.match(/(?:v=|youtu\.be\/)([a-zA-Z0-9_-]+)/);
            return match ? match[1] : '';
        },

        changeLesson(url, id) {
            this.currentLesson = id;
            this.lessonTitle = document.querySelector(`[x-data] a[href$="${id}"]`)?.textContent || '';
            this.loadVideo(url);
        },

        toggleComplete(lessonId) {
            const index = this.completed.indexOf(lessonId);
            if (index === -1) {
                this.completed.push(lessonId);
            } else {
                this.completed.splice(index, 1);
            }
            localStorage.setItem('completedLessons', JSON.stringify(this.completed));
        },

        isCompleted(lessonId) {
            return this.completed.includes(lessonId);
        }
    }
}
</script>
