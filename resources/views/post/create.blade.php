@extends('layouts.admin')
@section('title', 'Create Post')
@include('post.custom')

@push('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.posts') }}">Posts</a>
    </li>
    <li class="breadcrumb-item active">Create Post</li>
@endpush

@section('content')
    @include('partials.breadcrumb')
    
    <div class="media align-items-center">
        <div class="media-body">
            <h1 class="page-heading h2">Create Post</h1>
        </div>
    </div>

    {!! Form::model($post, [
            'method' => 'POST',
            'route' => 'post.store',
            'files' => TRUE,
        ]) 
    !!}

    @include('post.form')
    
    {!! Form::close() !!}
@endsection