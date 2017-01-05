<section id="contact">
    <div class="container">
        <div class="row">

            <div class="sec-title text-center wow animated fadeInDown">
                <h2>Contact Us</h2>
            </div>

            <div class="col-md-7 contact-form wow animated fadeInLeft" id="contact_us">
                <form @submit.prevent="handleIt" @keydown="form.errors.clear($event.target.name)" autocomplete="off">

                 @include('assets._alert')

                <div class="input-field" :class="{'has-error' : form.errors.has('contact_name')}">
                    <input type="text" name="contact_name" class="form-control" placeholder="Your Name..."
                           v-model="form.contact_name">
            <span class="help-block" v-if="form.errors.has('contact_name')"
                  v-text="form.errors.get('contact_name')"></span>
                </div>
                <div class="input-field" :class="{'has-error' : form.errors.has('contact_email')}">
                    <input type="email" name="contact_email" class="form-control" placeholder="Your Email..."
                           v-model="form.contact_email">
            <span class="help-block" v-if="form.errors.has('contact_email')"
                  v-text="form.errors.get('contact_email')"></span>
                </div>
                <div class="input-field">
                    <input type="text" name="contact_subject" class="form-control" placeholder="Subject..."
                           v-model="form.contact_subject">
                </div>
                <div class="input-field" :class="{'has-error' : form.errors.has('contact_message')}">
            <textarea name="contact_message" class="form-control" placeholder="Messages..."
                      v-model="form.contact_message"></textarea>
            <span class="help-block" v-if="form.errors.has('contact_message')"
                  v-text="form.errors.get('contact_message')"></span>
                </div>
                <button type="submit" id="submit" class="btn btn-blue btn-effect"
                        :disabled="(form.is_sending || form.errors.any()) ">Send
                </button>
                </form>
            </div>
            <div class="col-md-5 wow animated fadeInRight">
                <address class="contact-details">
                    <h3>Contact Us</h3>
                    <p><i class="fa fa-pencil"></i>Fantasy Marketing.<span> 6825 SW 21 CT., Suite 2</span><span>Davie, FL 33317</span>
                    </p><br>
                    <p><i class="fa fa-phone"></i>Phone: 954.306.8696 </p>
                    <p><i class="fa fa-envelope"></i>info@fantasymarketing.us</p>
                </address>
            </div>

        </div>
    </div>
</section>