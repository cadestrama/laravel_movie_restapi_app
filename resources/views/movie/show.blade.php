

    <div class="container mx-auto px-4 pt-20 ">

        <div class="flex flex-col items-center justify-center w-full lg:flex-row lg:justify-start lg:items-start lg:space-x-10 ">
        
            {{-- poster image--}}

            <div class="w-1/2">
                <img src="https://image.tmdb.org/t/p/w500/{{$movieDetails['poster_path']}}" class="w-96 rounded-lg shadow-lg" alt="">
            </div>
    
            <div class="flex flex-col items-center justify-center text-center lg:justify-start lg:text-start lg:items-start">
                <h1 class="text-4xl font-semibold">{{$movieDetails['original_title']}}</h1>

                <div class="flex flex-col items-center text-gray-400 space-x-2 text-sm mt-2 md:flex-row">
                    <span class="text-amber-500"><i class="bi bi-star-fill"></i></span>
                    <span>{{$movieDetails['popularity'] / 100}}%</span>
                    <span >|</span>
                    <span>{{\Carbon\Carbon::parse($movieDetails['release_date'])->format('M d, Y')}}</span>

                
                    @foreach ($movieDetails['genres'] as $genre )
    
                    <span class="mx-3">{{$genre['name']}} @if(!$loop->last) , @endif </span>
                       
                   @endforeach
                   
                </div>

                <div>
                    <p class="mt-10 ">{{$movieDetails['overview']}}</p>
                    
                </div>

                <div>
                    <p class="mt-10 text-lg font-semibold">Featured Crew</p>

                    <div class="flex space-x-10 mt-3 ">

                        @foreach ($movieDetails['credits']['crew'] as $crew )
                            
                        @if($loop->index < 2)
                        <div>
                            <p>{{$crew['name']}}</p>
                            <p class="text-sm text-gray-300">{{$crew['job']}}</p>
                        </div>
    

                        @endif
                            
                        @endforeach
                        
                        
                    </div>
                    
                </div>
                

                <div x-data="{isOpen: false}">

                    <div class="mt-16">

                        <button x-on:click="isOpen=!isOpen" class="hover:bg-amber-300 pr-5 py-5 tracking-wider bg-amber-600 text-lg rounded-lg text-gray-900 font-semibold"><i class="bi bi-play-circle mx-4"></i>Play Trailer </button>
                    </div>


                    <div style="background-color: rgba(0,0,0,.5);" class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto" x-show="isOpen">

                        <div class="container mx-auto lg:px-32 rouded-lg overflow-y-auto">
                                <div class="bg-gray-900 rounded">
        
                                    <div class="flex justify-end pr-4 pt-2">
                                        <button x-on:click="isOpen=false" class="text-3xl leading-none hover:text-gray-300">&times;</button>
                                    </div>
        
                                    <div class="modal-body px-8 py-8">
                                        {{-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui, inventore! Quam itaque in perferendis eaque odio, soluta illo illum ratione debitis temporibus? Iusto ut temporibus numquam error, aspernatur laboriosam nostrum.
         --}}
                                            <div class="responsive-container overflow-hidden relative" style="padding-top:56.25%">
                                                <iframe with="560" height="315" class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://youtube.com/embed/{{$movieDetails['videos']['results'][0]['key']}}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                            </div>
        
                                    </div>
                                  
        
                                </div>
                        </div>
                
                </div>



                </div>

             

                
              
            </div>
    

        </div>


    </div>

    <div class="border-b border-gray-800 my-16"></div>




    {{-- modal --}}

        {{-- <div style="background-color: rgba(0,0,0,.5);" class="fixed top-0 left-0 h-full flex items-center shadow-lg overflow-y-auto">

                <div class="container mx-auto lg:px-32 rouded-lg overflow-y-auto">
                        <div class="bg-gray-900 rounded">

                            <div class="flex justify-end pr-4 pt-2">
                                <button class="text-3xl leading-none hover:text-gray-300">&times;</button>
                            </div>

                            <div class="modal-body px-8 py-8">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui, inventore! Quam itaque in perferendis eaque odio, soluta illo illum ratione debitis temporibus? Iusto ut temporibus numquam error, aspernatur laboriosam nostrum.

                                <div class="responsive-container overflow-hidden relative" style="padding-top:56.25%">
                                    <iframe with="560" height="315" class="responsive-iframe absolute top-0 left-0 w-full h-full" src="#" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>

                            </div>
                          

                        </div>
                </div>
        
        </div> --}}


    {{-- actors --}}


    <section class="mb-16">
        <div class="container px-4 mx-auto text-center flex flex-col items-center md:items-start">
            <h1 class="text-4xl font-semibold">Cast</h1>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-5">

                @foreach ($movieDetails['credits']['cast'] as $cast )

                    @if ($loop->index < 5)

                    <div class="w-full mt-10">
                        <a href="{{route('movieShow',$cast['id'])}}">
                            <img src="https://image.tmdb.org/t/p/w500/{{$cast['profile_path']}}" alt="" class="hover:opacity-75 transition ease-in-out">
                        </a>
                        <div class="text-sm mt-3">
                        <p>{{$cast['name']}}</p>
                        <p class="text-gray-500">{{$cast['character']}}</p>
                        </div>
                    </div>
                        
                    @endif
                    
                @endforeach

              

              
    
            </div>
        </div>

       
    </section>

    <div class="border-b border-gray-800 my-16"></div>

    {{-- scene --}}

    <section class="mb-16">
        <div class="container mx-auto px-4 text-center flex flex-col items-center md:items-start">

            <h1 class="text-4xl font-semibold">Scenes</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-10">

                @foreach ($movieDetails['images']['backdrops'] as $back)

                @if($loop->index < 10)

                <a href="{{route('movieShow',$cast['id'])}}">
                    <img src="https://image.tmdb.org/t/p/w500/{{$back['file_path']}}" alt="" class="hover:opacity-75 transition ease-in-out">
                </a>

                @endif
                
                @endforeach
               
            </div>
        </div>
    </section>






   
