@extends('layouts.admin')
@section('title', 'Add Carousel')

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.carousels') }}">Carousels</a></li>
    <li class="breadcrumb-item active">Add new Carousel</li>
@endpush

@section('content')
    @include('partials.breadcrumb')

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add new Carousel</h5>
        </div>
        {!! Form::model($carousel, [
                'method' => 'POST',
                'route' => 'carousel.store',
                'files' => TRUE,
                'id'    => 'carousel-form',
            ]) 
        !!}
        
            @include('carousel.form')
        
        {!! Form::close() !!}
    </div>
@endsection


@include('carousel.custom')