@extends('layouts.main')
@section('title', $course->title)

@section('style')
<meta property="fb:app_id" content="111559082983624" />
<meta property="og:url" content="{{ route('course.view', $course->slug) }}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $course->title }}" />
<meta property="og:description" content="{{ $course->excerpt }}" />
<meta property="og:image" content="{{ $course->image_url }}" />

<meta name="twitter:card" content="photo" />
<meta name="twitter:site" content="{{ config('app.url') }}" />
<meta name="twitter:title" content="{{ $course->title }}" />
<meta name="twitter:image" content="{{ $course->image_url }}" />
<meta name="twitter:url" content="{{ route('course.view', $course->slug) }}" />
@endsection

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">All Courses</a></li>
    <li class="breadcrumb-item"><a href="{{ route('course.category', $course->category->slug) }}">{{ $course->category->title }}</a></li>
    <li class="breadcrumb-item active">{{ $course->title }}</li>
@endpush

@section('content')
    @include('partials.breadcrumb')
    @include('partials.alerts')

    <h1 class="page-heading h2">{{ $course->title }}</h1>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                @if($course->image_url)
                    <img src="{{ $course->image_url }}" style="width:100%" alt="{{ $course->title }}">
                @endif
                
                <div class="card-body">
                    <p class="lead">{{ $course->excerpt }}</p>
                    <hr>
                    {!! $course->description !!}
                </div>
            </div>

            <!-- Lessons -->
            @if($course->lessons->count())
            
            <ul class="card list-group list-group-fit">
                
                @if($course->video)
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/{{ $course->video }}?title=0&byline=0&portrait=0&autoplay=1&color=FFC107&speed=1&transparent=1" allowfullscreen=""></iframe>
                    </div>
                    <li class="list-group-item active">
                        <div class="media">
                            <div class="media-left"></div>
                            <div class="media-body">
                                <a href="#">Introduction</a>
                            </div>
                            <div class="media-right">
                                <small class="badge badge-primary ">Preview</small>
                            </div>
                        </div>
                    </li>
                @endif

                <?php $i=1; ?>
                @foreach($course->lessons as $lesson)
                <li class="list-group-item">
                    <div class="media">
                        <div class="media-left">
                            <div class="text-muted">{{ $i++ }}.</div>
                        </div>
                        <div class="media-body">
                            <div class="">{{ $lesson->title }}</div>
                        </div>
                        <div class="media-right">
                            <small class="text-muted-light">{{ $lesson->video_duration }}</small>
                        </div>
                    </div>
                </li>
                @endforeach
                
               
            </ul>
            @endif
        </div>


        <div class="col-md-4">    
            <div class="card">
                <div class="card-body text-center">
                    
                            
                        @auth
                            @if(Auth::user()->id == $course->author_id)
                                <a href="{{ route('course.edit', $course->slug) }}" class="btn btn-warning btn-block">
                                    <i class="material-icons mr-1">mode_edit</i>Manage course
                                </a>
                            @elseif(Auth::user()->enrolled->find($course->id) == true)
                                <h2>Learning</h2>
                                <?php $ls = $course->lessons->first(); ?>
                                @if($ls)
                                    <?php $progress = $course->learningProgress(Auth::user()->id); ?>
                                    <p>
                                        <div class="progress rounded-0">
                                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: {{ $progress }}%" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="text-muted small">{{ $progress }}% Completed</span>
                                    </p>
                                    <p>
                                        <a href="{{ route('course.learn', $course->slug) }}?lesson={{ $ls['id'] }}" class="btn btn-info btn-block">
                                            Continue learning<i class="material-icons btn__icon--right">play_circle_outline</i>
                                        </a>
                                    </p>
                                @endif
                            @else
                                @if($course->sale_price == 0)
                                    <h2>Free</h2>
                                    <p>
                                        <a href="{{ route('course.enroll', $course->slug) }}" class="btn btn-success btn-block btn-lg">
                                            <i class="material-icons mr-1">ondemand_video</i> Learn Now
                                        </a>
                                    </p>
                                @else
                                    <h2>฿{{ number_format($net_price,2) }}</h2>
                                    
                                    {!! Form::open(['route' => ['course.checkout', $course->slug], 'method' => 'GET']) !!}
                                        
                                        @if($net_price < $course->price)
                                            <p class="lead text-muted">
                                                <s>฿{{ number_format($course->price,2) }}</s>
                                                {{ $course->discountPercent($course->price, $net_price) }}% off
                                            </p>
                                        @endif

                                        {!! Form::hidden('coupon', request('coupon')) !!}

                                        <p>
                                            <button type="submit" class="btn btn-primary btn-block btn-lg">
                                                <i class="material-icons mr-1">shopping_cart</i> Buy Now
                                            </button>
                                        </p>
                                    {{ Form::close() }}

                                    <p class="text-muted-light">Have a coupon?</p>
                                    {!! Form::open(['url' => url()->current(), 'method' => 'GET']) !!}
                                        <div class="input-group input-group-sm">
                                            <input name="coupon" type="text" class="form-control" value="{{ request('coupon') }}" placeholder="Enter Coupon Code" {{ $discount==0 ?: 'disabled' }}>
                                            @if($discount > 0)
                                                <span class="input-group-addon text-success">฿ -{{ number_format($discount) }} <i class="material-icons ml-1">check</i></span>
                                                <div class="input-group-btn">
                                                    <a href="{{ url()->current() }}" class="btn btn-default" alt="Cancel coupon"><i class="material-icons">close</i></a>
                                                </div>
                                            @else
                                                <div class="input-group-btn">
                                                    <button type="submit" class="btn btn-default">Apply</button>
                                                </div>
                                            @endif
                                        </div>
                                    {{ Form::close() }}
                                
                                @endif
                                
                            @endif
                        @else
                            @if($course->sale_price == 0)
                                <h2>Free</h2>
                                <p>
                                    <a href="#" data-toggle="modal" data-target="#modalLogin" class="btn btn-success btn-block btn-lg">
                                        <i class="material-icons mr-1">ondemand_video</i> Login to Learn
                                    </a>
                                </p>
                            @else
                                <h2>฿{{ number_format($course->sale_price,2) }}</h2>
                                <p>
                                    <a href="#" data-toggle="modal" data-target="#modalLogin" class="btn btn-primary btn-block btn-lg">
                                        <i class="material-icons mr-1">shopping_cart</i> Buy Now
                                    </a>
                                </p>
                            @endif
                        @endauth
                        
                    
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-white">
                    <div class="media">
                        <div class="media-left media-middle">
                            <img src="{{ $course->author->avatar_url }}" alt="{{ $course->author->name }}" width="50" class="rounded-circle">
                        </div>
                        <div class="media-body media-middle">
                            <h4 class="card-title">
                                <a href="{{ $course->author->username ? route('user.profile', $course->author->username) : '#' }}">{{ $course->author->name }}</a>
                            </h4>
                            <p class="card-subtitle">Instructor</p>
                        </div>
                    </div>
                </div>
                
                @isset($course->author->bio)
                <div class="card-body">
                    <p class="text-muted">{{ $course->author->bio }}</p>
                </div>
                @endisset
            </div>
            <div class="card">
                <ul class="list-group list-group-fit">
                    <li class="list-group-item">
                        <div class="media">
                            <div class="media-left">
                                <i class="material-icons text-muted-light">schedule</i>
                            </div>
                            <div class="media-body media-middle">
                                {{ gmdate("G", $course->duration) }} <small class="text-muted">hrs</small> &nbsp; {{ gmdate("i", $course->duration) }} <small class="text-muted">min</small>
                            </div>
                        </div>
                    </li>

                    @if($course->students->count())
                    <li class="list-group-item">
                        <div class="media">
                            <div class="media-left">
                                <i class="material-icons text-muted-light">people</i>
                            </div>
                            <div class="media-body media-middle">
                                {{ $course->students->count() }} {{ str_plural('Student', $course->students->count()) }}
                            </div>
                        </div>
                    </li>
                    @endif
                    
                    @isset($course->category_id)
                    <li class="list-group-item">
                        <div class="media">
                            <div class="media-left">
                                <i class="material-icons text-muted-light">folder</i>
                            </div>
                            <div class="media-body media-middle">
                                <a href="{{ route('course.category', $course->category->slug) }}">{{ $course->category->title }}</a>
                            </div>
                        </div>
                    </li>
                    @endisset

                    @if($course->tags->count())
                        <li class="list-group-item">
                            <div class="media">
                                <div class="media-left">
                                    <i class="material-icons text-muted-light">bookmark</i>
                                </div>
                                <div class="media-body media-middle">
                                    @foreach($course->tags as $tag)
                                        <a href="{{ route('course.tag', $tag->slug) }}" class="badge badge-primary ">{{ $tag->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    @endif
                    
                </ul>
            </div>
                    
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="material-icons mr-1">share</i> Share this course</h4>
                </div>
                

                <div class="card-body text-center">

                    <a href="https://www.facebook.com/sharer.php?u={{ route('course.view', $course->slug) }}" class="btn btn-circle btn-secondary"  target="_blank">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="https://twitter.com/share?url={{ route('course.view', $course->slug) }}&text={{ $course->title }}" class="btn btn-circle btn-primary"  target="_blank">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="https://plus.google.com/share?url={{ route('course.view', $course->slug) }}" class="btn btn-circle btn-danger"  target="_blank">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <a href="https://lineit.line.me/share/ui?url={{ route('course.view', $course->slug) }}" class="btn btn-circle btn-success"  target="_blank"><i class="fa fa-comment"></i></a>

                    {{--  <div class="rating">
                        <i class="material-icons">star</i>
                        <i class="material-icons">star</i>
                        <i class="material-icons">star</i>
                        <i class="material-icons">star</i>
                        <i class="material-icons">star_border</i>
                    </div>
                    <small class="text-muted">20 ratings</small>  --}}
                </div>
            </div>
            
        </div>
    </div>
@endsection