@extends('layouts.main') 

@section('title', $user->name) 

@section('content')
    @include('partials.alerts')

    <div class="text-center">
        <a href="#">
            <img src="{{ $user->avatar_url }}" alt="" class="rounded-circle" height="100">
        </a>
        <h1 class="h2 mb-0 mt-1">{{ $user->name }}</h1>
        <p class="lead text-muted mb-0">{{ $user->username }}</p>
        <div class="badge badge-primary text-uppercase">{{ $user->roles->first()->display_name }}</div>
        @isset($user->bio)
        <p class="text-muted mt-3">{{ $user->bio }}</p>
        @endisset
        
        {{--  <hr>
        <h5 class="text-muted">Instructor Rating</h5>
        <div class="rating">
            <i class="material-icons text-success">star</i>
            <i class="material-icons text-success">star</i>
            <i class="material-icons text-success">star</i>
            <i class="material-icons text-muted-light">star_border</i>
            <i class="material-icons text-muted-light">star_border</i>
        </div>  --}}
    </div>
    <hr>
    
    @auth
    @if(Auth::user()->id == $user->id && $user->enrolled->count())
    <h5 class="page-heading text-center text-muted">Enrolled Courses</h5>
    <div class="card-columns">
        @foreach($user->enrolled as $course)
        <div class="card">
            <div class="card-header bg-white">
                <div class="media">
                    <div class="media-left media-middle">
                        <a href="{{ route('course.view', $course->slug) }}">
                            <img src="{{ $course->image_thumb_url }}" alt="Card image cap" width="100" class="rounded">
                        </a>
                    </div>
                    <div class="media-body media-middle">
                        <h4 class="card-title">
                            <a href="{{ route('course.view', $course->slug) }}">{{ $course->title }}</a>
                        </h4>
                        <p class="small text-muted">{{ $course->author->name }}</p>
                        
                    </div>
                </div>
            </div>
            <?php $ls = $course->lessons->first(); ?>
            @if($ls) 
                <?php $progress = $course->learningProgress(Auth::user()->id); ?>
                <div class="progress rounded-0">
                    <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: {{ $progress }}%" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="card-footer bg-white text-left">
                    <span class="text-muted small">{{ $progress }}% Completed</span>
                    <a href="{{ route('course.learn', $course->slug) }}?lesson={{ $ls['id'] }}" class="btn btn-info btn-sm pull-right">Continue <i class="material-icons btn__icon--right">play_circle_outline</i></a>
                </div>
            @endif
        </div>
        @endforeach
    </div>
    <br>
    @endif
    @endauth
    
    @if($user->courses->count())
    <h5 class="page-heading text-center text-muted">Courses by {{ $user->name }}</h5>
    <div class="card-columns">
        @foreach($user->courses()->published()->get() as $course)
        <div class="card">
            <div class="card-header bg-white">
                <div class="media">
                    <div class="media-left media-middle">
                        <a href="{{ route('course.view', $course->slug) }}">
                            <img src="{{ $course->image_thumb_url }}" alt="Card image cap" width="100" class="rounded">
                        </a>
                    </div>
                    <div class="media-body media-middle">
                        <h4 class="card-title">
                            <a href="{{ route('course.view', $course->slug) }}">{{ $course->title }}</a>
                        </h4>
                        <p class="card-text small text-muted">{{ $course->excerpt }}</p>
                        @auth
                        @if(Auth::user()->id == $course->author_id)
                            <a href="{{ route('course.edit', $course->slug) }}" class="btn btn-default">
                                <i class="material-icons mr-1">mode_edit</i>Manage course
                            </a>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <br>
    @endif

@endsection