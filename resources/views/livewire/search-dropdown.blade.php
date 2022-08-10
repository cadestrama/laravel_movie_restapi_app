<div class="relative" x-data="{isOpen: true}"  @click.away ="isOpen=false">
    
    <input wire:model.debounce.500ms="search" type="text" class="pl-7 py-1 w-64 rounded-full bg-gray-800 focus:outline-none focus:shadow-outline" placeholder="Search latest movies" @keydown.escape.window="isOpen=false" @focus.window="isOpen=true">

   
    <div wire:loading class="spinner top-0 left-0 ml-4 mt-5"></div>

    <button class="px-4 rounded-lg py-2 bg-gray-800 hover:bg-rose-500" x-on:click="isOpen=true" >Search</button>

    <div class="absolute z-50 bg-gray-800 rounded-lg w-64 mt-4" x-show="isOpen" >
        <ul>
            
            @if(strlen($search) >= 2)

                @if(empty($searchResults))

                <li class="border-b border-gray-700 px-3 py-3">Nothing Found</li>

                @else

                    @foreach ($searchResults as $result)
                    <li class=" border-b border-gray-700 px-3 py-3 hover:text-rose-500 flex items-center justify-start space-x-1">
                        <img src="https://image.tmdb.org/t/p/w500/{{$result['poster_path']}}" class="w-10 h-10 rounded">
                        <a href="{{route('movieShow',$result['id'])}}">{{$result['title']}}</a>
                    
                    </li>
                    @endforeach

                @endif

            @endif
{{--                
            @if(strlen($search) >=2)

           
           

            @endif --}}


           
        </ul>
    </div>
</div>


   


