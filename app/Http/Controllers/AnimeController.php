<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AnimeController extends Controller
{
    public function details($slug)
    {
        Session::put('page', 'none');

        $anime = Anime::where('slug', $slug)->first();
        return view('anime.details', compact('anime'));
    }

    public function watch($slug)
    {
        Session::put('page', 'none');
        $episode = Episode::where('slug', $slug)->get();
        return view('anime.stream', compact('episode'));
    }

    public function list()
    {
        Session::put('page', 'list');
        $search = request()->input('character') ?? '';

        if (!empty($search) && isset($search)) {
            $animes = Anime::where('name_english', 'like',  $search . '%')->orderBy('name_english', 'ASC')->paginate(15);
        } else {
            $animes = Anime::orderBy('name_english', 'ASC')->paginate(15);
        }
        return view('anime.list', compact('animes', 'search'));
    }

    public function type($type)
    {
        Session::put('page', 'type');
        $types = array('test', 'movie', 'ona', 'ova', 'special','tv series');
        if (array_search($type, $types)) {
            $animes = Anime::whereRaw('LOWER(`type`) LIKE ? ', ['%' . trim(strtolower($type)) . '%'])->orderBy('year', 'DESC')->orderBy('name_english','DESC')->paginate(15);
            return view('anime.types', compact('animes'));
        }else{
            return redirect()->route('home');
        }
    }

    public function dub()
    {
        Session::put('page', 'dub');
        $animes = Anime::where('name_english','LIKE','%(Dub)%')->orderBy('year', 'DESC')->orderBy('name_english','DESC')->paginate(15);
        return view('anime.dub', compact('animes'));
    }
}
