@extends('layouts.main')
@section('title', 'Unauthorized')

@section('content')
    <div class="jumbotron text-center">
        <h1>401</h1>
        <p class="lead">{{ $exception->getMessage() }}</p>
    </div>
@endsection