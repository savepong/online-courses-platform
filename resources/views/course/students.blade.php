@extends('layouts.admin')
@section('title', 'Students')
@include('course.custom')

@push('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.courses') }}">Courses</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('course.edit', $course->slug) }}">{{ $course->title }}</a>
    </li>
    <li class="breadcrumb-item active">Students</li>
@endpush

@section('content')
    @include('partials.breadcrumb')
    @include('partials.alerts')

    <div class="media align-items-center">
        <div class="media-body">
            <h1 class="page-heading h2">{{ $course->title }}</h1>
        </div>
        <div class="media-right">
            <div class="pull-right text-muted">
                <small>{{ $course->students->count() }} {{ str_plural('Student', $course->students->count()) }}</small>
            </div>
        </div>
    </div>

    @include('course.tabs')

    <div class="clearfix"></div>
    
    <div class="card-columns">
        @if($students->count())
        
            @foreach($students as $student)
                <div class="card p-2">
                    <div class="card__options">
                        <div class="dropdown">
                            <a href="#" class="card__options-button" data-toggle="dropdown" aria-expanded="true"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right" x-placement="top-end" style="position: absolute; transform: translate3d(-171px, -117px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="dropdown-item" href="#" onClick="event.preventDefault();document.getElementById('btnRemoveStudent{{ $student->id }}').click();">Remove student</a>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <img src="{{ $student->avatar_url }}" alt="" width="48" class="rounded">
                        </div>
                        <div class="media-body media-middle">
                            <a href="{{ route('user.edit', $student->id) }}">{{ $student->name }}</a>
                            <div class="text-muted small">Enrolled at : {{ $student->pivot->created_at->diffForHumans() }}</div>
                            <div class="progress rounded-0">
                                <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: {{ $course->learningProgress($student->id) }}%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['course.student.remove', $course->slug, $student->id ], 'id' => 'formRemoveStudent'. $student->id]) !!}
                        <input id="btnRemoveStudent{{ $student->id }}" type="submit" onClick="return confirm('Are you sure to delete {{ $student->name }}?')" style="display:none;">
                    {!! Form::close() !!}
                </div>

                
            @endforeach
        
        @else
            <div class="alert alert-default">No record found!</div>
        @endif
    </div>

    <br>
    <nav class="text-center">
        {{ $students->links('partials.pagination') }}
    </nav>

@endsection