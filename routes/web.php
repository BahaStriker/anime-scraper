<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\API\MALController;
use App\Http\Controllers\HomeController;
use App\Models\Anime;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/crawl', [MALController::class, 'index'])->name('index');

//Anime Routes
Route::get('/{slug}',[AnimeController::class,'details'])->name('anime.details');
Route::get('/episodes/{slug}',[AnimeController::class,'watch'])->name('anime.watch');
//End Anime Routes
