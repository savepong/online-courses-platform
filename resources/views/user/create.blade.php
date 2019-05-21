@extends('layouts.admin')
@section('title', 'Add user')

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Users</a></li>
    <li class="breadcrumb-item active">Add User</li>
@endpush

@section('content')
    @include('partials.breadcrumb')

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add User</h5>
        </div>
        <div class="card-body">
            {!! Form::model($user, [
                    'method' => 'POST',
                    'route' => 'user.store',
                    'files' => TRUE,
                    'id'    => 'user-form'
                ]) 
            !!}
                @include('user.form.profile')
                @include('user.form.billing')
                @include('user.form.password')

                <div class="form-group row">
                        <div class="col-sm-8 offset-sm-3">
                            <div class="media">
                                <div class="media-left">
                                    <button type="submit" class="btn btn-success">{{ $user->exists ? 'Update' : 'Save' }}</button>
                                    <a href="{{ route('user.index') }}" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
            
            {!! Form::close() !!}
        
        </div>

    </div>
@endsection