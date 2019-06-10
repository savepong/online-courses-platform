@extends('layouts.courseplus.horizontal')

@section('content')
    <articles-page :posts="{{$posts}}"></articles-page>
@endsection