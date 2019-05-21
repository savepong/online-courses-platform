@extends('layouts.main') 
@section('title','Browse') 


@section('header')
    @if(!request('q') && !isset($tagName) && !isset($categoryName) && $carousels->count())
        <header class="d-none d-sm-block">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="5000">
                <ol class="carousel-indicators">
                    @for ($i = 0; $i < $carousels->count(); $i++)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="{{ ($i == 0) ? 'active' : ''  }}"></li>
                    @endfor
                </ol>

                <div class="carousel-inner" role="listbox">
                    <?php $i = 0;?>
                    @foreach($carousels as $carousel)
                        <div class="carousel-item {{ ($i++ == 0) ? 'active' : ''  }}" style="background-image: url('{{ $carousel->image_url }}');">
                            <div class="carousel-caption d-none d-md-block">
                                <a href="{{ $carousel->url }}" class="text-white text-shadow"><h3>{{ $carousel->title }}</h3></a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </header>
    @endif
@endsection


@section('content')
   @include('partials.alerts')

    <div class="media align-items-center">
        <div class="media-body">
            
            @if($q = request('q'))
                <h1 class="page-heading h4">Search results for:
                    <strong><i>"{{ $q }}"</i></strong>
                </h1>
            @elseif(isset($tagName))
                <h1 class="page-heading h4">Tag: 
                    <strong>{{ $tagName }}</strong>
                </h1>
            @elseif(isset($categoryName))
                <h1 class="page-heading h4">Category: 
                    <strong>{{ $categoryName }}</strong>
                </h1>
            @else
                <h1 class="page-heading h4">All Courses</h1>
            @endif

        </div>
    </div>


    


    <div class="clearfix"></div>
    <div class="row">
    
        @foreach($courses as $course)
        <div class="col-xs-12 col-sm-6 col-lg-4 pb-4">
            <div class="card h-100">
                
                <a href="{{ route('course.view', $course->slug) }}">
                    <img src="{{ $course->image_thumb_url }}" alt="Card image cap" class="card-img-top">
                </a>
                
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="{{ route('course.view', $course->slug) }}">{{ $course->title }}</a>
                    </h4>
                    <p class="small text-muted">{{ $course->excerpt }}</p>

                    <div class="d-flex justify-content-between align-items-center">

                        <div class="media">
                            <div class="media-left">
                                <img src="{{ $course->author->avatar_url }}" alt="{{ $course->author->name }}" width="28" class="rounded-circle">
                            </div>
                            <div class="media-body pt-1">
                                <h6>{{ $course->author->name }}</h6>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>

                <div class="card-footer bg-white">
                    @if($course->sale_price > 0)
                        <strong class="h3 text-dark">฿{{ number_format($course->sale_price) }}</strong>
                        @if($course->sale_price < $course->price)
                            <sup class="text-muted">
                                <s>฿{{ number_format($course->price) }}</s>
                            </sup>
                        @endif

                        <a href="{{ route('course.view', $course->slug) }}" class="btn btn-primary btn-sm pull-right"><i class="material-icons mr-1">shopping_cart</i> Buy Now</a>
                    @else
                        <strong class="h3 text-dark">Free</strong>
                        <a href="{{ route('course.view', $course->slug) }}" class="btn btn-success btn-sm pull-right"><i class="material-icons mr-1">ondemand_video</i> Learn Now</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <br>
    <nav class="text-center">
        {{ $courses->appends(request()->only(['q']))->links('partials.pagination') }}
    </nav>
@endsection


@section('style')
    <style>
        /*!
        * Start Bootstrap - Half Slider (https://startbootstrap.com/template-overviews/half-slider)
        * Copyright 2013-2017 Start Bootstrap
        * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-half-slider/blob/master/LICENSE)
        */

        
        .carousel-item {
            height: 50vh;
            min-height: 300px;
            background: no-repeat top center scroll;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .text-shadow {
            text-shadow: 1px 1px 3px black, 0 0 90px #000000bd;
        }
    </style>
@endsection