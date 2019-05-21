@extends('layouts.main')

@section('title', 'Edit account')

@push('breadcrumb')
	<li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
	<li class="breadcrumb-item active">Edit Account</li>
@endpush

@section('content')
    @include('partials.breadcrumb')

	<h4 class="page-heading">Edit Account</h4>
	
	{!! Form::model($user, [
			'method' => 'PUT',
			'route' => ['account.edit'],
			'files' => TRUE,
			'id'    => 'user-form'
		]) 
	!!}
	<div class="card">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" href="#profile" data-toggle="tab">Profile</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#billing" data-toggle="tab">Billing</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#password" data-toggle="tab">Password</a>
			</li>
		</ul>

		<div class="tab-content card-body">
			<div class="tab-pane active" id="profile">
				@include('user.form.profile', ['hideRoleDropdown' => true])
			</div>

			<div class="tab-pane active" id="billing">
				@include('user.form.billing', ['hideRoleDropdown' => true])
			</div>

			<div class="tab-pane" id="password">
				@include('user.form.password', ['hideRoleDropdown' => true])
			</div>
		</div>

		<div class="card-footer text-right">
			<a href="{{ route('profile') }}" class="btn btn-default">Cancel</a>
			<button type="submit" class="btn btn-success">{{ $user->exists ? 'Update' : 'Save' }}</button>
		</div>
	</div>
	{!! Form::close() !!}
@endsection