@extends('layouts.admin')
@section('title', 'All users')

@push('breadcrumb')
    <li class="breadcrumb-item active">Users</li>
@endpush

@section('content')
    @include('partials.breadcrumb')
    @include('partials.alerts')

    <div class="media align-items-center">
        <div class="media-body">
            <h1 class="page-heading h2">Users</h1>
        </div>
        <div class="media-right">
            <a href="{{ route('user.create') }}" class="btn btn-success">Add
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
                            <a class="nav-link  {{ request('tab')!='' ?: 'active text-white' }}" href="{{ route('admin.users') }}">All</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request('tab')!='student' ?: 'active text-white' }}" href="{{ route('admin.users', ['tab' => 'student']) }}">Student</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request('tab')!='admin' ?: 'active text-white' }}" href="{{ route('admin.users', ['tab' => 'admin']) }}">Admin</a>
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

        <div class="table-responsive">
            <?php $sort = request('sort') ? '' : '&sort=desc'; ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            <a href="{{ url()->current() }}?column=name{{ $sort }}" class="text-dark">Name</a>
                        </th>
                        <th>
                            <a href="{{ url()->current() }}?column=username{{ $sort }}" class="text-dark">username</a>
                        </th>
                        <th>
                            <a href="{{ url()->current() }}?column=email{{ $sort }}" class="text-dark">Email</a>
                        </th>
                        <th class="text-center">
                            <a href="{{ url()->current() }}?column=created_at{{ $sort }}" class="text-dark">Registered</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ $user->avatar_url }}" alt="" width="40" class="rounded-circle">
                                </div>
                                <div class="media-body media-middle">
                                    <a href="{{ route('user.edit', $user->id) }}">{{ $user->name }}</a>
                                    <div class="text-muted small">{{ $user->roles->first()->display_name }}</div>
                                </div>
                            </div>
                            
                        </td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">{{ ($user->created_at) ? $user->created_at->diffForHumans() : '' }}</td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

    <div class="pull-right text-muted">
        <small>{{ $users->total() }} {{ str_plural('User', $users->total()) }}</small>
    </div>

    <nav class="text-center">
        {{ $users->appends(request()->all())->links('partials.pagination') }}
    </nav>
@endsection