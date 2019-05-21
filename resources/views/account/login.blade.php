@extends('layouts.main')
@section('title', 'Login')

@section('content')
    <div class="row">
        <div class="col-sm-8 col-md-6 col-lg-4 mx-auto pt-4">


            <div class="card bg-light">
                <div class="card-header bg-white text-center">
                    <h4 class="card-title">Login</h4>
                    <p class="card-subtitle">Access your account</p>
                </div>
                
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
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
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <button type="submit" class="btn  btn-warning btn-lg btn-block">
                                <span class="btn-block-text"><i class="material-icons btn__icon--left">lock_open</i>Login</span>
                            </button>
                        </div>
                        <div class="form-group ">
                            <a href="{{ route('register') }}" class="btn btn-default btn-block">Register with E-mail</a>
                        </div>
                        {{--  <div class="text-center">
                            <a href="{{ route('password.request') }}"><small>Forgot Password?</small></a>
                        </div>  --}}
                    </form>
                </div>
                
                <div class="card-footer text-center bg-white">

                    <a href="{{ route('facebook.redirect') }}">
                        <button type="submit" class="btn  btn-secondary btn-block">
                            <span class="btn-block-text">Login with Facebook</span>
                        </button>
                    </a>

                </div>
            </div>
        </div>
    </div>

    <hr>
@endsection

