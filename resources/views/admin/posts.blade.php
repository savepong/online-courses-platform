@extends('layouts.admin')
@section('title', 'Posts')

@push('breadcrumb')
    <li class="breadcrumb-item active">Posts</li>
@endpush

@section('content')
    @include('partials.breadcrumb')
    @include('partials.alerts')

    <div class="media align-items-center">
        <div class="media-body">
            <h1 class="page-heading h2">Posts</h1>
        </div>
        <div class="media-right">
            <a href="{{ route('post.create') }}" class="btn btn-success">Add
                <i class="material-icons btn__icon--right">add</i>
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <ul class="nav nav-pills ">
                        <li class="nav-item">
                            <a class="nav-link  {{ request('tab')!='' ?: 'active text-white' }}" href="{{ route('admin.posts') }}">All</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request('tab')!='published' ?: 'active text-white' }}" href="{{ route('admin.posts', ['tab' => 'published']) }}">Published</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request('tab')!='draft' ?: 'active text-white' }}" href="{{ route('admin.posts', ['tab' => 'draft']) }}">Draft</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request('tab')!='trashed' ?: 'active text-white' }}" href="{{ route('admin.posts', ['tab' => 'trashed']) }}">Trashed</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <form action="{{ url()->current() }}">
                    <div class="form-group mt-2 mt-sm-0 mb-0">
                        <div class="input-group ">
                            <input name="q" class="form-control" type="text" value="{{ request('q') }}" placeholder="Search.."/>
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="material-icons">search</i></button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <?php $sort = request('sort')=='ASC' ? 'DESC' : 'ASC' ?>
        @if($posts->count())
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <a href="{{ url()->current() }}?column=title&sort={{ $sort }}" class="text-dark">Post</a>
                            <i class="{{ (request('column') == 'title') ?: 'd-none' }} material-icons">{{ ($sort)=='ASC' ? 'arrow_drop_up' : 'arrow_drop_down' }}</i>
                        </th>
                        <th class="text-center">
                            <a href="{{ url()->current() }}?column=published_at&sort={{ $sort }}" class="text-dark">Published</a>
                            <i class="{{ (request('column') == 'published_at') ?: 'd-none' }} material-icons">{{ ($sort)=='ASC' ? 'arrow_drop_up' : 'arrow_drop_down' }}</i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ $post->image_thumb_url }}" alt="" width="120" class="rounded">
                                </div>
                                <div class="media-body media-middle">
                                    <a href="{{ route('post.edit', $post->id) }}">{{ $post->title }}</a>
                                    @if($post->deleted_at)
                                        <p>
                                            {!! Form::open(['method' => 'PUT', 'route' => ['post.restore', $post->id], 'style' => 'display:inline-block;']) !!}
                                                <button type="submit" class="btn btn-sm btn-default">
                                                    <i class="fa fa-undo mr-1"></i> Restore
                                                </button>
                                            {!! Form::close() !!}
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['post.force-destroy', $post->id], 'style' => 'display:inline-block;']) !!}
                                                <button class="btn btn-link text-danger btn-sm" type="submit" onClick="return confirm('Are you sure to delete a post permanently?')">
                                                    <i class="fa fa-trash mr-1"></i> Delete
                                                </button>
                                            {!! Form::close() !!}
                                        </p>
                                    @else
                                        <p>
                                            <div class="text-muted small">{{ $post->author->name }}</div>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            {{ $post->published_date }}
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        @else
            <div class="alert alert-default">No record found!</div>
        @endif
    </div>

    <div class="pull-right text-muted">
        <small>{{ $posts->total() }} {{ str_plural('Item', $posts->total()) }}</small>
    </div>

    <nav class="text-center">
        {{ $posts->appends(request()->only(['q']))->links('partials.pagination') }}
    </nav>
@endsection



