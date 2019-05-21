@extends('layouts.main') 
@section('title','Posts') 

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
    <li class="breadcrumb-item active">Blog</li>
@endpush

@section('content')
    @include('partials.breadcrumb')
   @include('partials.alerts')

   <div class="media align-items-center">
        <div class="media-body">
            <h1 class="page-heading h2">Blog</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            @foreach($posts as $post)
            <div class="card">
                <a href="{{ route('post.view', $post->slug) }}">
                    <img src="{{ $post->image_url }}" style="width:100%" alt="{{ $post->title }}">
                </a>

                <div class="card-body p-4">
                    <a href="{{ route('post.view', $post->slug) }}"><h3 class="text-dark">{{ $post->title }}</h3></a>

                    <div class="media mt-3 mb-3">
                        <div class="media-left">
                            <img src="{{ $post->author->avatar_url }}" alt="{{ $post->author->name }}" width="42" class="rounded-circle">
                        </div>
                        <div class="media-body media-middle">
                            <span>{{ $post->author->name }}</span>
                            <small class="text-muted"><br>{{ $post->published_date }}</small>
                        </div>
                        <div class="media-right text-right">
                            <a href="https://www.facebook.com/sharer.php?u={{ route('post.view', $post->slug) }}" class="btn btn-circle btn-sm btn-secondary"  target="_blank">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="https://twitter.com/share?url={{ route('post.view', $post->slug) }}&text={{ $post->title }}" class="btn btn-circle btn-sm btn-primary"  target="_blank">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="https://plus.google.com/share?url={{ route('post.view', $post->slug) }}" class="btn btn-circle btn-sm btn-danger"  target="_blank">
                                <i class="fa fa-google-plus"></i>
                            </a>
                            <a href="https://lineit.line.me/share/ui?url={{ route('post.view', $post->slug) }}" class="btn btn-circle btn-sm btn-success"  target="_blank"><i class="fa fa-comment"></i></a>
                        </div>
                    </div>


                    <p class="lead">{{ $post->excerpt }}</p>

                    <a href="{{ route('post.view', $post->slug) }}" class="btn btn-default btn-sm">Read more</a>
                    
                </div>
              
            </div>

            @endforeach
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-white">
                    <h4 class="card-title"><i class="material-icons text-muted-light mr-1">folder</i> Categories</h4>
                </div>
                <ul class="list-group list-group-fit">
                    @foreach ($categories as $category)
                        <li class="list-group-item {{ (isset($categoryId) && $category->id == $categoryId) ? 'active' : '' }}">
                            <a href="{{ route('post.category', $category->slug) }}">{{ $category->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    
    <br>
    <nav class="text-center">
        {{ $posts->appends(request()->only(['q']))->links('partials.pagination') }}
    </nav>
@endsection
