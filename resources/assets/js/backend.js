/**
 * Dashboard Graph
 */
if ($('#homeGraph').length) {
    new Vue({
        el: '#homeGraph',
        data: {
            loading: true,
            chart_obj: {}
        },
        methods: {
            loadChart: function () {
                var vue = this;
                vue.loading = true;
                $.post("/fantasy/graphData",{ '_token': Laravel.csrfToken})
                    .done(function (data) {
                        vue.loading = false;
                        vue.chart_obj = new Chart($('#chart'), {
                            type: 'line',
                            data: data.chart_data,
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true,
                                            maxTicksLimit: 8
                                        }
                                    }]
                                },
                                legend: {
                                    display: true,
                                    position: 'bottom',
                                    labels: {
                                        fontSize: 14,
                                        boxWidth: 50
                                    }
                                },
                            }
                        });
                    })
                    .fail(function () {
                        alert('Loading Graph Error');
                    });
            },
        },
        created: function () {
            this.loadChart();
        }
    });
}

/**
 * Buy More Tickets
 */
if ($('#buy-tickets').length) {
    new Vue({
        el: '#buy-tickets',
        data: {
            form:new Form({
                stripeEmail: '',
                stripeToken: '',
                checkout_quantity: 1,
                _token: Laravel.csrfToken
            }),
            stripe: '',
            has_success: true
        },
        created: function () {
            var vue = this;
            this.stripe = StripeCheckout.configure({
                key: Laravel.stripeKey,
                locale: "auto",
                email: Laravel.email,
                token: function (token) {
                    vue.form.stripeToken = token.id;
                    vue.form.stripeEmail = token.email;
                    vue.form.submit('/fantasy/checkout').then(function () {
                        vue.form.message = 'Payment Process successfully.';
                        vue.has_success = true;
                        vue.form.checkout_quantity = 1;
                    }).catch(function () {
                        vue.has_success = false;
                        vue.form.checkout_quantity = 1;
                    });
                }
            });
        },
        methods: {
            buy: function () {
                var vue = this;
                this.stripe.open({
                    name: 'Fantasy Marketing',
                    description: 'Buying Tickets',
                    zipCode: true,
                    amount: Laravel.ticketPrice * vue.form.checkout_quantity
                });
            },
            isValidCheckOut: function () {
                return (!isNaN(this.form.checkout_quantity) && this.form.checkout_quantity > 0);
            }
        }
    });
}


/**
 * Notifications
 */
if ($('#users-view').length) {
    var notification_data = {
        form: new Form({
            notification_user: '',
            notification_message: '',
            _token: Laravel.csrfToken
        }),
        has_success: true,
        notification_to_message: ''
    };
    new Vue({
        el: '#users-view',
        data: notification_data,
        methods: {
            openModal: function (type) {
                this.form.reset();
                $('#notification_modal').modal('show');
                this.getNotificationLabel(type);
                this.form.notification_user = type;
            },
            sendNotification: function () {
                var vue = this;
                this.form.submit('/fantasy/user_view_notification').then(function () {
                    vue.form.message = 'Message Send Successfully.';
                    vue.has_success = true;
                }).catch(function () {
                    vue.has_success = false;
                });
            },
            getNotificationLabel: function (type) {
                if (type == 'all') {
                    this.notification_to_message = 'This Notification will be send to all users';
                }
                else {
                    this.notification_to_message = 'This Notification will be send to ' + type;
                }
            }
        }
    });
}


/**
 * Save Profile
 */
if (typeof user !== 'undefined') {
    new Vue({
        el: '#profile-view',
        data: {
            form: new Form({
                name: user.name,
                last_name: user.last_name,
                phone: user.phone,
                address: user.address,
                city: user.city,
                state: '',
                zip: user.zip,
                _token: Laravel.csrfToken
            }),
            form_pass: new Form({
                old_password: '',
                new_password: '',
                new_password_confirmation: '',
                _token: Laravel.csrfToken
            }),
            has_success: true
        },
        methods: {
            save: function () {
                this.form.state = $('#profile_state').val();
                var vue = this;
                this.form.submit('/fantasy/store_profile').then(function (data) {
                    vue.form.message = 'User profile updated.';
                    vue.form.name = data.name;
                    vue.form.last_name = data.last_name;
                    vue.form.phone = data.phone;
                    vue.form.address = data.address;
                    vue.form.city = data.city;
                    vue.form.state = data.state;
                    vue.form.zip = data.zip;
                    vue.has_success = true;
                }).catch(function () {
                    vue.has_success = false;
                });
            },
            changePassword:function()
            {
                var vue = this;
                this.form_pass.submit('/fantasy/user_change_password').then(function (data) {
                    vue.form_pass.message = 'Your password was change successfully.';
                    vue.has_success = true;
                }).catch(function () {
                    vue.has_success = false;
                });
            },
            openPasswordModal: function () {
                this.form_pass.reset();
                $('#password_change_modal').modal('show');
            },
            is_password_valid: function () {
               return (this.form_pass.old_password && this.form_pass.new_password!='' && (this.form_pass.new_password == this.form_pass.new_password_confirmation));
            }
        }
    });
}


//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function () {
    $(window).bind("load resize", function () {
        var topOffset = 50;
        var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        var height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });
    $('#side-menu').metisMenu();
    var url = window.location;
    var element = $('ul.nav a').filter(function () {
        return this.href == url;
    }).addClass('active').parent();
    while (true) {
        if (element.is('li')) {
            element = element.parent().addClass('in').parent();
        } else {
            break;
        }
    }
});

