
<div>

    <div class="mt-8">
        <a href="{{route('movieShow',$movie['id'])}}">
            <img src="https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}}" alt="" class="rounded-lg shadow hover:opacity-75 transition ease-in-out">
        </a>
        <div class="mt-2">
            <a href="{{route('movieShow',$movie['id'])}}" class="text-lg mt-2 hover:text-gray-300 text-white">
               {{$movie['title']}}
            </a>
    
            <div class="flex items-center text-gray-400 space-x-2 text-sm mt-1">
                <span class="text-amber-500"><i class="bi bi-star-fill"></i></span>
                <span>{{$movie['vote_average'] * 10}}%</span>
                <span >|</span>
                <span>{{\Carbon\Carbon::parse($movie['release_date'])->format('M d, Y')}}</span>
            </div>
            
            <div class="flex items-center text-gray-400 space-x-2 text-sm">
    
               @foreach ($movie['genre_ids'] as $genre )
    
                {{$genres->get($genre)}} @if(!$loop->last) , @endif 
                   
               @endforeach
               
            </div>
        </div>
    </div>

</div>