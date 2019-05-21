@extends('layouts.admin')
@section('title', 'Edit Carousel')

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.carousels') }}">Carousels</a></li>
    <li class="breadcrumb-item active">Edit Carousel</li>
@endpush

@section('content')
    @include('partials.breadcrumb')

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Edit Carousel</h5>
        </div>
        
        {!! Form::model($carousel, [
                'method' => 'PUT',
                'route' => ['carousel.update', $carousel->id],
                'files' => TRUE,
                'id'    => 'carousel-form'
            ]) 
        !!}

            @include('carousel.form')
        
        {!! Form::close() !!}
    </div>
@endsection

@section('modals')
<div class="modal fade" id="modalDeleteCarousel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        {!! Form::open(['method' => 'DELETE', 'route' => ['carousel.destroy', $carousel->id] ]) !!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>You have specified this user for deletion?</p>
                <p><strong>{{ $carousel->title }}</strong></p>
            </div>
            <div class="modal-footer text-right">
                <a href="#" class="btn btn-default" data-dismiss="modal">Cancel</a>
                <button type="submit" class="btn btn-danger">Confirm Deletion</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection

@include('carousel.custom')