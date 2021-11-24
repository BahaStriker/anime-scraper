@extends('layouts.front.master')
@section('title')
Anime list
@endsection
@section('content')
<section class="anime-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="anime__details__episodes">
                    <a href="{{ route('anime.list') }}" @if ($search=='' )class="watched" @endif>#</a>
                    <a href="javascript:{}" onclick="document.getElementById('a').submit();" @if ($search=='a'
                        )class="watched" @endif>A</a>
                    <a href="javascript:{}" onclick="document.getElementById('b').submit();" @if ($search=='b'
                        )class="watched" @endif>B</a>
                    <a href="javascript:{}" onclick="document.getElementById('c').submit();" @if ($search=='c'
                        )class="watched" @endif>C</a>
                    <a href="javascript:{}" onclick="document.getElementById('d').submit();" @if ($search=='d'
                        )class="watched" @endif>D</a>
                    <a href="javascript:{}" onclick="document.getElementById('e').submit();" @if ($search=='e'
                        )class="watched" @endif>E</a>
                    <a href="javascript:{}" onclick="document.getElementById('f').submit();" @if ($search=='f'
                        )class="watched" @endif>F</a>
                    <a href="javascript:{}" onclick="document.getElementById('g').submit();" @if ($search=='g'
                        )class="watched" @endif>G</a>
                    <a href="javascript:{}" onclick="document.getElementById('h').submit();" @if ($search=='h'
                        )class="watched" @endif>H</a>
                    <a href="javascript:{}" onclick="document.getElementById('i').submit();" @if ($search=='i'
                        )class="watched" @endif>I</a>
                    <a href="javascript:{}" onclick="document.getElementById('j').submit();" @if ($search=='j'
                        )class="watched" @endif>J</a>
                    <a href="javascript:{}" onclick="document.getElementById('k').submit();" @if ($search=='k'
                        )class="watched" @endif>K</a>
                    <a href="javascript:{}" onclick="document.getElementById('l').submit();" @if ($search=='l'
                        )class="watched" @endif>L</a>
                    <a href="javascript:{}" onclick="document.getElementById('m').submit();" @if ($search=='m'
                        )class="watched" @endif>M</a>
                    <a href="javascript:{}" onclick="document.getElementById('n').submit();" @if ($search=='n'
                        )class="watched" @endif>N</a>
                    <a href="javascript:{}" onclick="document.getElementById('o').submit();" @if ($search=='o'
                        )class="watched" @endif>O</a>
                    <a href="javascript:{}" onclick="document.getElementById('p').submit();" @if ($search=='p'
                        )class="watched" @endif>P</a>
                    <a href="javascript:{}" onclick="document.getElementById('q').submit();" @if ($search=='q'
                        )class="watched" @endif>Q</a>
                    <a href="javascript:{}" onclick="document.getElementById('r').submit();" @if ($search=='r'
                        )class="watched" @endif>R</a>
                    <a href="javascript:{}" onclick="document.getElementById('s').submit();" @if ($search=='s'
                        )class="watched" @endif>S</a>
                    <a href="javascript:{}" onclick="document.getElementById('t').submit();" @if ($search=='t'
                        )class="watched" @endif>T</a>
                    <a href="javascript:{}" onclick="document.getElementById('u').submit();" @if ($search=='u'
                        )class="watched" @endif>U</a>
                    <a href="javascript:{}" onclick="document.getElementById('v').submit();" @if ($search=='v'
                        )class="watched" @endif>V</a>
                    <a href="javascript:{}" onclick="document.getElementById('w').submit();" @if ($search=='w'
                        )class="watched" @endif>W</a>
                    <a href="javascript:{}" onclick="document.getElementById('y').submit();" @if ($search=='y'
                        )class="watched" @endif>Y</a>
                    <a href="javascript:{}" onclick="document.getElementById('z').submit();" @if ($search=='z'
                        )class="watched" @endif>Z</a>

                </div>
            </div>
        </div>
        @include('layouts.front.forms')

        <div class="row">
            <div class="col-lg-10">
                <ul class="list-group contact-list-mini contact-list-widget ">
                    @foreach ($animes as $item)
                    <li class="list-group-item" style="background-color: #18182c; ">
                        <div class="user-avatar">
                            <img src="{{ asset($item->thumnail) }}" class="" alt="Avatar image" style="width: 50px;">
                        </div>
                        <div class="list-item-info">
                            <a href="{{ route('anime.details', ['slug'=>$item->slug]) }}">
                                <h6 class="mb-1" style="color: lightgray">{{ $item->name_english }}</h6>
                            </a>
                            @if ($item->type !='Movie')
                                @switch($item->status)
                                @case('Upcoming')
                                <div class="ep" style="color: darkgray">Upcoming</div>
                                @break
                                @case('Completed')
                                <div class="ep" style="color: darkgray">{{ $item->episodes }} / {{ $item->episodes }}</div>
                                @break
                                @default
                                <div class="ep" style="color: darkgray">{{ $item->episodes }} / ?</div>
                                @endswitch

                             @endif

                        </div>

                    </li>
                    <hr>
                    @endforeach

                </ul>
                {{ $animes->links('pagination.list') }}
            </div>
        </div>
    </div>
</section>
@endsection
