@extends('layouts.admin')
@section('title', 'Categories')

@push('breadcrumb')	
    <li class="breadcrumb-item active">Categories</li>
@endpush

@section('content')
    @include('partials.breadcrumb')

    @include('partials.alerts')

    <div class="media align-items-center">
        <div class="media-body">
            <h1 class="page-heading h2">Categories</h1>
        </div>
        <div class="media-right">
            <a href="{{ route('category.create') }}" class="btn btn-success">Add Category
                <i class="material-icons btn__icon--right">add</i>
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="float-left">
                <form action="{{ route('admin.categories') }}" class="form-inline">
                    <div class="form-group mb-2">
                        <input name="q" class="form-control" type="text" value="{{ request('q') }}" placeholder="Search.."/>
                    </div>
                    <button type="submit" class="btn btn-default ml-2 mb-2"><i class="material-icons">search</i> Search</button>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
        @if($categories->count())
        <table class="table">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th class="text-center">Course Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>
                        <a href="{{ route('category.edit', $category->id) }}">{{ $category->title }}</a>
                    </td>
                    <td class="text-center">{{ $category->courses->count() }}</td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
        @else
            <div class="alert alert-default">No record found!</div>
        @endif
    </div>

    <div class="pull-right text-muted">
        <small>{{ $categoriesCount }} {{ str_plural('Item', $categoriesCount) }}</small>
    </div>

    <nav class="text-center">
        {{ $categories->appends(request()->only(['q']))->links('partials.pagination') }}
    </nav>
@endsection