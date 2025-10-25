<header class="bg-white shadow-sm">
     <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8"> 
        <div class="flex h-16 items-center justify-between"> 
            <div class="md:flex md:items-center md:gap-12"> 
                <a 
                class="block text-teal-600"
                 href="{{route('home')}}"> 
                  <span class="sr-only">Home</span>
                   <img src="{{ asset('career180_logo.png') }}" 
                   alt="Career Logo" class="h-10 w-auto"> 
                </a>
             </div> 
             <div class="hidden md:block"> 
                <nav aria-label="Global"> 
                    <ul class="flex items-center gap-12 text-m"> 
                      <li> <a class="text-gray-500 transition hover:text-gray-500/75"
                       href="{{route('courses.show')}}"> Courses </a>
                      </li> 
                      <li> 
                        <a class="text-gray-500 transition hover:text-gray-500/75" 
                        href="#"> About Us </a> 
                     </li> <li> 
                     <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> 
                     Contact Us </a> </li> </ul> </nav> </div> <div class="flex items-center gap-4"> 
                     
                     <div class="sm:flex sm:gap-4"> 
                        @guest
                        <a class="inline-block rounded-sm border border-sky-700 px-12 py-3 text-sm font-medium text-sky-700 hover:bg-sky-700 hover:text-white focus:ring-3 focus:outline-hidden" href="{{route('show.login')}}" >
                            Login </a> <div class="hidden sm:flex"> 
                              <a class="inline-block rounded-sm border border-sky-700 bg-sky-700 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-sky-700 focus:ring-3 focus:outline-hidden"
                               href="{{route('show.register')}}" >
                                Register Now </a> 
                                @endguest
                                @auth


                            <span class="block mt-1 text-gray-700 font-medium">
    👋 Hi, {{ Auth::user()->name }}
</span>


                           <form method="POST" action="{{ route('logout') }}" class="inline">
                           @csrf
                           <button 
                           type="submit" 
                           class="px-4 py-2 text-sm font-medium text-white bg-sky-700 rounded-lg hover:bg-sky-700 transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-1"
                           >
                           Logout
                          </button>
                           </form>
                            @endauth
                              </div> </div> <div class="block md:hidden"> <button class="rounded-sm bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75" > <img src="{{ asset('career_logo.jpg') }}" alt="Career180 Logo" class="h-8 w-auto" /> </button> </div> </div> </div> </div> </header>