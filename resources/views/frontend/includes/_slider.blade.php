<section id="home-slider">
    <div id="slider" class="sl-slider-wrapper">

        <div class="sl-slider">

            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">

                <div class="bg-img bg-img-1"></div>

                <div class="slide-caption">
                    <div class="caption-content">
                        <h2 class="animated fadeInDown">Fantasy Marketing Raffle</h2>
                        <span class="animated fadeInDown">Register to win a {{$raffle->obj_name}}</span>
                        <a href="#buy-tickets" class="btn btn-blue btn-effect">Buy Tickets</a>
                    </div>
                </div>
            </div>

            <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                <div class="bg-img bg-img-2"></div>
                <div class="slide-caption">
                    <div class="caption-content">
                        <h2>Fantasy Marketing Raffle</h2>
                        <span>Don't Miss the opportunity to win the car of your dreams</span>
                        <a href="#buy-tickets" class="btn btn-blue btn-effect">Buy Tickets</a>
                    </div>
                </div>

            </div>

            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">

                <div class="bg-img bg-img-3"></div>
                <div class="slide-caption">
                    <div class="caption-content">
                        <h2>Fantasy Marketing Raffle</h2>
                        <span>With our simple dashboard page you can review your tickets or buy more</span>
                        <a href="{{URL::route('login')}}" class="btn btn-blue btn-effect">Login</a>
                    </div>
                </div>

            </div>

        </div><!-- /sl-slider -->

        <nav id="nav-arrows" class="nav-arrows hidden-xs hidden-sm visible-md visible-lg">
            <a href="javascript:;" class="sl-prev">
                <i class="fa fa-angle-left fa-3x"></i>
            </a>
            <a href="javascript:;" class="sl-next">
                <i class="fa fa-angle-right fa-3x"></i>
            </a>
        </nav>

        <nav id="nav-dots" class="nav-dots">
            <span class="nav-dot-current"></span>
            <span></span>
            <span></span>
        </nav>

    </div><!-- /slider-wrapper -->
</section>