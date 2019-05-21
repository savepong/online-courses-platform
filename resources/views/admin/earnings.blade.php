@extends('layouts.admin')

@section('title', 'Earnings')

@push('breadcrumb')
    <li class="breadcrumb-item active">Earnings</li>
@endpush

@section('content')
    @include('partials.breadcrumb')
    @include('partials.alerts')

    <div class="card card-body">
        <div class="form-group float-md-right">
            <select class="custom-select">
                <option selected>2018</option>
            </select>
        </div>
        <div class="clearfix"></div>
        <div class="chart" id="earnings-month" style="height: 300px;"></div>
    </div>
    <div class="card">
        <div class="card-header bg-white text-center">
            <h5 class="card-title">Total
                <span class="text-success">฿{{ $orders->sum('net_price') }}</span>
            </h5>
        </div>
        <table class="table table-striped table-middle">
            <thead>
                <tr class="text-uppercase small">
                    <th>Course</th>
                    <th class="text-center" style="width:130px">Expense</th>
                    <th class="text-center" style="width:130px">Income</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <td>
                        <div class="media">
                            <div class="media-left">
                                <img src="{{ $course->imagethumb_url }}" alt="" width="80" class="rounded">
                            </div>
                            <div class="media-body media-middle">
                                {{ $course->title }}
                                <div class="text-muted small">{{ $course->orders->count() }} Sales</div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center"><i class="material-icons text-muted-light">remove</i></td>
                    <td class="text-center">฿{{ $course->orders()->where('status', 'paid')->sum('net_price') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('style')
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('learnplus/assets/css/morris.css') }}">
@endsection

@section('script')
    <!-- Theme Colors -->
    <script src="{{ asset('learnplus/assets/js/colors.js') }}"></script>

    <!-- Required by CHART (morrisjs) -->
    <script src="{{ asset('learnplus/assets/vendor/raphael.min.js') }}"></script>
    <script src="{{ asset('learnplus/assets/vendor/morris.min.js') }}"></script>

    <!-- Moment.js -->
	<script src="{{ asset('learnplus/assets/vendor/moment.min.js') }}"></script>
	<script src="{{ asset('learnplus/assets/vendor/moment-range.min.js') }}"></script>

    <!-- Last 30 days earnings chart -->
	<script>
		(function() {
			var earnings = []

			// Create a date range for the last 30 days
			var start = moment().subtract(30, 'days').format('YYYY-MM-DD') // 30 days ago
			var end = moment().format('YYYY-MM-DD') // today
			var range = moment.range(start, end)

			// Create the earnings graph data
			// Iterate the date range and assign a random ($) earnings value for each day
            @if($earnings->count())
                @foreach ($earnings as $earning)
                    earnings.push({
                        y: moment('{{ $earning['monthyear'] }}').format('YYYY-MM'),
                        a: Math.floor({{ $earning['amount'] }})
                    })
                @endforeach
            @else
                earnings.push({
                    y: moment().format('YYYY-MM-DD'),
                    a: Math.floor(0)
                })
            @endif

			new Morris.Area({
				element: 'earnings-month',
				data: earnings,
				xkey: 'y',
				ykeys: ['a'],
				labels: ['Earnings'],
				xLabels: 'day',
				dateFormat: function(date) {
					return moment(date).format('MMM, YYYY')
				},
				xLabelFormat: function(date) {
					return moment(date).format('MMM, YYYY')
				},
				preUnits: '฿',
				lineColors: [colors['chart-primary']],
				fillOpacity: .3,
				pointSize: 3,
				lineWidth: 2,
				gridTextColor: '000',
				resize: true
			})
		})()
	</script>
@endsection