@extends('layouts.courseplus.horizontal')

@section('content')
    <courses-page :courses="{{ $courses }}"></courses-page>
@endsection