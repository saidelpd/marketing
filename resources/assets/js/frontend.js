$(window).on('load', function () {
    $("#preloader").fadeOut("slow");
});

/* ========================================================================= */
/*  Welcome Section Slider
 /* ========================================================================= */

$(function () {

    var Page = (function () {
        var $navArrows = $('#nav-arrows'),
            $nav = $('#nav-dots > span'),
            slitslider = $('#slider').slitslider({
                onBeforeChange: function (slide, pos) {

                    $nav.removeClass('nav-dot-current');
                    $nav.eq(pos).addClass('nav-dot-current');

                }
            }),

            init = function () {

                initEvents();

            },
            initEvents = function () {

                // add navigation events
                $navArrows.children(':last').on('click', function () {

                    slitslider.next();
                    return false;

                });

                $navArrows.children(':first').on('click', function () {

                    slitslider.previous();
                    return false;

                });

                $nav.each(function (i) {

                    $(this).on('click', function (event) {

                        var $dot = $(this);

                        if (!slitslider.isActive()) {

                            $nav.removeClass('nav-dot-current');
                            $dot.addClass('nav-dot-current');

                        }

                        slitslider.jump(i + 1);
                        return false;

                    });

                });

            };

        return {init: init};

    })();

    Page.init();

    /* ========================================================================= */
    /*	Menu item highlighting
     /* ========================================================================= */

    $('#nav').singlePageNav({
        offset: $('#nav').outerHeight(),
        filter: ':not(.external)',
        speed: 2000,
        currentClass: 'current',
        easing: 'easeInOutExpo',
        updateHash: true,
        beforeStart: function () {
            //console.log('begin scrolling');
        },
        onComplete: function () {
            //console.log('done scrolling');
        }
    });

    $(window).scroll(function () {
        if ($(window).scrollTop() > 400) {
            $(".navbar-brand a").css("color", "#fff");
            $("#navigation").removeClass("animated-header");
        } else {
            $(".navbar-brand a").css("color", "inherit");
            $("#navigation").addClass("animated-header");
        }
    });

    /* ========================================================================= */
    /*	Fix Slider Height
     /* ========================================================================= */

    // Slider Height
    var slideHeight = $(window).height();

    $('#home-slider, #slider, .sl-slider, .sl-content-wrapper').css('height', slideHeight);

    $(window).resize(function () {
        'use strict',
            $('#home-slider, #slider, .sl-slider, .sl-content-wrapper').css('height', slideHeight);
    });


    $("#testimonial").owlCarousel({
        navigation: true,
        pagination: false,
        slideSpeed: 700,
        paginationSpeed: 400,
        singleItem: true,
        navigationText: ["<i class='fa fa-angle-left fa-lg'></i>", "<i class='fa fa-angle-right fa-lg'></i>"]
    });


    /* ========================================================================= */
    /*	Featured Project Lightbox
     /* ========================================================================= */

    $(".fancybox").fancybox({
        padding: 0,

        openEffect: 'elastic',
        openSpeed: 650,

        closeEffect: 'elastic',
        closeSpeed: 550,

        closeClick: true,

        beforeShow: function () {
            this.title = $(this.element).attr('title');
            this.title = '<h3>' + this.title + '</h3>' + '<p>' + $(this.element).parents('.portfolio-item').find('img').attr('alt') + '</p>';
        },

        helpers: {
            title: {
                type: 'inside'
            },
            overlay: {
                css: {
                    'background': 'rgba(0,0,0,0.8)'
                }
            }
        }
    });

    /* ========================================================================= */
    /*	Contact Us
     /* ========================================================================= */
    var contact_us_data = {
        form: new Form({
            contact_name: '',
            contact_subject: '',
            contact_email: '',
            contact_message: '',
            _token: Laravel.csrfToken
        }),
        alert_message : 'Message Send Successfully, We will contact you as soon as possible.'
    };
    new Vue({
        el: '#contact_us',
        data: contact_us_data,
        methods: {
            handleIt: function () {
                this.form.submit('/contact',this);
            },
            callback : function(){
                if(this.form.has_success)
                {
                    this.form.message = this.alert_message;
                }
            }
        }
    });
    /* ========================================================================= */
    /*	End Contact Us
     /* ========================================================================= */


    /* ========================================================================= */
    /*	Billing
     /* ========================================================================= */

    var billing_data = {
        form: new Form({
            stripeEmail: '',
            stripeToken: '',
            checkout_name: '',
            checkout_last_name: '',
            checkout_phone: '',
            checkout_quantity: 1,
            _token: Laravel.csrfToken
        }),
        stripe:''
    };
 new Vue({
        el: '#billing_stripe',
        data: billing_data,
        created: function(){
           var vue = this;
           this.stripe = StripeCheckout.configure({
            key: Laravel.stripeKey,
            image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
            locale: "auto",
            token: function (token) {
                vue.form.stripeToken = token.id;
                vue.form.stripeEmail = token.email;
                vue.form.submit('/buy_tickets',vue);
            }
        });
        },
        methods: {
            buy:function(){
                var vue = this;
                this.stripe.open({
                    name: 'Fantasy Marketing',
                    description: 'Buying Tickets',
                    zipCode: true,
                    amount: Laravel.ticketPrice * vue.form.checkout_quantity
                });
            },
            callback : function(){
                if(this.form.has_success)
                {
                    this.form.message = 'Payment Process successfully. We will send you a confirmation Email with your tickets and login information.';
                }
            },
            isValidCheckOut: function() {
                return (
                    this.form.checkout_name
                    && this.form.checkout_last_name
                    && this.form.checkout_phone
                    && !isNaN(this.form.checkout_quantity)
                    && this.form.checkout_quantity > 0
                );
            }
        }
    });

    /* ========================================================================= */
    /*	End Billings
     /* ========================================================================= */
});


var wow = new WOW({
    offset: 75,          // distance to the element when triggering the animation (default is 0)
    mobile: false,       // trigger animations on mobile devices (default is true)
});
wow.init();

