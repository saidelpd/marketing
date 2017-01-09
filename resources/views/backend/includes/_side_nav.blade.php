<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                       <h3>Fantasy Menu</h3>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{URL::route('fantasy.dashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{URL::route('fantasy.tickets')}}"><i class="fa fa-bar-chart-o fa-fw"></i> Tickets</a>
            </li>

            <li>
               <a href="{{route('fantasy.buyTickets')}}"><i class="fa fa-ticket fa-fw"></i> Buy Tickets</a>
            </li>

            <li>
               <a href="{{URL::route('fantasy.payments')}}"><i class="fa fa-credit-card fa-fw"></i> Payments</a>
            </li>
            @if(Auth::user()->isAdmin())
            <li>
                <a href="{{URL::route('fantasy.users')}}"><i class="fa fa-users fa-fw"></i> Users</a>
            </li>
            @endif
            <li>
                <a href="{{URL::route('fantasy.myProfile')}}"><i class="fa fa-user fa-fw"></i> My Profile</a>
            </li>
            <li>
                <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-unlock fa-fw"></i> Logout</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>