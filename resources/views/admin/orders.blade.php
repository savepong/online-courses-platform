@extends('layouts.admin')

@section('title', 'Billing')

@push('breadcrumb')
    <li class="breadcrumb-item active">Billing</li>
@endpush

@section('content')
    @include('partials.breadcrumb')

    <div class="media align-items-center">
        <div class="media-body">
            <h1 class="page-heading h2">Billing</h1>
        </div>
    </div>

    @include('partials.alerts')
    
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <ul class="nav nav-pills ">
                        <li class="nav-item">
                            <a class="nav-link  {{ request('tab')!='' ?: 'active text-white' }}" href="{{ route('admin.orders') }}">Pending <span class="badge badge-warning">{{ $countPendingOrders }}</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request('tab')!='approved' ?: 'active text-white' }}" href="{{ route('admin.orders', ['tab' => 'approved']) }}">Approved</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request('tab')!='cancelled' ?: 'active text-white' }}" href="{{ route('admin.orders', ['tab' => 'cancelled']) }}">Cancelled</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <form action="{{ url()->current() }}">
                    <div class="form-group mt-2 mt-sm-0 mb-0">
                        <div class="input-group ">
                            <input name="q" class="form-control" type="text" value="{{ request('q') }}" placeholder="Search.."/>
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="material-icons">search</i></button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <?php $sort = request('sort')=='ASC' ? 'DESC' : 'ASC' ?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <a href="{{ url()->current() }}?column=invoice_number&sort={{ $sort }}" class="text-dark">Invoice#</a>
                        </th>
                        <th>
                            Ordered by
                        </th>
                        <th class="text-right">
                            <a href="{{ url()->current() }}?column=net_price&sort={{ $sort }}" class="text-dark">Amount</a>
                        </th>
                        <th class="text-center">
                            <a href="{{ url()->current() }}?column=status&sort={{ $sort }}" class="text-dark">Status</a>
                        </th>
                        <th class="text-center">Payment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>
                            <a href="{{ route('admin.invoice', $order->invoice_number) }}">#{{ $order->invoice_number }}</a><br>
                            <small class="text-muted">{{ $order->created_at }}</small>
                        </td>
                        <td>{{ $order->user->name }}</td>
                        <td class="text-right">฿{{ number_format($order->net_price, 2) }}</td>
                        <td class="text-center">
                            <span class="badge badge-{{ $style['status'][$order->status] }}">{{ $order->status }}</span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.invoice', $order->invoice_number) }}" class="btn btn-default btn-sm">View Payment</a>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

    <div class="pull-right text-muted">
        <small>{{ $orders->total()}} {{ str_plural('Order', $orders->total()) }}</small>
    </div>

    <nav class="text-center">
        {{ $orders->appends(request()->only(['q']))->links('partials.pagination') }}
    </nav>
@endsection