<!-- Notification Modal -->
<div class="modal fade" id="notification_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Send Notification</h4>
            </div>
            <div class="modal-body">
                @include('assets._alert')
            <div class="alert alert-info" v-text="notification_to_message"></div>
            <div class="input-field" :class="{'has-error' : form.errors.has('notification_message')}">
                    <textarea class="form-control" rows="3" name="notification_message" v-model="form.notification_message" placeholder="Enter Message"></textarea>
                    <span class="help-block" v-if="form.errors.has('notification_message')" v-text="form.errors.get('notification_message')"></span>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" @click="sendNotification()" :disabled="(form.is_sending)"><i class="fa fa-envelope"></i> Send</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->