@extends('layouts.app')
@section('content')
    <script>
        var user = {!! $user->toJson() !!};
    </script>
    <div id="page-wrapper">
        <div id="profile-view">
            @include('assets._password_change_modal')
            @include('backend.includes._title')
            <button class="btn btn-success button_20" @click="openPasswordModal()"><i class="fa fa-lock"></i> Change Password</button>
            <div class="row">
                <div class="col-sm-12">
                    @include('assets._alert')
                </div>
                <form>
                    <div class="col-sm-4">
                        <div class="input-field">
                            <label for="name">Email <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="{{$user->email}}" disabled>
                        <span class="help-block" v-text="form.errors.get('email')"></span>
                        </div>
                        <div class="input-field" :class="{'has-error' : form.errors.has('name')}">
                            <label for="name">First Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Your Name..."
                                   v-model="form.name">
                            <span class="help-block" v-text="form.errors.get('name')"></span>
                        </div>
                        <div class="input-field" :class="{'has-error' : form.errors.has('last_name')}">
                            <label for="name">Last Name <span class="text-danger">*</span></label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name..."
                                   v-model="form.last_name">
                        <span class="help-block" v-text="form.errors.get('last_name')"></span>
                        </div>
                        <div class="input-field" :class="{'has-error' : form.errors.has('phone')}">
                            <label for="name">Phone Number <span class="text-danger">*</span></label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone Number..."
                                   v-model="form.phone">
                        <span class="help-block" v-text="form.errors.get('phone')"></span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-field" :class="{'has-error' : form.errors.has('address')}">
                            <label for="name">Address <span class="text-danger">*</span></label>
                            <input type="text" name="address" class="form-control" placeholder="Address"
                                   v-model="form.address">
                        <span class="help-block" v-text="form.errors.get('address')"></span>
                        </div>
                        <div class="input-field" :class="{'has-error' : form.errors.has('city')}">
                            <label for="name">City <span class="text-danger">*</span></label>
                            <input type="text" name="city" class="form-control" placeholder="City"
                                   v-model="form.city">
                            <span class="help-block" v-text="form.errors.get('city')"></span>
                        </div>
                        <div class="input-field">
                            <label for="name">State <span class="text-danger">*</span></label>
                            <select name="state" class="form-control" id="profile_state">
                                @foreach(\App\Http\Helpers\HelperClass::usStates() as $key=>$states)
                                    <option value="{{$key}}"
                                            @if($key == $user->state) selected="selected" @endif>{{$states}}</option>
                                @endforeach
                            </select>
                            <span class="help-block"></span>
                        </div>
                        <div class="input-field" :class="{'has-error' : form.errors.has('zip')}">
                            <label for="name">Zip Code <span class="text-danger">*</span></label>
                            <input type="text" name="zip" class="form-control" placeholder="Zip Code"
                                   v-model="form.zip">
                            <span class="help-block" v-text="form.errors.get('zip')"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
            <button class="btn btn-primary top_20" @click="save()" :disabled="(form.is_sending)"><i class="fa fa-save"></i> Update User</button>
        </div>
    </div>
@endsection


