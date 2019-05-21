@extends('layouts.admin')

@section('title', 'All courses')

@push('breadcrumb')
    <li class="breadcrumb-item active">Change Log</li>
@endpush

@section('content')
    @include('partials.breadcrumb')

    <div class="media align-items-center">
        <div class="media-body page-heading">
            <h1 class="h2">Change Log</h1>
            <p class="lead">Current Version : {{ config('project.version') }}</p>
        </div>
    </div>

    <hr>

    {!! $content !!}

@endsection