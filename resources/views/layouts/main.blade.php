<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | {{ config('app.name') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
    <meta name="robots" content="noindex">

    <!-- Simplebar -->
    <link type="text/css" href="{{ asset('learnplus/assets/vendor/simplebar.css') }}" rel="stylesheet">

    <!-- Material Design Icons  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Roboto Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en"
        rel="stylesheet">
    <link rel='stylesheet' id='wpb-google-fonts-css'  href='https://fonts.googleapis.com/css?family=Prompt:200,400' type='text/css' media='all' />

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
        h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .lead{
            font-family: Prompt
        }
        .ls-top-navbar{
            padding-top: 56px;
        }
    </style>

    @yield('style')

</head>

<body class="ls-top-navbar">

    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-dark bg-secondary m-0 fixed-top d-print-none">
        <div class="container">
            @include('partials.navbar')
        </div>
    </nav>
    <!-- // END Navbar -->
    


    <!-- Search -->
    <form class="d-block d-sm-none m-0" action="{{ route('courses.index') }}">
        <div class="input-group">
            <span class="input-group-btn">
                <button class="btn btn-default rounded-0" type="submit">
                    <i class="material-icons">search</i>
                </button>
            </span>
            <input type="text" name="q" class="form-control rounded-0" placeholder="Search course">
        </div>
    </form>


    <!-- Header -->
    @yield('header')

    
    <!-- Content -->
    <div class="container pt-3">
 
        @yield('content')

        <div class="footer d-print-none">
            <span class="small">Copyright &copy; {{ date('Y') }} - <a href="{{ config('project.website.url') }}">{{ config('project.website.domain') }}</a> All rights reserved.<span>
            <br>
            <span class="small text-muted">{{ config('project.version') }} | ({{ config('app.timezone') }}) {{ now() }}</span>
        </div>
    </div>


    <div class="mdk-drawer js-mdk-drawer" id="default-drawer">
        <div class="mdk-drawer__content ls-top-navbar-xs-up">
            <div class="sidebar sidebar-left sidebar-light bg-white o-hidden">
                <div class="sidebar-p-y" data-simplebar data-simplebar-force-enabled="true">

                    <div class="sidebar-heading">COURSES</div>
                    <ul class="sidebar-menu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ route('courses.index') }}">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">search</i> Browse
                            </a>
                        </li>

                        @auth
                        @if(hasRoles(['admin', 'editor', 'author']))
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ route('admin.dashboard') }}">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dashboard</i> Dashboard
                            </a>
                        </li> 
                        @endif
                        @endauth
                        
                    </ul>
                    <br>
                    
                    {{--  <div class="sidebar-heading">Billing</div>
                    <ul class="sidebar-menu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ url('billing') }}">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">monetization_on</i> Billing
                                <span class="sidebar-menu-badge badge badge-default ml-auto">$25</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ url('confirm-payment') }}">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">payment</i> Confirm payment
                                
                            </a>
                        </li>
                    </ul>
                    <br>  --}}
                    
                    
                    <div class="sidebar-heading">Account</div>
                    <ul class="sidebar-menu">
                        @guest
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{ route('login') }}">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">person</i> Login/Register
                                </a>
                            </li>
                        @else
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{ route('profile') }}">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">person</i> Profile
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{ route('order.index') }}">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">monetization_on</i> My Billing
                                    <span class="sidebar-menu-badge badge badge-default ml-auto"></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{ route('account.edit') }}">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">account_box</i> Edit Account
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">lock_open</i> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endguest
                    </ul>
                    <!-- // END Components Menu -->
                </div>
            </div>
        </div>
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

    @guest
        <div class="modal fade" id="modalLogin">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ (isset($errors) && $errors->has('email')) ? ' has-error' : '' }}">
                                <input type="email" class="form-control" placeholder="Email Address" name="email" aria-describedby="emailHelp" value="{{ old('email') }}" required autofocus>
                                @if (isset($errors) && $errors->has('email'))
                                    <small id="emailHelp" class="form-text text-danger">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                            <div class="form-group{{ (isset($errors) && $errors->has('password')) ? ' has-error' : '' }}">
                                <input type="password" class="form-control" placeholder="Password" name="password" aria-describedby="passwordHelp" required>

                                @if (isset($errors) && $errors->has('password'))
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
                                    <i class="material-icons btn__icon--left">lock_open</i>Login
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
                    <div class="modal-footer">
                        <a href="{{ route('facebook.redirect') }}" class="btn  btn-secondary btn-block">
                            Login with Facebook
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @if(isset($errors) && $errors->any() && request()->route()->getName() != 'register' )
            <script>
                $('#modalLogin').modal('show');
            </script>
        @endif
    @endguest

    @yield('script')
    
</body>

</html>