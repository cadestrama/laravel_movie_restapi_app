

<div class="container mx-auto px-4 pt-16">

    {{-- popolar movies --}}

    <div>
        <h2 class="uppercase tracking-wider text-rose-500 text-lg font-semibold">
            pupolar movies
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">

           
            @foreach ($popularMovies as $movie )

            <x-movie-card :genres="$genres" :movie="$movie"/>

            @endforeach

                
        </div>
    </div>

    {{-- now playing --}}

    <div class="my-20 ">
        <h2 class="uppercase tracking-wider text-rose-500 text-lg font-semibold">
            Now playing
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">

         
            @foreach ($nowPlayingMovies as $playing)

            <x-movie-card :movie="$playing" :genres="$genres"/>
                
            @endforeach
           

           
        </div>
    </div>
</div>

