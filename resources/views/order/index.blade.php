@extends('layouts.main')
@section('title', 'Billing')

@push('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('profile') }}">Profile</a>
    </li>
    <li class="breadcrumb-item active">Billing</li>
@endpush

@section('content')
    @include('partials.breadcrumb')
    @include('partials.alerts')

    <h4 class="page-heading">Billing</h4>


    {{-- <div class="card card-stats-danger">
        <div class="card-body">
            <div class="media align-items-center">
                <div class="media-body">
                    Please pay your amount due
                    <strong class="text-danger">฿2,500</strong> with invoice <a href="#">#8331</a>
                </div>
                <div class="media-right">
                    <a href="fixed-student-pay.html" class="btn btn-success float-right">Pay Now</a>
                </div>
            </div>
        </div>
    </div> --}}

    @foreach ($orders->where('status', 'pending') as $pending)
        <div class="card card-stats-danger">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="media-body">
                        Please pay your amount due
                        <strong class="text-danger">฿{{ number_format($pending->net_price, 2) }}</strong> with invoice <a href="{{ route('order.show', $pending->invoice_number) }}">#{{ $pending->invoice_number }}</a>
                    </div>
                    <div class="media-right">
                        <a href="{{ route('payment.create', $pending->invoice_number) }}" class="btn btn-primary float-right">Pay Now</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    
    <div class="card table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th >Description</th>
                    <th width="100" class="text-center">Amount</th>
                    <th width="100" class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-sm-4">
                                <p>
                                    <a href="{{ route('order.show', $order->invoice_number) }}">#{{ $order->invoice_number }}</a><br>
                                    <small class="text-muted">{{ $order->invoice_date }}</small>
                                </p>
                            </div>
                            <div class="col-sm-8">
                                @foreach($order->courses as $course)
                                <div class="media row">
                                    <div class="media-left col-sm-6 col-md-4 col-lg-2">
                                        <a href="{{ route('course.view', $course->slug) }}">
                                            <img src="{{ $course->image_thumb_url }}" alt="" width="80" class="rounded">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle col-sm-6 col-md-8 col-lg-8">
                                        <a href="{{ route('course.view', $course->slug) }}" class="text-dark">
                                            {{ $course->title }}
                                        </a>
                                        <div class="text-muted small">฿{{ number_format($course->price) }}</div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        
                    </td>
                    <td class="text-center">
                        ฿{{ number_format($order->net_price, 2) }}
                    </td>
                    <td class="text-center">
                        <span class="badge badge-{{ $style['status'][$order->status] }}">{{ ucwords($order->status) }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection