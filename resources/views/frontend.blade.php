@extends('layouts.courseplus.horizontal')

@section('content')
    <index-page :latest-courses="{{ $latestCourses }}"></index-page>
@endsection
