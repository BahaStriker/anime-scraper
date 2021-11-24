@extends('layouts.front.master')
@section('title')
{{ $animes->first()->type }}
@endsection
@section('content')
<section class="product-page spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="product__page__content">
                    <div class="product__page__title">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-6">
                                <div class="section-title">
                                    <h4>{{ $animes->first()->type }}</h4>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        @foreach ($animes as $item)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset($item->thumnail) }}">
                                    @if ($item->type !='Movie')
                                        @switch($item->status)
                                        @case('Upcoming')
                                        <div class="ep">Upcoming</div>
                                        @break
                                        @case('Completed')
                                        <div class="ep">{{ $item->episodes }} / {{ $item->episodes }}</div>
                                        @break
                                        @default
                                        <div class="ep">{{ $item->episodes }} / ?</div>
                                        @endswitch

                                    @endif


                                    <div class="comment"><i class="fa fa-comments"></i> 69</div>
                                    <div class="view"><i class="fa fa-eye"></i> 69</div>
                                </div>
                                <div class="product__item__text">
                                    <ul>
                                        @foreach ($item->categories as $categ)
                                        <li>{{ $categ->name }}</li>
                                        @endforeach


                                    </ul>
                                    <h5><a href="{{ route('anime.details', ['slug'=>$item->slug]) }}">{{
                                            $item->name_english }}</a></h5>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
                {{ $animes->links('pagination.custom') }}

            </div>
        </div>
    </div>
</section>
@endsection
