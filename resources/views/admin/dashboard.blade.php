@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
    @include('partials.breadcrumb')
	@include('partials.alerts')

	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header bg-white">
					<h4 class="card-title">Earnings</h4>
					<p class="card-subtitle">Last 30 Days</p>
				</div>
				<div class="card__options">
					<a href="{{ route('admin.earnings') }}" class="btn btn-sm btn-default">
						<i class="material-icons">trending_up</i>
					</a>
				</div>
				<div class="card-body">
					<div class="chart" id="earnings-month" style="height:200px"></div>
				</div>
			</div>
			<div class="card  table-responsive">
				<div class="card-header bg-white">
					<h4 class="card-title"><i class="material-icons mr-1">receipt</i> Latest Orders</h4>
				</div>
				<div class="card__options">
					<a href="{{ route('admin.orders') }}" class="btn btn-sm btn-default">
						<i class="material-icons">search</i>
					</a>
				</div>
				<table class="table table-middle">
					<tbody>
						@foreach($orders as $order)
						<tr>
							<td class="text-center">
								<i class="material-icons text-{{ $style['status'][$order->status] }} md-18">lens</i>
							</td>
							<td class="text-left">
								<a href="{{ route('admin.invoice', $order->invoice_number) }}">#{{ $order->invoice_number }}</a><br>
								<div class="badge badge-light ">{{ $order->invoice_date }}</div>
							</td>
							
							<td class="text-right">
								฿{{ number_format($order->net_price, 2) }}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header bg-white">
					<div class="media">
						<div class="media-body">
							<h4 class="card-title">Latest Course</h4>
							<p class="card-subtitle">by students</p>
						</div>
						<div class="media-right media-middle">
							<a class="btn btn-sm btn-default" href="{{ route('admin.courses') }}">
								<i class="material-icons">search</i>
							</a>
						</div>
					</div>
				</div>
				<ul class="list-group list-group-fit mb-0">
					@foreach($courses as $course)
					<li class="list-group-item">
						<div class="media">
							<div class="media-body media-middle">
								<a href="{{ route('course.edit', $course->slug) }}">{{ $course->title }}</a>
							</div>
							<div class="media-right media-middle">
								<div class="text-center">
									<span class="badge badge-pill  badge-light ">{{ $course->students->count() }}</span>
								</div>
							</div>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
			<div class="card">
				<div class="card-header bg-white media">
					<div class="media-body media-middle">
						<h4 class="card-title">Latest Users</h4>
					</div>
					<div class="card__options">
						<a href="{{ route('admin.users') }}" class="btn btn-sm btn-default">
							<i class="material-icons">search</i>
						</a>
					</div>
				</div>
				<ul class="list-group list-group-fit mb-0">
					@foreach($users as $user)
					<li class="list-group-item">
						<div class="media">
							<div class="media-left">
								<a href="#">
									<img src="{{ $user->avatar_url }}" alt="Guy" width="40" class="rounded-circle">
								</a>
							</div>
							<div class="media-body">
								<a href="{{ route('user.edit', $user->id) }}">{{ $user->name }}</a>
								<p>
									<small class="text-muted">{{ isset($user->created_at) ? $user->created_at->diffForHumans() : '' }}</small>
								</p>
							</div>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
@endsection


@section('style')
	<link rel="stylesheet" href="{{ asset('learnplus/assets/css/morris.css') }}">
@endsection


@section('script')
	<!-- Theme Colors -->
	<script src="{{ asset('learnplus/assets/js/colors.js') }}"></script>

	<!-- Morris.js charts -->
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
			{{-- range.by('days', function(moment) {
				earnings.push({
					y: moment.format(),
					a: Math.floor(0) + 0
				})
			}) --}}

			@if($earnings->count())
				@foreach ($earnings as $earning)
					earnings.push({
						y: moment('{{ $earning['date'] }}').format('YYYY-MM-DD'),
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
					return moment(date).calendar()
				},
				xLabelFormat: function(date) {
					return moment(date).format('MM/D')
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