@extends('layouts.main')
@section('title', 'Login')

@section('content')
    <div class="row">
        <div class="col-sm-8 col-md-6 col-lg-4 mx-auto pt-4">


            <div class="card bg-light">
                <div class="card-header bg-white text-center">
                    <h4 class="card-title">Register</h4>
                    <p class="card-subtitle">Create an account</p>
                </div>
                
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input type="name" class="form-control" placeholder="Fullname" name="name" aria-describedby="nameHelp" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <small id="nameHelp" class="form-text text-danger">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" placeholder="Email Address" name="email" aria-describedby="emailHelp" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <small id="emailHelp" class="form-text text-danger">{{ $errors->first('email') }}</small>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" placeholder="Password" name="password" aria-describedby="passwordHelp" required>

                            @if ($errors->has('password'))
                                <small id="passwordHelp" class="form-text text-danger">{{ $errors->first('password') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                        </div>

                        <div class="form-group ">
                            <button type="submit" class="btn  btn-warning btn-block btn-lg">
                                <span class="btn-block-text">Register</span>
                            </button>
                        </div>

                        <div class="form-group ">
                            <a href="{{ route('login') }}" class="btn btn-default btn-block"><i class="material-icons btn__icon--left">arrow_back</i> Back to Login</a>
                        </div>

                        {{--  <div class="text-center">
                            <a href="{{ route('password.request') }}"><small>Forgot Password?</small></a>
                        </div>  --}}
                    </form>
                </div>
                
                <div class="card-footer text-center bg-white">

                    <a href="{{ route('facebook.redirect') }}">
                        <button type="submit" class="btn  btn-secondary btn-block">
                            <span class="btn-block-text">Register with Facebook</span>
                        </button>
                    </a>

                </div>
            </div>
        </div>
    </div>

    <hr>
@endsection

