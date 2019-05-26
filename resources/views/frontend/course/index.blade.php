@extends('layouts.courseplus.horizontal')

@section('content')
    <index-page :courses="{{$courses}}"></index-page>
@endsection