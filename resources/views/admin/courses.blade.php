@extends('layouts.admin')

@section('title', 'All courses')

@push('breadcrumb')
    <li class="breadcrumb-item active">Courses</li>
@endpush

@section('content')
    @include('partials.breadcrumb')

    <div class="media align-items-center">
        <div class="media-body">
            <h1 class="page-heading h2">Courses</h1>
        </div>
        <div class="media-right">
            <a href="{{ route('course.create') }}" class="btn btn-success">Add
                <i class="material-icons btn__icon--right">add</i>
            </a>
        </div>
    </div>

    @include('partials.alerts')
    
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <ul class="nav nav-pills ">
                        <li class="nav-item">
                            <a class="nav-link  {{ request('tab')!='' ?: 'active text-white' }}" href="{{ route('admin.courses') }}">All</a>
                        </li>
                        @if(hasRoles(['admin', 'editor']))
                        <li class="nav-item">
                            <a class="nav-link {{ request('tab')!='published' ?: 'active text-white' }}" href="{{ route('admin.courses', ['tab' => 'published']) }}">Published</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request('tab')!='draft' ?: 'active text-white' }}" href="{{ route('admin.courses', ['tab' => 'draft']) }}">Draft</a>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="col-md-4">
                    <form action="{{ url()->current() }}">
                    <div class="form-group mt-2 mt-sm-0 mb-0">
                        <div class="input-group ">
                            <input name="q" class="form-control" type="text" value="{{ request('q') }}" placeholder="Search.."/>
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="material-icons">search</i></button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th class="text-center">Students</th>
                        <th class="text-center">Published</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <td>
                            <a href="{{ route('course.edit', $course->slug) }}">{{ $course->title }}</a>
                        </td>
                        <td>{{ $course->author->name }}</td>
                        <td>{{ !empty($course->category_id) ? $course->category->title : '' }}</td>
                        <td class="text-center">
                            <a href="{{ $course->students->count() ? route('course.students', $course->slug) : '#' }}">{{ number_format($course->students->count()) }}</a>
                        </td>
                        <td class="text-center">{{ $course->published_date }}</td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

    <div class="pull-right text-muted">
        <small>{{ $coursesCount }} {{ str_plural('Course', $coursesCount) }}</small>
    </div>

    <nav class="text-center">
        {{ $courses->appends(request()->only(['q']))->links('partials.pagination') }}
    </nav>
@endsection