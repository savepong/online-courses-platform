@extends('layouts.admin')
@section('title', 'Create new lesson')
@include('course.custom')

@push('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.courses') }}">Courses</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('course.edit', $course->slug) }}">{{ $course->title }}</a>
    </li>
    <li class="breadcrumb-item active">Add Lesson</li>
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

    <div class="row">
        <div class="col-md-9">
            {!! Form::model($lesson, [
                'method' => 'POST',
                'route' => 'lesson.store',
                'files' => TRUE,
                'id' => 'lesson-form'
            ]) 
            !!}
            {!! Form::hidden('course_id', $course->id) !!}
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Lesson</h4>
                </div>
                <div class="card-body">
                    
                    @include('course.lesson.form')
                </div>
                <div class="card-footer text-left">
                    <button type="submit" class="btn btn-success">Save Change</button>
                    <a href="{{ route('course.edit', $course->slug) }}" class="btn btn-white" >Cancel</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

        <div class="col-md-3">
            @include('course.lesson.lists')
        </div>
    </div>

@endsection