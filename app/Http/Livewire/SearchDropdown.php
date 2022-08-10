<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;



class SearchDropdown extends Component
{

    public $search;

  


   public $open;

   public function boot(){
    $this->open = false;
   }


   public function updated($search){
        $open=true;
   }

    public function render()
    {   
        $searchResults = [];
        if(strlen($this->search) > 2 ){
            $searchResults  = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/search/movie?query='.$this->search)
            ->json()['results'];
        }

        return view('livewire.search-dropdown',compact('searchResults'));
    }
}
