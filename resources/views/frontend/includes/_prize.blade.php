<section id="prize">
    <div class="container">
        <div class="row">

            <div class="sec-title text-center wow animated fadeInDown">
                <h2>Grand Prize</h2>
                <p>Click on images for details</p>
            </div>

            <ul class="project-wrapper wow animated fadeInUp">
                @foreach($raffle->photos as $photo)
                    <li class="portfolio-item">
                        <a class="fancybox" title="{{$photo->title}}" data-fancybox-group="works" href="{{$raffle->raffle_images_path.$photo->path}}">
                            <img src="{{$raffle->raffle_images_path.'thumb_'.$photo->path}}" class="img-responsive" alt="{{$photo->description}}">
                        </a>
                        <figcaption class="mask">
                            <h3>{{ str_limit($photo->title, 20)}}</h3>
                            <p>{{str_limit($photo->description, 100)}} </p>
                        </figcaption>
                        <ul class="external">
                            <li>
                                <a class="fancybox" title="{{$photo->title}}" data-fancybox-group="works_search" href="{{$raffle->raffle_images_path.$photo->path}}">
                                    <i class="fa fa-search"></i>
                                    </a>
                            </li>
                        </ul>
                    </li>
                 @endforeach
            </ul>

        </div>
    </div>
</section>