<section id="how-it-works">
    <div class="container">
        <div class="row">
            <div class="sec-title text-center">
                <h2 class="wow animated bounceInLeft">How it works</h2>
                <p class="wow animated bounceInRight">Is easy as one two three, get tickets for
                    only {{$raffle->ticketCostPrice()}}</p>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12 text-center wow animated zoomIn">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="fa fa-ticket fa-3x"></i>
                    </div>
                    <h3>REGISTER</h3>
                    <p>Register with us and buy as many tickets as you want , more you buy more probabilities of
                        win.</p>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.3s">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="fa fa-tasks fa-3x"></i>
                    </div>
                    <h3>closing date</h3>
                    <p>The closing date will be at {{$raffle->closing_date->toDayDateTimeString()}} . This will take
                        place at Marlins Park Venue </p>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.6s">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="fa fa-clock-o fa-3x"></i>
                    </div>
                    <h3>WIN A {{$raffle->obj_name}}</h3>
                    <p>If you have the winner ticket you will be contacted through the phone and email registered in our
                        system. </p>
                </div>
            </div>
        </div>

    </div>
</section>