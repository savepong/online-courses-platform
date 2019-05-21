@extends('layouts.main')
@section('title', $post->title)

@section('style')
<meta property="fb:app_id" content="{{ config('services.facebook.client_id') }}" />
<meta property="og:url" content="{{ route('post.view', $post->slug) }}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $post->title }}" />
<meta property="og:description" content="{{ $post->excerpt }}" />
<meta property="og:image" content="{{ $post->image_url }}" />

<meta name="twitter:card" content="photo" />
<meta name="twitter:site" content="{{ config('app.url') }}" />
<meta name="twitter:title" content="{{ $post->title }}" />
<meta name="twitter:image" content="{{ $post->image_url }}" />
<meta name="twitter:url" content="{{ route('post.view', $post->slug) }}" />
@endsection

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
    <li class="breadcrumb-item active">{{ $post->title }}</li>
@endpush

@section('content')
    @include('partials.breadcrumb')
    @include('partials.alerts')

    

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <img src="{{ $post->image_url }}" style="width:100%" alt="{{ $post->title }}">

                <div class="card-header bg-white p-4">
                    <h1 class="page-heading h2">{{ $post->title }}</h1>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ $post->author->avatar_url }}" alt="{{ $post->author->name }}" width="50" class="rounded-circle">
                                </div>
                                <div class="media-body media-middle">
                                    <h4 class="card-title">
                                        <a href="{{ $post->author->username ? route('user.profile', $post->author->username) : '#' }}">{{ $post->author->name }}</a>
                                    </h4>
                                    <p class="card-subtitle">{{ $post->published_date }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 text-center pt-3 pt-sm-0">
                            <a href="https://www.facebook.com/sharer.php?u={{ route('post.view', $post->slug) }}" class="btn btn-circle btn-secondary"  target="_blank">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="https://twitter.com/share?url={{ route('post.view', $post->slug) }}&text={{ $post->title }}" class="btn btn-circle btn-primary"  target="_blank">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="https://plus.google.com/share?url={{ route('post.view', $post->slug) }}" class="btn btn-circle btn-danger"  target="_blank">
                                <i class="fa fa-google-plus"></i>
                            </a>
                            <a href="https://lineit.line.me/share/ui?url={{ route('post.view', $post->slug) }}" class="btn btn-circle btn-success"  target="_blank"><i class="fa fa-comment"></i></a>
                        </div>
                    </div>
                    
                </div>
                
                <div class="card-body p-4">
                    <p class="lead">{{ $post->excerpt }}</p>
                    
                    {!! $post->body !!}  

                    <p class="text-center">
                        <a href="https://www.facebook.com/sharer.php?u={{ route('post.view', $post->slug) }}" class="btn btn-circle btn-secondary"  target="_blank">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="https://twitter.com/share?url={{ route('post.view', $post->slug) }}&text={{ $post->title }}" class="btn btn-circle btn-primary"  target="_blank">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="https://plus.google.com/share?url={{ route('post.view', $post->slug) }}" class="btn btn-circle btn-danger"  target="_blank">
                            <i class="fa fa-google-plus"></i>
                        </a>
                        <a href="https://lineit.line.me/share/ui?url={{ route('post.view', $post->slug) }}" class="btn btn-circle btn-success"  target="_blank"><i class="fa fa-comment"></i></a>
                    </p>                 
                </div>

                <div class="card-footer bg-white">
                    
                    @isset($post->category_id)
                        <div class="media">
                            <div class="media-left">
                                <i class="material-icons text-muted-light">folder</i>
                            </div>
                            <div class="media-body media-middle">
                                <a href="#">{{ $post->category->title }}</a>
                            </div>
                        </div>
                    @endisset

                    @if($post->tags->count())
                        <div class="media">
                            <div class="media-left">
                                <i class="material-icons text-muted-light">bookmark</i>
                            </div>
                            <div class="media-body media-middle">
                                @foreach($post->tags as $tag)
                                    <a href="{{ route('course.tag', $tag->slug) }}" class="badge badge-primary ">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">    
           
            <div class="card">
                <div class="card-header bg-white">
                    <div class="media">
                        <div class="media-left">
                            <img src="{{ $post->author->avatar_url }}" alt="{{ $post->author->name }}" width="50" class="rounded-circle">
                        </div>
                        <div class="media-body media-middle">
                            <h4 class="card-title">
                                <a href="{{ $post->author->username ? route('user.profile', $post->author->username) : '#' }}">{{ $post->author->name }}</a>
                            </h4>
                            <p class="card-subtitle">{{ $post->published_date }}</p>
                        </div>
                    </div>
                </div>
                
                @isset($post->author->bio)
                <div class="card-body">
                    <p class="text-muted">{{ $post->author->bio }}</p>
                </div>
                @endisset
            </div>
            
        </div>
    </div>
    <br>
@endsection