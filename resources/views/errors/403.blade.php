@extends('layouts.main')
@section('title', 'Forbidden')

@section('content')
    <div class="jumbotron text-center">
        <h1>403</h1>
        <p class="lead">{{ $exception->getMessage() }}</p>
    </div>
@endsection