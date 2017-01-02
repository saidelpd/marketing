
$(function() {
    $('#side-menu').metisMenu();
});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
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

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
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

/**
 * Notifications
 */
var notification_data = {
    form: new Form({
        notification_user : '',
        notification_message : '',
        _token: Laravel.csrfToken
    }),
    has_success: true,
    notification_to_message:''
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
        sendNotification:function()
        {
            var vue = this;
            this.form.submit('/fantasy/user_view_notification').then(function(){
                vue.form.message = 'Message Send Successfully.';
                vue.has_success = true;
            }).catch(function () {
                vue.has_success = false;
            });
        },
        getNotificationLabel: function(type){
            if(type == 'all')
            {
                this.notification_to_message = 'This Notification will be send to all users';
            }
            else{
                this.notification_to_message = 'This Notification will be send to '+type;
            }
        }
    }
});