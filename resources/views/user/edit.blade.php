@extends('layouts.admin')
@section('title', 'Edit user')

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Users</a></li>
    <li class="breadcrumb-item active">Edit user</li>
@endpush

@section('content')
    @include('partials.breadcrumb')

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Edit User</h5>
        </div>
        <div class="card-body">
            {!! Form::model($user, [
                    'method' => 'PUT',
                    'route' => ['user.update', $user->id],
                    'files' => TRUE,
                    'id'    => 'user-form'
                ]) 
            !!}
                @include('user.form.profile')
                @include('user.form.billing')
                @include('user.form.password')

                <div class="form-group row">
                    <div class="col-sm-6 offset-sm-3">
                        <div class="media">
                            <div class="media-left">
                                <button type="submit" class="btn btn-success">{{ $user->exists ? 'Update' : 'Save' }}</button>
                                <a href="{{ route('admin.users') }}" class="btn btn-default">Cancel</a> 
                                @if($user->exists && ($user->id != config('cms.default_user_id') || request()->user()->id != $user->id))
                                    <a href="#" class="btn btn-default text-danger" data-toggle="modal" data-target="#modalDeleteUser"><i class="fa fa-trash mr-1"></i> Delete</a>
                                @endif
                            </div>
                        </div>
                        
                    </div>
                </div>
            
            {!! Form::close() !!}
        
        </div>
    </div>
@endsection

@section('modals')
<div class="modal fade" id="modalDeleteUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        {!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id] ]) !!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>You have specified this user for deletion?</p>
                <p><strong>{{ $user->name }}</strong></p>
                <p>What should be done with content own by this user?</p>
                <p>
                    <input type="radio" name="delete_option" value="delete" checked> Delete all content.
                </p>
                <p>
                    <input type="radio" name="delete_option" value="attribute"> Attribute content to
                    {!! Form::select('selected_user', $users, null,['class' => 'form-control']) !!}
                </p>
            </div>
            <div class="modal-footer text-right">
                <a href="#" class="btn btn-default" data-dismiss="modal">Cancel</a>
                <button type="submit" class="btn btn-danger">Confirm Deletion</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection