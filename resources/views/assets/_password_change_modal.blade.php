<!-- Notification Modal -->
<div class="modal fade" id="password_change_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Change Password</h4>
            </div>
            <div class="modal-body">
                <div class="alert" :class="(has_success) ? 'alert-success' : 'alert-danger'" v-if="form_pass.message" v-text="form_pass.message">
                </div>
                <div class="input-field" :class="{'has-error' : form_pass.errors.has('old_password')}">
                    <label for="name">Old Password <span class="text-danger">*</span></label>
                    <input type="password" name="old_password" class="form-control" placeholder="Your Password..."
                           v-model="form_pass.old_password">
                    <span class="help-block" v-text="form_pass.errors.get('old_password')"></span>
                </div>
                <div class="input-field" :class="{'has-error' : form_pass.errors.has('new_password')}">
                    <label for="name">New Password <span class="text-danger">*</span></label>
                    <input type="password" name="new_password" class="form-control" placeholder="New Password..."
                           v-model="form_pass.new_password">
                    <span class="help-block" v-text="form_pass.errors.get('new_password')"></span>
                </div>
                <div class="input-field" :class="{'has-error' : form_pass.errors.has('new_password_confirmation')}">
                    <label for="name">New Password Confirmation <span class="text-danger">*</span></label>
                    <input type="password" name="new_password_confirmation" class="form-control" placeholder="New Password Confirmation"
                           v-model="form_pass.new_password_confirmation">
                    <span class="help-block" v-text="form_pass.errors.get('new_password_confirmation')"></span>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" @click="changePassword()" :disabled="(form.is_sending || !is_password_valid())"><i class="fa fa-envelope"></i> Change</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->