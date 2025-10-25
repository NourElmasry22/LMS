<section class="py-16 bg-gray-100 shadow-m">
  <div class="max-w-7xl mx-auto px-6">
    <div class="flex justify-between items-center mb-10">
      <div>
        <h2 class="text-3xl font-bold text-sky-700">🔥 Best-Selling Courses</h2>
      </div>
     
       <a
        class="inline-block rounded-sm border border-sky-700 px-12 py-3 text-sm font-medium text-sky-700 hover:bg-sky-700 hover:text-white focus:ring-3 focus:outline-hidden"
        href="{{ route('courses.show') }}"
        
        >
        Explore All Courses
         </a>
    </div>
    <livewire:courses::course-card />

    
  </div>
</section>

<script>
  function animateCard(card) {
    card.classList.add('ring-4', 'ring-blue-300', 'scale-95', 'transition-transform');
    setTimeout(() => {
      card.classList.remove('ring-4', 'ring-blue-300', 'scale-95');
    }, 200);
  }
</script>
