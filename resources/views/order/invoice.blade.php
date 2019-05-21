@extends('layouts.main')
@section('title', 'Invoice')

@push('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('profile') }}">Profile</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('order.index') }}">Billing</a>
    </li>
    <li class="breadcrumb-item active">Invoice</li>
@endpush

@section('content')
    @include('partials.breadcrumb')
    @include('partials.alerts')

    <div class="media align-items-center d-print-none">
        <div class="media-body">
            <h1 class="page-heading h2">Invoice
                <span class="badge badge-{{ $style['status'][$order->status] }}">{{ ucwords($order->status) }}</span>
            </h1>
        </div>
        <div class="media-right">
            @if($order->status == "pending")
                <a href="{{ route('payment.create', $order->invoice_number) }}" class="btn btn-primary">
                    Continue Payment <i class="material-icons ml-1">arrow_forward</i>
                </a>
            @else
                <a href="{{ route('payment.create', $order->invoice_number) }}" class="btn btn-default">
                    <i class="material-icons mr-1">payment</i> View Payment
                </a>
            @endif
        </div>
    </div>
    
    <div id="invoice">
        <div class="card">
            <div class="card-header bg-white">
                <div class="media m-3">
                    <div class="media-left">
                        <img src="{{ asset('images/vcommerce.png') }}" alt="V-Commerce" width="180">
                    </div>
                    <div class="media-body">
                    </div>
                    <div class="media-right media-middle">
                        <strong>Invoice:</strong> #{{ $order->invoice_number }}<br>
                        <strong>Date:</strong> {{ $order->invoice_date }}
                    </div>
                </div>

            </div>
            <div class="card-body">
                
                <strong>Billing To:</strong>
                <br/> {{ $order->billing_to ?: $order->user->name }},
                <br/> {{ $order->billing_address ?: $order->user->email }}, {{ $order->billing_country ?: $order->user->phone_number }}
                    
            </div>
            <table class="table table-fit mb-0">
                <thead>
                    <tr>
                        <th width="20">#</th>
                        <th>Items</th>
                        <th class="text-center">Unit Price</th>
                        <th class="text-center">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    @foreach($order->courses as $course)
                    <tr>
                        <td>{{ $i++ }}.</td>
                        <td>
                            <strong>{{ $course->title }}</strong> <br>
                            {{ gmdate("G", $course->duration) }}hrs.&nbsp;{{ gmdate("i", $course->duration) }}min.
                        </td>
                        <td class="text-center">฿{{ number_format($course->price, 2) }}</td>
                        <td class="text-center">
                            ฿{{ number_format($course->price, 2) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <br>
            <br>
            <br>
            <div class="card-body">
                <div class="row">
                    <div class="offset-md-8 col-md-4 table-responsive">
                        <table class="table">
                        <tr>
                            <td class="text-right"><strong>Sub Total:</strong></td>
                            <td class="text-right">
                                <strong>{{ number_format($order->total_price, 2) }}</strong>
                            </td>
                        </tr>
                        @if($order->discount > 0)
                        <tr>
                            <td class="text-right">
                                Discount:
                                @if(isset($order->coupon))
                                    <br><small class="text-muted">(Coupon code : {{ strtoupper($order->coupon->code) }})</small>
                                @endif
                            </td>
                            <td class="text-right">
                                - {{ number_format($order->discount, 2) }}
                            </td>
                        </tr>
                        @endif
                        {{-- <tr>
                            <td class="text-right"><strong>Subtotal:</strong></td>
                            <td class="text-right">
                                ฿{{ $order->subtotal }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>VAT ({{ $order->vat_percent }}%):</strong></td>
                            <td class="text-right">
                                ฿{{ $order->vat }}
                            </td>
                        </tr> --}}
                        <tr>
                            <td class="text-right"><span class="text-dark h5"><strong>Net Total:</strong></span></td>
                            <td class="text-right">
                                <span class="text-dark h5">
                                    <strong>฿{{ number_format($order->net_price, 2) }}</strong>
                                </span>
                            </td>
                        </tr>
                        </table>
                        
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted text-center">
                <small>บริษัท วีคอมเมิร์ซคลิก จำกัด เลขที่ 10 E ชั้น 10 อาคารเพลสซิเด้น ทาวเวอร์ ถนนเพลินจิต แขวงลุมพินี เขตปทุมวัน กรุงเทพ 10330</small>
            </div>
        </div>
        
        <a href="javascript:window.print()" class="btn btn-default d-print-none pull-right">
            <i class="material-icons btn__icon--left">print</i> Print
        </a>
        

    </div>

@endsection
