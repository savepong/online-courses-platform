@extends('layouts.admin')

@section('title', 'All Orders')

@push('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.orders') }}">Billing</a>
    </li>
    <li class="breadcrumb-item active">Invoice</li>
@endpush

@section('content')
    @include('partials.breadcrumb')
    @include('partials.alerts')

    <a href="{{ route('admin.orders') }} " class="btn btn-white">
        <i class="material-icons mr-1">arrow_back</i> Back to orders
    </a>

    <h4 class="page-heading">
        Invoice <strong>#{{ $order->invoice_number }}</strong> 
        <span class="badge badge-{{ $style['status'][$order->status] }}">{{ ucwords($order->status) }}</span>
    </h4>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <strong>Ordered By</strong>
                    <br/> {{ $order->user->name }}
                    <br> {{ $order->user->email }}
                    <br> {{ $order->user->phone_number }}
                </div>

                <div class="col-4">
                    <strong>Billing To:</strong>
                    <br/> {{ $order->billing_to }}
                    <br/> {{ $order->billing_address }}, {{ $order->country }}
                </div>
                
                <div class="col-4">
                    <strong>Invoice Date</strong>
                    <br/> {{ $order->invoice_date }}
                </div>
            </div>
        </div>

        <br>
        <div class="table-responsive">
            <table class="table table-fit mb-0">
                <thead>
                    <tr>
                        <th width="20">#</th>
                        <th>Description</th>
                        <th class="text-center">Duration</th>
                        <th class="text-center">Unit Price</th>
                        <th class="text-center">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    @foreach($order->courses as $course)
                    <tr>
                        <td>{{ $i++ }}.</td>
                        <td>{{ $course->title }}</td>
                        <td class="text-center">{{ $course->duration }}</td>
                        <td class="text-center">฿{{ number_format($course->price) }}</td>
                        <td class="text-center">
                            ฿{{ number_format($course->price) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="card-footer text-center">
                <div class="row">
                    <div class="col-4">
                        <strong>Subtotal:</strong>
                        <br>฿{{ number_format($order->total_price,2) }}
                    </div>
                    <div class="col-4">
                        <strong>Discount:</strong>
                        <br>฿{{ number_format($order->discount,2) }}
                        @if(isset($order->coupon))
                            <br><small class="text-muted">(Coupon code : {{ strtoupper($order->coupon->code) }})</small>
                        @endif
                    </div>

                    {{-- <div class="col-4">
                        <strong>VAT ({{ $order->vat_percent }}%):</strong>
                        <br>฿{{ $order->vat }}
                    </div> --}}
                    
                    <div class="col-4">
                        <strong>Total:</strong>
                        <br>
                        <span class="strong">
                            <strong>฿{{ number_format($order->net_price, 2) }}</strong>
                        </span>
                    </div>
                </div>
            </div>
        </div>


    </div>

    
    <h4 class="page-heading">Payment history</h4>
    @foreach($order->payments as $payment)
        {!! Form::open([
            'method' => 'POST',
            'route' => ['payment.approve', $payment->id],
            'files' => TRUE ])
        !!}
        <div class="card">
            <div class="card-header text-center">
                <h4 class="card-title">
                    {{ $payment->datetime }}
                    <span class="pull-right badge badge-{{ $style['status'][$payment->status] }}">{{ ucwords($payment->status) }}</span>
                </h4>
            </div>
            <div class="card-body"> 
                
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Method</label>
                    <div class="col-sm-6 col-md-6">
                        <input class="form-control" value="{{ $payment->method }}" disabled></input>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Amount</label>
                    <div class="col-sm-6 col-md-6">
                        <div class="input-group">
                            <input class="form-control" value="{{ number_format($payment->amount, 2) }}" disabled></input>
                            <span class="input-group-addon" id="basic-addon1">฿</span>
                        </div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Date/Time</label>
                    <div class="col-sm-6 col-md-6">
                        <input class="form-control" value="{{ $payment->date }} {{ $payment->time }}" disabled></input>
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Receipt</label>
                    <div class="col-sm-6 col-md-6">
                        <img class="img-fluid" src="{{ $payment->receipt_url }}" alt="{{ $payment->method }}">
                    </div>
                </div>

            </div>

            <div class="card-footer text-center">
                <button type="submit" class="btn btn-success" {{ (empty($payment->approved_at)) ?: 'disabled' }}>Approve</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modelCancelPayment">Cancel</button>
            </div>
        </div>
        {!! Form::close() !!}
    @endforeach

    
@endsection

@section('modals')
    <div class="modal fade" id="modelCancelPayment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            {!! Form::open(['method' => 'POST', 'route' => ['payment.cancel', $payment->id] ]) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Cancel Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label class="form-control-label" for="memo">What wrong?</label>
                    {!! Form::textarea('memo', null, ['class' => 'form-control','rows' => '4', 'placeholder' => 'Tell user about the problem.']) !!}
                </div>
                <div class="modal-footer text-right">
                    <button type="submit" class="btn btn-danger">Cancel Payment</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection