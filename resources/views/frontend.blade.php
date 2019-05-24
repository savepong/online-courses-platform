@extends('layouts.courseplus.horizontal')

@section('content')
    <courses-page :latest-courses="{{ $latestCourses }}"></courses-page>
@endsection
