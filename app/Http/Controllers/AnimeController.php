<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Episode;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
   public function details($slug)
   {
      $anime = Anime::where('slug',$slug)->first();
      return view('anime.details',compact('anime'));
   }

   public function watch($slug)
   {
       $episode = Episode::where('slug',$slug)->get();
       return view('anime.stream',compact('episode'));
   }
}
