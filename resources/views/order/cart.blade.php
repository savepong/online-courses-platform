@extends('layouts.main')
@section('title', 'Invoice')

@push('breadcrumb')
    <li class="breadcrumb-item active">Invoice</li>
@endpush

@section('content')
    @include('partials.breadcrumb')
    @include('partials.alerts')

    <div class="page-heading">
        <a href="{{ route('courses.index') }}" class="btn btn-white">Back to Courses</a>
    </div>
    <div class="card table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Details</th>
                    <th width="100" class="text-center">Qty</th>
                    <th width="100" class="right">Total</th>
                    <th width="10"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="media">
                            <div class="media-left d-none d-md-block">
                                <img src="assets/images/nodejs.png" alt="" width="80" class="rounded">
                            </div>
                            <div class="media-body media-middle">
                                <p class="mb-0">
                                    <a href="#">Node JS Course</a>
                                </p>
                                <small class="text-muted">Duration: 5 days</small>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">1</td>
                    <td class="right">$25.00</td>
                    <td class="text-center">
                        <a href="#" class="text-muted">
                            <i class="material-icons md-18">close</i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="media">
                            <div class="media-left d-none d-md-block">
                                <img src="assets/images/gulp.png" alt="" width="80" class="rounded">
                            </div>
                            <div class="media-body media-middle">
                                <p class="mb-0">
                                    <a href="#">Gulp Full Course</a>
                                </p>
                                <small class="text-muted">Duration: 10 days</small>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">1</td>
                    <td class="right">$15.00</td>
                    <td class="text-center">
                        <a href="#" class="text-muted">
                            <i class="material-icons md-18">close</i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 offset-md-8 text-md-right">
                    <div class="row">
                        <div class="col-6">
                            <strong>Subtotal</strong>
                        </div>
                        <div class="col-6 text-right">
                            $40.00
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <strong>Discount</strong>
                        </div>
                        <div class="col-6 text-right">
                            <span class="text-danger">20%</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <strong>Total</strong>
                        </div>
                        <div class="col-6 text-right">
                            $32.00
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right bg-white">
            <a href="student-pay.html" class="btn btn-primary">
                Pay Now
                <i class="material-icons btn__icon--right">credit_card</i>
            </a>
        </div>
    </div>
@endsection