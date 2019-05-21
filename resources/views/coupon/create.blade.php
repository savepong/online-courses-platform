@extends('layouts.admin')
@section('title', 'Add Coupon')

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.coupons') }}">Coupons</a></li>
    <li class="breadcrumb-item active">Add new Coupon</li>
@endpush

@section('content')
    @include('partials.breadcrumb')

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add new Coupon</h5>
        </div>
        <div class="card-body">

            {!! Form::model($coupon, [
                    'method' => 'POST',
                    'route' => 'coupon.store',
                    'id'    => 'coupon-form'
                ]) 
            !!}
                @include('coupon.form')
                
            {!! Form::close() !!}
        
        </div>
    </div>
@endsection