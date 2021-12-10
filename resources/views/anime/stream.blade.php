@extends('layouts.front.master')
@section('title')
{{ $episode->first()->anime->name_english }}
@endsection
@section('content')

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="index.html"><i class="fa fa-home"></i> Home</a>
                    <i class="fas fa-chevron-right"></i>
                    <a href="{{ route('anime.details', ['slug'=>$episode->first()->anime->slug]) }}">{{
                        $episode->first()->anime->name_english }}</a>
                     <i class="fas fa-chevron-right"></i>

                    <span>{{$episode->first()->title}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Anime Section Begin -->
<section class="anime-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="anime__video__player" style="height: 650px;">
                    <iframe src="{{ $episode->first()->server_link }}" allowfullscreen="true"
                        style="width: 100% ; height:100%;" frameborder="0" marginwidth="0" marginheight="0"
                        scrolling="no"></iframe>
                </div>
                <div class="anime__details__episodes mt-5">
                    <div class="section-title">
                        <h5>Episodes</h5>
                    </div>



                    @if ($episode->first()->anime->episodes > 99)
                    @php
                    $count =(int)($episode->first()->anime->episodes/99) +1;
                    @endphp
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @php
                        $last =99;
                        $first =100;
                        @endphp
                        @for ($i = 1; $i <= (int)($episode->first()->anime->episodes/99)+1; $i++)

                            <li class="nav-item" role="presentation">
                                <a class="nav-link @if($i ==1) active @endif" data-toggle="tab" href="#tab{{ $i }}"
                                    role="tab" aria-controls="home" aria-selected="true">@if ($i==1)
                                    {{ $i }}-{{ $last }}

                                    @elseif ($first == $episode->first()->anime->episodes)
                                    @php
                                    $last+=100;
                                    @endphp
                                    {{ $first }}
                                    @elseif ($count == $i)
                                    {{ $first }}-{{ $episode->first()->anime->episodes }}
                                    @else
                                    @php
                                    $last+=100;
                                    @endphp
                                    {{ $first }}-{{ $last }}
                                    @endif</a>
                            </li>
                            @php
                            $first =$last+1;
                            @endphp
                            @endfor

                    </ul>


                    <div class="tab-content" id="myTabContent">
                        @php
                        $last =99;
                        $first =100;
                        $count =(int)($episode->first()->anime->episodes/99) +1;
                        @endphp
                        @for ($i = 1; $i <= (int)($episode->first()->anime->episodes/99)+1; $i++)

                            <div class="tab-pane fade show @if ($i==1)
                                active
                            @endif" id="tab{{ $i }}" role="tabpanel">
                                <div class="mt-3">
                                    @if ($i==1)
                                        @for ($j = 1; $j <= $last; $j++)
                                            <a  href="/episodes/{{ $episode->first()->anime->slug }}-episode-{{ $j }}"  @if ($episode->first()->order == $j)
                                                class = "watched"
                                                @endif>
                                                @if ($j< 10)
                                                0{{ $j }}
                                                @else
                                                {{ $j }}
                                                @endif

                                            </a>
                                        @endfor
                                    @elseif ($first == $episode->first()->anime->episodes)
                                        @php
                                        $last+=100;
                                        @endphp
                                       <a  href="/episodes/{{ $episode->first()->anime->slug }}-episode-{{ $first }}"  @if ($episode->first()->order == $first)
                                        class = "watched"
                                        @endif>
                                        @if ($first< 10)
                                        0{{ $first }}
                                        @else
                                        {{ $first }}
                                        @endif

                                    </a>
                                    @elseif ($count == $i)
                                        @for ($j = $first; $j <= $episode->first()->anime->episodes; $j++)
                                            <a  href="/episodes/{{ $episode->first()->anime->slug }}-episode-{{ $j }}"  @if ($episode->first()->order == $j)
                                                class = "watched"
                                                @endif>
                                                @if ($j< 10)
                                                0{{ $j }}
                                                @else
                                                {{ $j }}
                                                @endif

                                            </a>
                                        @endfor
                                    @else
                                        @php
                                        $last+=100;
                                        @endphp
                                        @for ($j = $first; $j <= $last; $j++)
                                            <a  href="/episodes/{{ $episode->first()->anime->slug }}-episode-{{ $j }}"  @if ($episode->first()->order == $j)
                                                class = "watched"
                                                @endif>
                                                @if ($j< 10)
                                                0{{ $j }}
                                                @else
                                                {{ $j }}
                                                @endif

                                            </a>
                                        @endfor
                                    @endif


                                </div>

                            </div>
                            @php
                            $first =$last+1;
                            @endphp
                        @endfor
                    </div>
                    @else
                    @for ($i = 1; $i <= $episode->first()->anime->episodes; $i++)
                        <a @if ($episode->first()->order == $i)
                            class = "watched"
                            @endif href="/episodes/{{ $episode->first()->anime->slug }}-episode-{{ $i }}">@if ($i< 10)
                                0{{ $i }} @else {{$i}} @endif </a>
                                @endfor
                                @endif



                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="anime__details__episodes">
                    <div class="section-title">
                        <h5>Servers</h5>
                    </div>
                    @foreach ($episode as $index => $item)
                    <a href="">{{ $item->server_name }}</a>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
