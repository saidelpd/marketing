<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="{{URL::route('fantasy.dashboard')}}">
        <img width="150px" src="/images/logo.jpg">
    </a>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">

    @if (Auth::guest())
        <li><a href="{{ URL::route('login') }}">Login</a></li>
        <li><a href="{{ URL::route('register') }}">Register</a></li>
        @else
                <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} {{ Auth::user()->last_name}} <i
                        class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> My Profile</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ URL::route('logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
    @endif

</ul>