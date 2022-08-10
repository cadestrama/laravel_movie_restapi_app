<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MovieApp</title>

     <!-- Scripts -->
     @livewireStyles
     <!-- Alpine Plugins -->
<script defer src="https://unpkg.com/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
     <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body class="font-sans bg-gray-900 text-white">

    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex flex-col items-center justify-between px-4 py-6 space-y-4 md:flex md:space-y-4">
            <ul class="flex items-center   ">
                <li class="md:mr-16">
                    <a href="{{route('movieHome')}}">
                        <h1 class="text-2xl font-bold text-lime-500">MovieUpdate<span class="text-white font-thin">Trailers</span></h1>
                    </a>
                   
                </li>
                <div class="hidden md:flex items-center">
                    <li class="mr-6">
                        <a href="{{route('movieHome')}}" class="text-gray-500 hover:text-gray-300">Movies</a>
                    </li>
                  
                </div>
               

            </ul>

          

                <div class="flex items center relative md:hidden">
                    @livewire('search-dropdown')
                </div>

           

            <div class="flex items-center">
                   <div class="hidden md:flex">
                    @livewire('search-dropdown')
                   </div>
                    

                    <div class="ml-4">
                        <img src="{{asset('img/actor3.jpg')}}" class="rounded-full w-8 h-8" alt="">
                    </div>
            </div>
        </div>
    </nav>

@if ($route == 'main')

@include('movie.index')

@elseif($route == 'show')
@include('movie.show')
@endif
   

   

   @livewireScripts
  
</body>
</html>