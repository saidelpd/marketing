<section id="contact">
    <div class="container">
        <div class="row">

            <div class="sec-title text-center wow animated fadeInDown">
                <h2>Contact</h2>
                <p>Leave a Message</p>
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
                    <p><i class="fa fa-pencil"></i>Phoenix Inc.<span> 6825 SW 21 CT., Suite 3</span><span>Davie, FL 33317</span>
                    </p><br>
                    <p><i class="fa fa-phone"></i>Phone: +1.754.777.6666 </p>
                    <p><i class="fa fa-envelope"></i>info@fantasymarketing.us</p>
                </address>
            </div>

        </div>
    </div>
</section>

<section id="google-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14332.774183164516!2d-80.236825!3d26.0926!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d907814430f94f%3A0x95f638ae95917c2b!2s6825+SW+21st+Ct+%233%2C+Davie%2C+FL+33317!5e0!3m2!1sen!2sus!4v1482587237888"
            width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>