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
    <li class="breadcrumb-item active">Edit Lesson</li>
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
                'method' => 'PUT',
                'route' => ['lesson.update', $lesson->id],
                'files' => TRUE,
                'id' => 'lesson-form',
                'class' => ''
            ]) 
            !!}

            {!! Form::hidden('course_id', $lesson->course_id) !!}
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Lesson</h4>
                </div>
                <div class="card-body">
                    
                    @include('course.lesson.form')
                </div>
                <div class="card-footer text-left">
                    <button type="submit" class="btn btn-success">Save Change</button>
                    <a href="{{ route('course.edit', $course->slug) }}" class="btn btn-white" >Cancel</a>

                    <a href="#" class="btn btn-link text-danger pull-right" data-toggle="modal" data-target="#modalDeleteLesson"><i class="fa fa-trash mr-1"></i>Delete</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

        <div class="col-md-3">
            @include('course.lesson.lists')
        </div>
    </div>

@endsection

@section('modals')
    <div class="modal fade" id="modalDeleteLesson" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            {!! Form::open(['method' => 'DELETE', 'route' => ['lesson.destroy', $lesson->id] ]) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Delete Lesson</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Delete lesson <strong>{{ $lesson->title }}</strong> to the Trash?
                </div>
                <div class="modal-footer text-right">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Cancel</a>
                    <button type="submit" class="btn btn-danger">Confirm Delete</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
