@extends('layouts.admin')
@section('title', 'Edit Post')
@include('post.custom')

@push('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.courses') }}">Posts</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('course.edit', $post->slug) }}">{{ $post->title }}</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
@endpush

@section('content')
    @include('partials.breadcrumb')

    @include('partials.alerts')

    <div class="media align-items-center">
        <div class="media-body">
            <h1 class="page-heading h2">{{ $post->title }}</h1>
        </div>
    </div>


    {!! Form::model($post, [
            'method' => 'PUT',
            'route' => ['post.update', $post->id],
            'files' => TRUE,
            'id' => 'post-form'
        ]) 
    !!}

    @include('post.form')
    
    {!! Form::close() !!}
@endsection


@section('modals')
<!-- Advance settings Modal -->
<div class="modal fade" id="modalAdvance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        {!! Form::open(['method' => 'DELETE', 'route' => ['post.destroy', $post->id] ]) !!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Delete post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Move post <strong>{{ $post->title }}</strong> to the Trash?
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
