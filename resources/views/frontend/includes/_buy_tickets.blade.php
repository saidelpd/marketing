<section id="buy-tickets">
    <div class="container" id="billing_stripe">
        <div class="row">
            <div class="sec-title text-center">
                <h2 class="wow animated bounceInLeft">Enter To Win</h2>
                <p class="wow animated bounceInRight text-info">Fantasy Marketing will not share your personal information with anyone.  The data will be utilized for notification purposes in case you win. When you complete the checkout form you will be registered to win.
                    To review raffle status or purchase more entries, click  <a class="text-warning" href="{{URL::route('login')}}">here</a>
                </p>
            </div>
            <form autocomplete="off">
                @include('assets._alert')
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-2">
                        <div class="input-field" :class="{'has-error' : form.errors.has('checkout_name')}">
                            <label for="name">First Name <span class="text-danger">*</span></label>
                            <input type="text" name="checkout_name" class="form-control" placeholder="Your Name..." v-model="form.checkout_name">
                             <span class="help-block" v-if="form.errors.has('checkout_name')" v-text="form.errors.get('checkout_name')"></span>
                        </div>
                        <div class="input-field" :class="{'has-error' : form.errors.has('checkout_last_name')}">
                            <label for="name">Last Name <span class="text-danger">*</span></label>
                            <input type="text" name="checkout_last_name" class="form-control" placeholder="Last Name..." v-model="form.checkout_last_name">
                            <span class="help-block" v-if="form.errors.has('checkout_last_name')" v-text="form.errors.get('checkout_last_name')"></span>
                        </div>
                        <div class="input-field" :class="{'has-error' : form.errors.has('checkout_phone')}">
                            <label for="name">Phone Number <span class="text-danger">*</span></label>
                            <input type="text" name="checkout_phone" class="form-control" placeholder="Phone Number..."
                                   v-model="form.checkout_phone">
                            <span class="help-block" v-if="form.errors.has('checkout_phone')" v-text="form.errors.get('checkout_phone')"></span>
                        </div>
                        <div class="input-field" :class="{'has-error' : form.errors.has('checkout_quantity')}">
                            <label for="name">Ticket Quantity <span class="text-danger">*</span></label>
                            <input type="number" min="1" name="checkout_quantity" class="form-control"
                                   placeholder="Ticket Quantity..." v-model="form.checkout_quantity">
                            <span class="help-block" v-if="form.errors.has('checkout_quantity')" v-text="form.errors.get('checkout_quantity')"></span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-field" :class="{'has-error' : form.errors.has('checkout_address')}">
                            <label for="name">Address <span class="text-danger">*</span></label>
                            <input type="text" name="checkout_address" class="form-control" placeholder="Address"
                                   v-model="form.checkout_address">
                            <span class="help-block" v-if="form.errors.has('checkout_address')" v-text="form.errors.get('checkout_address')"></span>
                        </div>
                        <div class="input-field" :class="{'has-error' : form.errors.has('checkout_city')}">
                            <label for="name">City <span class="text-danger">*</span></label>
                            <input type="text" name="checkout_city" class="form-control" placeholder="City"
                                   v-model="form.checkout_city">
                            <span class="help-block" v-if="form.errors.has('checkout_city')" v-text="form.errors.get('checkout_city')"></span>
                        </div>
                        <div class="input-field" :class="{'has-error' : form.errors.has('checkout_state')}">
                            <label for="name">State <span class="text-danger">*</span></label>
                             <select name="checkout_state" class="form-control"  v-model="form.checkout_state">
                                  <option value="0">Select State</option>
                                 @foreach(\App\Http\Helpers\HelperClass::usStates() as $key=>$states)
                                     <option value="{{$key}}">{{$states}}</option>
                                 @endforeach
                             </select>
                            <span class="help-block" v-if="form.errors.has('checkout_state')" v-text="form.errors.get('checkout_state')"></span>
                        </div>

                        <div class="input-field" :class="{'has-error' : form.errors.has('checkout_zip')}">
                            <label for="name">Zip Code <span class="text-danger">*</span></label>
                            <input type="text" name="checkout_zip" class="form-control" placeholder="Zip Code"
                                   v-model="form.checkout_zip">
                            <span class="help-block" v-if="form.errors.has('checkout_zip')" v-text="form.errors.get('checkout_zip')"></span>
                        </div>
                    </div>
                </div>
                <div class="row text-center top_20">
                    <button type="submit" @click.prevent="buy()" class="btn btn-blue btn-effect" :disabled="!isValidCheckOut() || form.is_sending">
                        CheckOut
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>