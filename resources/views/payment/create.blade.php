@extends('layouts.main')
@section('title', 'Make Payment')

@push('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('profile') }}">Profile</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('order.index') }}">Billing</a>
    </li>
    <li class="breadcrumb-item active">Payment</li>
@endpush

@section('content') 
    @include('partials.breadcrumb') 

    
    
    <div class="row">
        <div class="col-lg-6 offset-lg-3">

            <div class="card">
                <div class="card-header bg-white">
                    Invoice <a href="{{ route('order.show', $order->invoice_number) }}">#{{ $order->invoice_number }}</a><br>
                    <small class="text-muted">{{ $order->invoice_date }}</small>
                </div>
                
                <div class="card__options">
                    <h4 class="card-title text-center">
                        ฿{{ number_format($order->net_price, 2) }}
                        @if($order->net_price < $order->total_price)
                            <br>
                            <small class="text-muted">
                                <s>฿{{ number_format($order->total_price, 2) }}</s>
                            </small>
                        @endif
                    </h4>
                    
                </div>

                <div class="card-body">
                    @foreach($order->courses as $course)
                    <div class="media">
                        <div class="media-left">
                            <a href="{{ route('course.view', $course->slug) }}">
                                <img src="{{ $course->image_thumb_url }}" alt="" width="80" class="rounded">
                            </a>
                        </div>
                        <div class="media-body media-middle">
                            <a href="{{ route('course.view', $course->slug) }}" class="text-dark">
                                {{ $course->title }}
                            </a>
                            <div class="text-muted small">฿{{ number_format($course->price) }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            

            @if($order->status != "paid" && $order->payments()->where(['approved_at' => null, 'cancelled_at' => null])->count() == 0)
            {!! 
            Form::open([
                'method' => 'POST',
                'route' => ['payment.store', $order->id],
                'files' => TRUE
            ])
            !!}
            <h4 class="page-heading text-center">Make Payment</h4>
            <div class="card">
                <div class="card-body">
                    
                    @include('payment.form')

                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-success">Confirm Payment</button>
                </div>
            </div>
            {!! Form::hidden('order_id', $order->id) !!}
            {!! Form::close() !!}
            @endif



            <h4 class="page-heading text-center">Payment history</h4>
            <div id="accordion" role="tablist" aria-multiselectable="true">
                @foreach($order->payments()->latest()->get() as $payment)
                <div class="card">
                    <div class="card-header" role="tab" id="heading{{ $payment->id }}">
                        <span class="mb-0">
                            <a class="text-dark" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $payment->id }}" aria-expanded="true" aria-controls="collapse{{ $payment->id }}">
                                {{ $payment->datetime }}
                            </a>
                            <span class="pull-right badge badge-{{ $style['status'][$payment->status] }}">{{ ucwords($payment->status) }}</span>
                        </span>
                    </div>

                    <div id="collapse{{ $payment->id }}" class="collapse {{ $payment->status!="pending" ?: 'show' }}" role="tabpanel" aria-labelledby="heading{{ $payment->id }}">
                        <div class="card-body">
                            
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Method</label>
                                <div class="col-sm-9 col-lg-6">
                                    <input class="form-control" value="{{ $payment->method }}" disabled>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Amount</label>
                                <div class="col-sm-9 col-lg-6">
                                    <div class="input-group">
                                        <input class="form-control" value="{{ number_format($payment->amount, 2) }}" disabled>
                                        <span class="input-group-addon" id="basic-addon1">฿</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Date/Time</label>
                                <div class="col-sm-9 col-lg-6">
                                    <input class="form-control" value="{{ $payment->date }} {{ $payment->time }}" disabled>
                                </div>
                            </div>
                            
                            
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Receipt</label>
                                <div class="col-sm-9 col-lg-6">
                                    <img class="img-fluid" src="{{ $payment->receipt_url }}" alt="{{ $payment->method }}">
                                </div>
                            </div>

                            @if($payment->memo != '')
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Memo</label>
                                <div class="col-sm-9 col-lg-6">
                                    <textarea class="form-control text-danger" disabled>{{ $payment->memo }}</textarea>
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
                @endforeach
                
                
            </div>
        
            

        </div>
    </div>
@endsection

@include('payment.custom')