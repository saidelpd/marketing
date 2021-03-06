<section id="home-slider">
    <div id="slider" class="sl-slider-wrapper">

        <div class="sl-slider">
            @foreach($raffle->photos as $photo)
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25"
                 data-slice1-scale="2" data-slice2-scale="2">
                <div class="bg-img" style="background-image: url('{{$raffle->raffle_images_path.$photo->path}}')"></div>
                <div class="slide-caption">
                    <div class="caption-content">
                        <h2 class="animated fadeInDown">Fantasy Marketing’s Raffle to benefit the Palm Beach Gardens Youth Athletic Association Predators Soccer.</h2>
                        <span class="animated fadeInDown">Enter to win a {{$raffle->obj_name}}</span>
                        <a href="#buy-tickets" class="btn btn-red btn-effect">Enter To Win</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!-- /sl-slider -->

        <div class="content slider-logos" style="position: absolute;display: block !important;">
        </div>
        <nav id="nav-arrows" class="nav-arrows hidden-xs hidden-sm visible-md visible-lg">
            <a href="javascript:;" class="sl-prev">
                <i class="fa fa-angle-left fa-3x"></i>
            </a>
            <a href="javascript:;" class="sl-next">
                <i class="fa fa-angle-right fa-3x"></i>
            </a>
        </nav>


        <nav id="nav-dots" class="nav-dots">
            <div class="container button_20">
                <div class="col-sm-3"><a href="http://mckengineering.us" target="_blank"><img src="/images/logos/mck.png"></a></div>
                <div class="col-sm-3"><a href="https://www.pca.org" target="_blank"><img src="/images/logos/pca.png"></a></div>
                <div class="col-sm-3"><a href="http://werksreunion.com" target="_blank"><img src="/images/logos/werk_reunion.png"></a></div>
                <div class="col-sm-3"><a href="http://www.pbgpredators.org" target="_blank"><img src="/images/logos/predators.png"></a></div>
            </div>
            <span class="nav-dot-current"></span>
            <span></span>
            <span></span>
        </nav>

    </div><!-- /slider-wrapper -->
</section>