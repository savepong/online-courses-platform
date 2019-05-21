@extends('layouts.admin')
@section('title', 'Create new course')
@include('course.custom')

@push('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.courses') }}">All Courses</a>
    </li>
    <li class="breadcrumb-item active">Create Course</li>
@endpush

@section('content')
    @include('partials.breadcrumb')
    
    <div class="media align-items-center">
        <div class="media-body">
            <h1 class="page-heading h2">Create course</h1>
        </div>
    </div>

    {!! Form::model($course, [
            'method' => 'POST',
            'route' => 'course.store',
            'files' => TRUE,
        ]) 
    !!}

    @include('course.form')
    
    {!! Form::close() !!}
@endsection