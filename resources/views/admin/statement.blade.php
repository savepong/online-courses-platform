@extends('layouts.admin')

@section('title', 'Statement')

@push('breadcrumb')
    <li class="breadcrumb-item active">Statement</li>
@endpush

@section('content')
    @include('partials.breadcrumb')
    @include('partials.alerts')
    
    <div class="card">
        <div class="card-header">
            <form action="{{ url()->current() }}" class="row">
                <div class="form-group col-sm-5 mt-2 mt-sm-0 mb-0">
                    <div class="input-group">
                        <span class="input-group-addon bg-light">From</span>
                        {!! Form::date('from', (request('from')) ? request('from') : \Carbon\Carbon::parse('first day of this month'), ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group col-sm-5 mt-2 mt-sm-0 mb-0">
                    <div class="input-group">
                        <span class="input-group-addon bg-light">To</span>
                        {!! Form::date('to', (request('to')) ? request('to') : \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group col-sm-2 mt-2 mt-sm-0 mb-0">
                    <button type="submit" class="btn btn-default btn-block"><i class="material-icons btn__icon--left">search</i> Find</button>
                </div>
            </form>
        </div>

        @if($payments->count())
            <?php $sort = request('sort')=='ASC' ? 'DESC' : 'ASC' ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <a href="{{ url()->current() }}?from={{ request('from') }}&to={{ request('to') }}&column=date&sort={{ $sort }}" class="text-dark">Date</a>
                            </th>
                            <th>
                                Invoice
                            </th>
                            <th>Method</th>
                            <th class="text-right">
                                <a href="{{ url()->current() }}?from={{ request('from') }}&to={{ request('to') }}&column=amount&sort={{ $sort }}" class="text-dark">Amount</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                        <tr>
                            <td>{{ $payment->date }}</td>
                            <td>
                                <a href="{{ route('admin.invoice', $payment->order->invoice_number) }}">#{{ $payment->order->invoice_number }}</a>
                            </td>
                            <td>{{ $payment->method }}</td>
                            <td class="text-right">฿{{ number_format($payment->order->net_price, 2) }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="text-right">Total:</td>
                            <td class="text-right"><strong>฿{{ number_format($totalAmount, 2) }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-default">No record found!</div>
        @endif
    </div>

    <div class="pull-right text-muted">
        <small>{{ $payments->total()}} {{ str_plural('Record', $payments->total()) }}</small>
    </div>

    <nav class="text-center">
        {{ $payments->appends(request()->only(['q']))->links('partials.pagination') }}
    </nav>
@endsection


