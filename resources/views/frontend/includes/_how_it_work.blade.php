<section id="how-it-works">
    <div class="container">
        <div class="row">
            <div class="sec-title text-center">
                <h2 class="wow animated bounceInLeft">How it works</h2>
                <p class="wow animated bounceInRight"><a href="{{URL::route('home.rules')}}">Click here for Officials Rules</a></p>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12 text-center wow animated zoomIn">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="fa fa-ticket fa-3x"></i>
                    </div>
                    <h3>REGISTER TO WIN</h3>
                    <p>Register with us and purchase as many entries as you desire, the more entries you have the greater your probability of winning.</p>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.3s">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="fa fa-tasks fa-3x"></i>
                    </div>
                    <h3>REGISTRATION DEADLINE</h3>
                    <p>The deadline to Register will be March 1st, 2017 for mail in entries and 1:30 PM on March 10th, 2017 for online entries.
                        The raffle will be held during Porsche Club Of America's Werks Reunion at the Amelia Island Concours d'Elegance.</p>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.6s">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="fa fa-clock-o fa-3x"></i>
                    </div>
                    <h3>WIN A {{$raffle->obj_name}}</h3>
                    <p>If you have the winning ticket you will be notified via the email registered in our system. </p>
                </div>
            </div>
        </div>

    </div>
</section>