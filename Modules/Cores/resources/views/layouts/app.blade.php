<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Career180</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
         @livewireStyles
        

       
    </head>
    <body>
        <livewire:cores::header/>
        <main >
        
        {{ $slot?? '' }}
        @yield('content')
        </main>
        
        <livewire:cores::footer />
        @livewireScripts
    </body>
</html>