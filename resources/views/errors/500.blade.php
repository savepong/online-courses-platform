@extends('layouts.main')
@section('title', 'Internal Server Error')

@section('content')
    <div class="jumbotron text-center">
        <h1>500</h1>
        <p class="lead">{{ $exception->getMessage() }}</p>
    </div>
@endsection