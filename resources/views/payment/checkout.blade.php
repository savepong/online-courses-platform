@extends('layouts.main') 
@section('title', 'Checkout') 

@push('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('courses.index') }}">All Courses</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('course.view', $course->slug) }}">{{ $course->title }}</a>
    </li>
    <li class="breadcrumb-item active">Checkout</li>
@endpush 

@section('content') 
    @include('partials.breadcrumb') 
    @include('partials.alerts')

    <h4 class="page-heading text-center">Checkout</h4>
    <div class="row">
        <div class="col-md-6 offset-md-3">

            <div class="card">
                <div class="card-header bg-white">
                    <div class="media">
                        <div class="media-left media-middle">
                            <a href="{{ route('course.view', $course->slug) }}">
                                <img src="{{ $course->image_thumb_url }}" alt="Card image cap" width="100" class="rounded">
                            </a>
                        </div>
                        <div class="media-body media-middle">
                            <h4 class="card-title">
                                <a href="{{ route('course.view', $course->slug) }}">{{ $course->title }}</a>
                                <p class="small text-muted">{{ $course->author->name }}</p>
                            </h4>
                        </div>
                        <div class="media-right media-middle">
                            <h5 class="text-primary">
                                <strong>฿{{ number_format($net_price, 2) }}</strong>
                            </h5>
                            @if($net_price < $course->price)
                                <p class="text-muted">
                                    <s>฿{{ number_format($course->price, 2) }}</s>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {!! 
            Form::open([
                'method' => 'POST',
                'route' => 'order.checkout',
                'files' => TRUE
            ])
            !!}

            <div class="card">
                <div class="card-body">
                    
                    @include('payment.form')

                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-success">Confirm Payment</button>
                </div>
            </div>

            {!! Form::hidden('coupon', request('coupon')) !!}
            {!! Form::hidden('course_id', $course->id) !!}
            {!! Form::close() !!}
        </div>
    </div>

    <hr> 
@endsection 


@include('payment.custom')