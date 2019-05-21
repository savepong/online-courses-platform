<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title') | {{ config('app.name') }}</title>

	<!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
	<meta name="robots" content="noindex">

	<!-- Simplebar -->
	<link type="text/css" href="{{ asset('learnplus/assets/vendor/simplebar.css') }}" rel="stylesheet">

	<!-- Material Design Icons  -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Roboto Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">

	<!-- MDK -->
	<link type="text/css" href="{{ asset('learnplus/assets/vendor/material-design-kit.css') }}" rel="stylesheet">

	<!-- Sidebar Collapse -->
	<link type="text/css" href="{{ asset('learnplus/assets/vendor/sidebar-collapse.min.css') }}" rel="stylesheet">

	<!-- App CSS -->
	<link type="text/css" href="{{ asset('learnplus/assets/css/style.css') }}" rel="stylesheet">

	<!-- Vendor CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/fontawesome/4.5.0/css/font-awesome.min.css">

	<!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('images/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

	<style>
		.bg-vcommerce{
			background-color: #FFD600;
		}
		.logo-vcommerce{
			color: #FFD600;
		}
	</style>

	@yield('style')
	
</head>

<body class="ls-top-navbar">

	<div class="d-flex flex-column h-100">
		
		<!-- Navbar -->
		<nav class="navbar navbar-expand navbar-dark bg-dark m-0 fixed-top">
			@include('partials.navbar', ['themeAdmin' => true])
		</nav>
		<!-- // END Navbar -->

		<div class="mdk-drawer-layout js-mdk-drawer-layout flex" data-fullbleed data-push data-has-scrolling-region>
			<div class="mdk-drawer-layout__content mdk-drawer-layout__content--scrollable">
				<div class="container-fluid">

					@yield('content')

				</div>
			</div>

			<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
				<div class="mdk-drawer__content ">
					<div class="sidebar sidebar-left sidebar-light sidebar-transparent-sm-up o-hidden">
						<div class="sidebar-p-y" data-simplebar data-simplebar-force-enabled="true">
							
							<div class="sidebar-heading">DASHBOARD</div>
							<ul class="sidebar-menu">
								@if(hasRoles(['admin', 'editor']))
								<li class="sidebar-menu-item {{ isActive('admin.dashboard') }}">
										<a class="sidebar-menu-button" href="{{ route('admin.dashboard') }}">
										<i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dashboard</i> Dashboard
									</a>
								</li>
								@endif

								@if(hasRoles(['admin']))
								<li class="sidebar-menu-item {{ isActive(['admin.orders']) }}">
									<a class="sidebar-menu-button" href="{{ route('admin.orders') }}">
										<i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">monetization_on</i> Billing
										<span class="sidebar-menu-badge badge badge-warning ml-auto">{{ $countPendingOrders }}</span>
									</a>
								</li>
								<li class="sidebar-menu-item {{ isActive(['admin.users','user.edit']) }}">
									<a class="sidebar-menu-button" href="{{ route('admin.users') }}">
										<i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">people</i> Users
										<span class="sidebar-menu-badge badge badge-default ml-auto">{{ $countUsers }}</span>
									</a>
								</li>
								@endif
							</ul>
							<br>
							

							@if(hasRoles(['admin', 'editor', 'author']))
							<div class="sidebar-heading">COURSES</div>
							<ul class="sidebar-menu">
								<li class="sidebar-menu-item {{ isActive(['admin.courses', 'course.edit' ,'course.students']) }}">
									<a class="sidebar-menu-button" href="{{ route('admin.courses') }}">
										<i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">class</i> Courses
										<span class="sidebar-menu-badge badge badge-default ml-auto">{{ $countCourses }}</span>
									</a>
								</li>
								@if(hasRoles(['admin', 'editor']))
								<li class="sidebar-menu-item {{ isActive(['admin.categories','category.edit']) }}">
									<a class="sidebar-menu-button" href="{{ route('admin.categories') }}">
										<i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">folder</i> Categories
									</a>
								</li>
								@endif
							</ul>
							<br>
							@endif


							@if(hasRoles(['admin']))						
							<div class="sidebar-heading">Site Management</div>
							<ul class="sidebar-menu">
								<li class="sidebar-menu-item {{ isActive('admin.posts') }}">
									<a class="sidebar-menu-button" href="{{ route('admin.posts') }}">
										<i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">photo_library</i> Posts
										<span class="sidebar-menu-badge badge badge-default ml-auto">{{ $countPosts }}</span>
									</a>
								</li>
								
								<li class="sidebar-menu-item {{ isActive('admin.coupons') }}">
									<a class="sidebar-menu-button" href="{{ route('admin.coupons') }}">
										<i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">loyalty</i> Coupons
									</a>
								</li>
								
								<li class="sidebar-menu-item {{ isActive('admin.carousels') }}">
									<a class="sidebar-menu-button" href="{{ route('admin.carousels') }}">
										<i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">photo_library</i> Carousels
									</a>
								</li>
							</ul>
							<br>

							<div class="sidebar-heading">Reports</div>
							<ul class="sidebar-menu">
								
								<li class="sidebar-menu-item {{ isActive('admin.earnings') }}">
									<a class="sidebar-menu-button" href="{{ route('admin.earnings') }}">
										<i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">trending_up</i> Earnings
									</a>
								</li>
								
								<li class="sidebar-menu-item {{ isActive('admin.statement') }}">
									<a class="sidebar-menu-button" href="{{ route('admin.statement') }}">
										<i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">receipt</i> Statement
									</a>
								</li>
							</ul>
							<br>
							@endif

							
						</div>
						<div class="sidebar-p-y">
							<div class="sidebar-heading"><a href="{{ route('admin.changelog') }}" class="small text-muted">Version : {{ config('project.version') }}</a></div>
						</div>
					</div>
				</div>
			</div>


		</div>

		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			{{ csrf_field() }}
		</form>
	</div>

	<!-- jQuery -->
	<script src="{{ asset('learnplus/assets/vendor/jquery.min.js') }}"></script>

	<!-- Bootstrap -->
	<script src="{{ asset('learnplus/assets/vendor/popper.min.js') }}"></script>
	<script src="{{ asset('learnplus/assets/vendor/bootstrap.min.js') }}"></script>

	<!-- Simplebar -->
	<!-- Used for adding a custom scrollbar to the drawer -->
	<script src="{{ asset('learnplus/assets/vendor/simplebar.js') }}"></script>

	<!-- MDK -->
	<script src="{{ asset('learnplus/assets/vendor/dom-factory.js') }}"></script>
	<script src="{{ asset('learnplus/assets/vendor/material-design-kit.js') }}"></script>

	<!-- Sidebar Collapse -->
	<script src="{{ asset('learnplus/assets/vendor/sidebar-collapse.js') }}"></script>

	<!-- App JS -->
	<script src="{{ asset('learnplus/assets/js/main.js') }}"></script>

	@yield('modals')

	@yield('script')

</body>

</html>