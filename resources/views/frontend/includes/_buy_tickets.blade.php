<section id="buy-tickets">
    <div class="container" id="billing_stripe">
        <div class="row">
            <div class="sec-title text-center">
                <h2 class="wow animated bounceInLeft">Enter To Win</h2>
                <p class="wow animated bounceInRight text-info">Fantasy Marketing LLC don't share personal information with other companies, we only use your data to contact you in case of winning.
                    When you completed the checkout form you will be registered in our raffle, to review the raffle status or buy more tickets click
                    <a class="text-warning" href="{{URL::route('login')}}">login</a>
                </p>
            </div>
            <form method="post" action="/buy_tickets" autocomplete="off">
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
                    </div>
                    <div class="col-sm-4">
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