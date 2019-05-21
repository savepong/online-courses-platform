@extends('layouts.admin')
@section('title', 'Edit category')


@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.coupons') }}">Coupons</a></li>
    <li class="breadcrumb-item active">Edit Coupon</li>
@endpush

@section('content')
    @include('partials.breadcrumb')

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Edit Coupon</h5>
        </div>
        <div class="card-body">

            {!! Form::model($coupon, [
                    'method' => 'PUT',
                    'route' => ['coupon.update', $coupon->id],
                    'id'    => 'coupon-form'
                ]) 
            !!}

                @include('coupon.form')

            {!! Form::close() !!}
        
        </div>
    </div>
@endsection

@section('modals')
<div class="modal fade" id="modalDeleteCoupon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        {!! Form::open(['method' => 'DELETE', 'route' => ['coupon.destroy', $coupon->id] ]) !!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure to delete this coupon?</p>
                <p><strong>{{ $coupon->code }}</strong></p>
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
