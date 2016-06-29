<!-- preloader section -->
<section class="preloader">
	<div class="sk-spinner sk-spinner-pulse"></div>
</section>

<nav class="navbar navbar-dark red">
    <!-- Collapse button-->
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2">
        <i class="fa fa-bars"></i>
    </button>
    <div class="container">
        <!--Collapse content-->
        <div class="collapse navbar-toggleable-xs" id="collapseEx2">
            <!--Navbar Brand-->
            <a class="navbar-brand" href="#">SAMARPAN</a>
            <!--Links-->
            <ul class="nav navbar-nav pull-right">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">Home</a>
                </li>
                @if(Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item dropdown right">
                        <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <!--Search form--> 
                    <li class="nav-item">
                        <a href="{{ url('login') }}" class="nav-link">Login</a>
                    </li>
                @endif

                @if(!Auth::guest())
                @if(Auth::user()->type == '0')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/senior_citizens') }}">Senior Citizens</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/profile_viewers') }}">Profile Viewers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/departments') }}">Departments</a>
                    </li>
                    <li class="nav-item dropdown right">
                        <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome, <b>{{Auth::user()->name}}</b></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="{{ url('admin/settings') }}">Settings <i class="fa fa-gear"></i></a>
                            <a class="dropdown-item" href="#">Logout <i class="fa fa-sign-out"></i></a>
                        </div>
                    </li>
                @endif

                @if(Auth::user()->type == '1')

                @endif

                @if(Auth::user()->type == '2')

                @endif

                @if(Auth::user()->type == '3')

                @endif
                @endif
            </ul>
        </div>
        <!--/.Collapse content-->
    </div>
</nav>