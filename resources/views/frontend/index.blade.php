@extends('layouts.courseplus.horizontal')

@section('content')
    <index-page :courses="{{$courses}}" :articles="{{$posts}}" :categories="{{$categories}}"></index-page>
@endsection