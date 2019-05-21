@extends('layouts.admin')
@section('title', 'Edit course')
@include('course.custom')

@push('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.courses') }}">Courses</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('course.edit', $course->slug) }}">{{ $course->title }}</a>
    </li>
    <li class="breadcrumb-item active">Details</li>
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

    {!! Form::model($course, [
            'method' => 'PUT',
            'route' => ['course.update', $course->slug],
            'files' => TRUE,
            'id' => 'course-form'
        ]) 
    !!}

    @include('course.form')
    
    {!! Form::close() !!}
@endsection


@section('modals')
<!-- Advance settings Modal -->
<div class="modal fade" id="modalAdvance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        {!! Form::open(['method' => 'DELETE', 'route' => ['course.destroy', $course->slug] ]) !!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Delete Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Move course {{ $course->title }} to the Trash?
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
