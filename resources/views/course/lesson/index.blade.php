@extends('layouts.admin')
@section('title', 'Lessons')
@include('course.custom')

@push('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.courses') }}">Courses</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('course.edit', $course->slug) }}">{{ $course->title }}</a>
    </li>
    <li class="breadcrumb-item active">Lessons</li>
@endpush

@section('content')
    @include('partials.breadcrumb')

    @include('partials.alerts')

    <div class="media align-items-center">
        <div class="media-body">
            <h1 class="page-heading h2">{{ $course->title }}</h1>
        </div>
    </div>

    @include('course.tabs')

    @if($course->exists)
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Lessons</h4>
            </div>

            <div class="card-body">
                <div class="nestable" id="nestable-handles-primary">
                    <ul class="nestable-list">
                        @foreach($course->lessons as $lesson)
                        <li class="nestable-item nestable-item-handle" data-id="2">
                            <div class="nestable-handle"><i class="material-icons">menu</i></div>
                            <div class="nestable-content">
                                <div class="media">
                                    <div class="media-left media-middle">
                                        <i class="material-icons">play_circle_outline</i>
                                    </div>
                                    <div class="media-body media-middle">
                                        <h5 class="card-title h6 mb-0">
                                            <a href="{{ route('lesson.edit', $lesson->id) }}">{{ $lesson->title }}</a>
                                        </h5>
                                        {{--  <small class="text-muted">updated {{ $lesson->updated_at }}</small>  --}}
                                    </div>
                                    <div class="media-right media-middle">
                                        <a href="{{ route('lesson.edit', $lesson->id) }}" class="btn btn-white btn-sm"><i class="material-icons">edit</i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        
                    </ul>
                </div>
            </div>
            
            <div class="card-footer text-center">
                <a href="{{ route('lesson.create', ['course' => $course->id]) }}" class="btn btn-primary">
                    Add Lesson<i class="material-icons btn__icon--right">add</i>
                </a>
            </div>
        </div>
    @endif
@endsection