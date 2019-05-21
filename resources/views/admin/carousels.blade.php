@extends('layouts.admin')
@section('title', 'Carousels')

@push('breadcrumb')
    <li class="breadcrumb-item active">Carousels</li>
@endpush

@section('content')
    @include('partials.breadcrumb')
    @include('partials.alerts')

    <div class="media align-items-center">
        <div class="media-body">
            <h1 class="page-heading h2">Carousels</h1>
        </div>
        <div class="media-right">
            <a href="{{ route('carousel.create') }}" class="btn btn-success">Add
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

        @if($carousels->count())
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    @foreach($carousels as $carousel)
                    <tr>
                        <td>
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ $carousel->image_thumb_url }}" alt="" width="200" class="rounded">
                                </div>
                                <div class="media-body media-middle">
                                        <a href="{{ route('carousel.edit', $carousel->id) }}">{{ $carousel->title }}</a>
                                    <div class="text-muted small">Updated : {{ $carousel->created_at->diffForHumans() }}</div>
                                </div>
                            </div>
                        </td>
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
        <small>{{ $carousels->total() }} {{ str_plural('Item', $carousels->total()) }}</small>
    </div>

    <nav class="text-center">
        {{ $carousels->appends(request()->only(['q']))->links('partials.pagination') }}
    </nav>
@endsection