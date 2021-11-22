@extends('layouts.front.master')
@section('title')
{{ $anime->name_english }}
@endsection
@section('content')
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="index.html"><i class="fa fa-home"></i> Home</a>
                    <a href="categories.html">Categories</a>
                    <span>Romance</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Breadcrumb End -->

<!-- Anime Section Begin -->
<section class="anime-details spad">
<div class="container">
    <div class="anime__details__content">
        <div class="row">
            <div class="col-lg-3">
                <div class="anime__details__pic set-bg" data-setbg="{{ asset($anime->thumnail) }}">
                    <div class="comment"><i class="fa fa-comments"></i> 69</div>
                    <div class="view"><i class="fa fa-eye"></i> 69</div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="anime__details__text">
                    <div class="anime__details__title">
                        <h3>{{ $anime->name_english }}</h3>
                        <span>{{ $anime->name_japanese }}</span>
                    </div>
                    <div class="anime__details__rating">
                        <div class="rating">
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star-half-o"></i></a>
                        </div>
                        <span>1.029 Votes</span>
                    </div>
                    <p>{{$anime->description}}</p>
                    <hr>
                    <div class="anime__details__widget">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <ul>
                                    <li><span><i class="fa fa-angle-right mr-2"></i>Type :</span> {{ $anime->type }}</li>
                                    <li><span><i class="fa fa-angle-right mr-2"></i>Studios :</span> {{ $anime->studios }}</li>
                                    <li><span><i class="fa fa-angle-right mr-2"></i>Premiered :</span> {{ $anime->premiered }}</li>
                                    <li><span><i class="fa fa-angle-right mr-2"></i>Status :</span> {{ $anime->status }}</li>

                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <ul>
                                    <li><span><i class="fa fa-angle-right mr-2"></i>Year :</span> {{ $anime->year }}</li>
                                    <li><span><i class="fa fa-angle-right mr-2"></i>Scores :</span> {{ $anime->scores }}</li>
                                    <li><span><i class="fa fa-angle-right mr-2"></i>Views :</span> 69</li>
                                    <li><span><i class="fa fa-angle-right mr-2"></i>Genre :</span> @foreach ($anime->categories as $item)
                                        {{ $item->name }} ,
                                    @endforeach</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="anime__details__btn">
                        <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Follow</a>
                        <a href="{{ route('anime.watch', ['slug'=>$anime->list->first()->slug]) }}" class="follow-btn"><i class="fa fa-eye"></i> Watch Now !</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="anime__details__episodes">
            <div class="section-title">
                <h5>Episodes list</h5>
            </div>
            @if ($anime->episodes > 99)
                    @php
                    $count =(int)($anime->episodes/99) +1;
                    @endphp
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @php
                        $last =99;
                        $first =100;
                        @endphp
                        @for ($i = 1; $i <= (int)($anime->episodes/99)+1; $i++)

                            <li class="nav-item" role="presentation">
                                <a class="nav-link @if($i ==1) active @endif" data-toggle="tab" href="#tab{{ $i }}"
                                    role="tab" aria-controls="home" aria-selected="true">@if ($i==1)
                                    {{ $i }}-{{ $last }}

                                    @elseif ($first == $anime->episodes)
                                    @php
                                    $last+=100;
                                    @endphp
                                    {{ $first }}
                                    @elseif ($count == $i)
                                    {{ $first }}-{{ $anime->episodes }}
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
                        $count =(int)($anime->episodes/99) +1;
                        @endphp
                        @for ($i = 1; $i <= (int)($anime->episodes/99)+1; $i++)

                            <div class="tab-pane fade show @if ($i==1)
                                active
                            @endif" id="tab{{ $i }}" role="tabpanel">
                                <div class="mt-3">
                                    @if ($i==1)
                                        @for ($j = 1; $j <= $last; $j++)
                                            <a  href="/episodes/{{ $anime->slug }}-episode-{{ $j }}"  @if ($anime->order == $j)
                                                class = "watched"
                                                @endif>
                                                @if ($j< 10)
                                                0{{ $j }}
                                                @else
                                                {{ $j }}
                                                @endif

                                            </a>
                                        @endfor
                                    @elseif ($first == $anime->episodes)
                                        @php
                                        $last+=100;
                                        @endphp
                                       <a  href="/episodes/{{ $anime->slug }}-episode-{{ $first }}"  @if ($anime->order == $first)
                                        class = "watched"
                                        @endif>
                                        @if ($first< 10)
                                        0{{ $first }}
                                        @else
                                        {{ $first }}
                                        @endif

                                    </a>
                                    @elseif ($count == $i)
                                        @for ($j = $first; $j <= $anime->episodes; $j++)
                                            <a  href="/episodes/{{ $anime->slug }}-episode-{{ $j }}"  @if ($anime->order == $j)
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
                                            <a  href="/episodes/{{ $anime->slug }}-episode-{{ $j }}"  @if ($anime->order == $j)
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
                    @for ($i = 1; $i <= $anime->episodes; $i++)
                        <a @if ($anime->order == $i)
                            class = "watched"
                            @endif href="/episodes/{{ $anime->slug }}-episode-{{ $i }}">@if ($i< 10)
                                0{{ $i }} @else {{$i}} @endif </a>
                                @endfor
                                @endif
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="anime__details__review">
                    <div class="section-title">
                        <h5>Reviews</h5>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="{{ asset('front_files/img/anime/review-1.jpg') }}" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Chris Curry - <span>1 Hour ago</span></h6>
                            <p>whachikan Just noticed that someone categorized this as belonging to the genre
                            "demons" LOL</p>
                        </div>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="{{ asset('front_files/img/anime/review-2.jpg') }}" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                            <p>Finally it came out ages ago</p>
                        </div>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="{{ asset('front_files/img/anime/review-3.jpg') }}" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                            <p>Where is the episode 15 ? Slow update! Tch</p>
                        </div>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="{{ asset('front_files/img/anime/review-4.jpg') }}" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Chris Curry - <span>1 Hour ago</span></h6>
                            <p>whachikan Just noticed that someone categorized this as belonging to the genre
                            "demons" LOL</p>
                        </div>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="{{ asset('front_files/img/anime/review-5.jpg') }}" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                            <p>Finally it came out ages ago</p>
                        </div>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="{{ asset('front_files/img/anime/review-6.jpg') }}" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                            <p>Where is the episode 15 ? Slow update! Tch</p>
                        </div>
                    </div>
                </div>
                <div class="anime__details__form">
                    <div class="section-title">
                        <h5>Your Comment</h5>
                    </div>
                    <form action="#">
                        <textarea placeholder="Your Comment"></textarea>
                        <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="anime__details__sidebar">
                    <div class="section-title">
                        <h5>you might like...</h5>
                    </div>
                    <div class="product__sidebar__view__item set-bg" data-setbg="{{ asset('front_files/img/sidebar/tv-1.jpg') }}">
                        <div class="ep">18 / ?</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        <h5><a href="#">Boruto: Naruto next generations</a></h5>
                    </div>
                    <div class="product__sidebar__view__item set-bg" data-setbg="{{ asset('front_files/img/sidebar/tv-2.jpg') }}">
                        <div class="ep">18 / ?</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                    </div>
                    <div class="product__sidebar__view__item set-bg" data-setbg="{{ asset('front_files/img/sidebar/tv-3.jpg') }}">
                        <div class="ep">18 / ?</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        <h5><a href="#">Sword art online alicization war of underworld</a></h5>
                    </div>
                    <div class="product__sidebar__view__item set-bg" data-setbg="{{ asset('front_files/img/sidebar/tv-4.jpg') }}">
                        <div class="ep">18 / ?</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        <h5><a href="#">Fate/stay night: Heaven's Feel I. presage flower</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
