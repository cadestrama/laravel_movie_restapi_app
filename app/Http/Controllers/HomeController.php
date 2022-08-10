<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    //
    public $genres;

    public function index(){

                     $popularMovies = Http::withToken(config('services.tmdb.token'))
                    ->get('https://api.themoviedb.org/3/movie/popular')
                    ->json()['results'];

                    $nowPlayingMovies = Http::withToken(config('services.tmdb.token'))
                    ->get('https://api.themoviedb.org/3/movie/now_playing')
                    ->json()['results'];

                    $genresArray = Http::withToken(config('services.tmdb.token'))
                    ->get('https://api.themoviedb.org/3/genre/movie/list')
                    ->json()['genres'];

                    $this->genres = collect($genresArray)->mapWithKeys(function($data){
                        return [$data['id']=>$data['name']];
                    });

     

        $genres = $this->genres;
        $route = 'main';

        return view('movie.main',compact('popularMovies','genres','nowPlayingMovies','route'));
    }



    public function show($movieId){


        
        $movieDetails = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/'.$movieId .'?append_to_response=credits,videos,images')
        ->json();

    

        $route = 'show';

        $genres = $this->genres;

        return view('movie.main',compact('route','movieDetails','genres'));

    }
}
