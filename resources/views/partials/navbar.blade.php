<!-- Toggle sidebar -->
<button class="navbar-toggler d-block d-sm-none" data-toggle="sidebar" type="button" style="border: 0px;">
    <span class="material-icons">menu</span>
</button>

<!-- Brand -->
<a href="{{ route('index') }}" class="navbar-brand">
    <i class="material-icons">school</i> OnlineCourses
</a>

<!-- Search -->
<form class="navbar-search-form d-none d-md-flex" action="{{ route('courses.index') }}">
    <input type="text" name="q" class="form-control" placeholder="Search course" value="{{ request('q') }}">
    <button class="btn" type="submit">
        <i class="material-icons">search</i>
    </button>
</form>
<!-- // END Search -->

<div class="navbar-spacer"></div>

<!-- Menu -->
<ul class="nav navbar-nav d-none d-md-flex">
    <li class="nav-item">
        <a class="nav-link {{ isActive(['index', 'courses.index', 'course.category', 'course.tag']) }}" href="{{ route('courses.index') }}">Browse</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ isActive(['blog', 'post.index', 'post.view']) }}" href="{{ route('blog') }}">Blog</a>
    </li>

    @if(hasRoles(['author', 'student']))
    <li class="nav-item">
        <a class="nav-link {{ isActive(['profile']) }}" href="{{ route('profile') }}">Profile</a>
    </li>
    @endif

    @if(hasRoles(['admin', 'editor']))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
    </li>
    @endif
</ul>


<!-- Menu -->
<ul class="nav navbar-nav">

    {{--
    <li class="nav-item">
        <a href="fixed-student-cart.html" class="nav-link">
            <i class="material-icons">shopping_cart</i>
        </a>
    </li> --}}

    <!-- User dropdown -->
    @guest
    <li class="nav-item">
        <a href="#" class="nav-link {{ isActive(['login', 'register']) }}" data-toggle="modal" data-target="#modalLogin">
            Login/Register
        </a>
    </li>
    @else
    <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle" data-toggle="dropdown" href="#" role="button">
            <img src="{{ Auth::user()->avatar_url }}" alt="Avatar" class="rounded-circle" width="40"> 
            <span class="d-none d-sm-block">&nbsp;{{ Auth::user()->username }}</span>
            <span class="caret"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            @if(hasRoles(['admin', 'editor', 'author']))
            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                <i class="material-icons">dashboard</i> Dashboard
            </a>
            @endif
            <a class="dropdown-item" href="{{ route('order.index') }}">
                <i class="material-icons">description</i> My Billing
            </a>
            <a class="dropdown-item" href="{{ route('account.edit') }}">
                <i class="material-icons">edit</i> Edit Account
            </a>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="material-icons">lock</i> Logout
            </a>
        </div>
    </li>
    @endguest
    <!-- // END User dropdown -->

</ul>
<!-- // END Menu -->
