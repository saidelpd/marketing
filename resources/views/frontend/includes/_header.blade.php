<!-- preloader -->
<div id="preloader">
    <div class="loder-box">
        <div class="battery"></div>
    </div>
</div>
<!-- end preloader -->

<!--
Fixed Navigation
==================================== -->
<header id="navigation" class="navbar-inverse navbar-fixed-top animated-header">
    <div class="container">
        <div class="navbar-header">
            <!-- responsive nav button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- /responsive nav button -->

            <!-- logo -->
            <h1 class="navbar-brand">
                <a href="#body"><img width="170px" src="/images/logo.png"></a>
            </h1>
            <!-- /logo -->
        </div>

        <!-- main nav -->
        <nav class="collapse navbar-collapse navbar-right" role="navigation">
            <ul id="nav" class="nav navbar-nav">
                <li><a href="#body">Home</a></li>
                <li><a href="#how-to">How to</a></li>
                <li><a href="#gallery">Raffle Gallery</a></li>
                <li><a href="#buy-tickets">Buy Tickets</a></li>
                <li><a href="#testimonials">Testimonial</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a class="external" href="{{URL::route('login')}}">Login</a></li>
            </ul>

        </nav>
        <!-- /main nav -->
    </div>
</header>
<!--
End Fixed Navigation
==================================== -->
