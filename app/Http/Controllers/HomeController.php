<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        Session::put('page', 'home');
        return view('welcome');
    }
    public function search()
    {
        Session::put('page', 'home');
        $search = request()->input('search') ?? '';

        if (!empty($search) && isset($search)) {
            $animes = Anime::whereRaw('LOWER(`name_english`) LIKE ? ',['%'.trim(strtolower($search)).'%'])->orWhereRaw('LOWER(`name_japanese`) LIKE ? ', ['%'.trim(strtolower($search)).'%'])->orderBy('year','DESC')->paginate(15);
        } else {
            $animes = Anime::latest()->paginate(15);
        }
        return view("search.index",compact('animes','search'));
    }
}

