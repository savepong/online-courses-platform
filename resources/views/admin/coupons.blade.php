@extends('layouts.admin')
@section('title', 'Coupons')

@push('breadcrumb')	
    <li class="breadcrumb-item active">Coupons</li>
@endpush

@section('content')
    @include('partials.breadcrumb')

    @include('partials.alerts')

    <div class="media align-items-center">
        <div class="media-body">
            <h1 class="page-heading h2">Coupons</h1>
        </div>
        <div class="media-right">
            <a href="{{ route('coupon.create') }}" class="btn btn-success">Add
                <i class="material-icons btn__icon--right">add</i>
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <ul class="nav nav-pills ">
                        <li class="nav-item">
                            <a class="nav-link {{ request('tab')!='' ?: 'active text-white' }}" href="{{ route('admin.coupons') }}">Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request('tab')!='expired' ?: 'active text-white' }}" href="{{ route('admin.coupons', ['tab' => 'expired']) }}">Expired</a>
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
        @if($coupons->count())
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <a href="{{ url()->current() }}?column=code&sort={{ $sort }}" class="text-dark">Coupon Code</a>
                        </th>
                        <th class="text-center">
                            <a href="{{ url()->current() }}?column=discount&sort={{ $sort }}" class="text-dark">Amount</a>
                        </th>
                        <th class="text-center">Used</th>
                        <th class="text-center">
                            <a href="{{ url()->current() }}?column=discount&sort={{ $sort }}" class="text-dark">Expire Date</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coupons as $coupon)
                    <tr>
                        <td>
                            <a href="{{ route('coupon.edit', $coupon->id) }}">{{ strtoupper($coupon->code) }}</a>
                        </td>
                        <td class="text-center">
                            @if($coupon->type == 'price')
                                ฿{{ number_format($coupon->discount) }}
                            @else
                                {{ $coupon->discount }}%
                            @endif
                        </td>
                        <td class="text-center">{{ $coupon->users->count() }}</td>
                        <td class="text-center">{{ $coupon->expire }}</td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        @else
            <div class="alert alert-default">No record found!</div>
        @endif
    </div>

    <div class="pull-right text-muted">
        <small>{{ $coupons->total() }} {{ str_plural('Item', $coupons->total()) }}</small>
    </div>

    <nav class="text-center">
        {{ $coupons->appends(request()->only(['q']))->links('partials.pagination') }}
    </nav>
@endsection