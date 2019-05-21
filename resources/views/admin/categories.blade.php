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
            <a href="{{ route('category.create') }}" class="btn btn-success">Add
                <i class="material-icons btn__icon--right">add</i>
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row">
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

        <?php $sort = request('sort')=='DESC' ? 'ASC' : 'DESC' ?>
        @if($categories->count())
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <a href="{{ url()->current() }}?column=title&sort={{ $sort }}" class="text-dark">Category</a>
                        </th>
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
        </div>
        @else
            <div class="alert alert-default">No record found!</div>
        @endif
    </div>

    <div class="pull-right text-muted">
        <small>{{ $categories->total() }} {{ str_plural('Item', $categories->total()) }}</small>
    </div>

    <nav class="text-center">
        {{ $categories->appends(request()->only(['q']))->links('partials.pagination') }}
    </nav>
@endsection