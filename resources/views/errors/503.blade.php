@extends('layouts.main')
@section('title', 'Service Unavailable')

@section('content')
    <div class="jumbotron text-center">
        <h1>503</h1>
        <p class="lead">{{ $exception->getMessage() }}</p>
    </div>
@endsection