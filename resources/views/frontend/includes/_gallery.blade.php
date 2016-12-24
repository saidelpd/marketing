<section id="gallery">
    <div class="container">
        <div class="row">

            <div class="sec-title text-center wow animated fadeInDown">
                <h2>What do we raffle?</h2>
                <p>click to over <i class="fa fa-search"></i> icon  for more details</p>
            </div>

            <ul class="project-wrapper wow animated fadeInUp">
                @foreach($raffle->photos as $photo)
                    <li class="portfolio-item">
                        <img src="{{$raffle->raffle_images_path.$photo->path}}" class="img-responsive" alt="{{$photo->description}}">
                        <figcaption class="mask">
                            <h3>{{ str_limit($photo->title, 25)}}</h3>
                            <p>{{str_limit($photo->description, 110)}} </p>
                        </figcaption>
                        <ul class="external">
                            <li><a class="fancybox" title="{{$photo->title}}" data-fancybox-group="works" href="{{$raffle->raffle_images_path.$photo->path}}"><i class="fa fa-search"></i></a></li>
                            <li><a href=""><i class="fa fa-link"></i></a></li>
                        </ul>
                    </li>
                 @endforeach
            </ul>

        </div>
    </div>
</section>