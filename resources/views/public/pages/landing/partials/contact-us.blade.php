<section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="row gx-lg-0 gy-4">

                <div class="col-lg-4 pe-3">
                    <div class="contact-header">
                        <h2>Get in touch with us</h2>
                    </div>
                    <div class="info-item d-flex">
                        <i class="bi bi-clock flex-shrink-0"></i>
                        <div>
                            <h4>Open Hours:</h4>
                            <p>Office 9am – 4pm Mon – Fri</p>
                            <p>Bar 3pm – close </p>
                            <p>Restaurant 5:30pm – close</p>
                            {{-- <p>CALL +64 7 866 4121</p> --}}
                        </div>
                    </div><!-- End Info Item -->
                    <div class="info-item d-flex">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h4>Email:</h4>
                            <p>{{ settings('email') ? settings('email') : 'office@mbgfc.co.nz' }}</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-phone flex-shrink-0"></i>
                        <div>
                            <h4>Call:</h4>
                            <p>{{ settings('phone') ? settings('phone') : '+64 7 866 4121' }}</p>
                        </div>
                    </div><!-- End Info Item -->
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <div class="info-item d-flex">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h4>Location</h4>
                                <p>{{ getCompanyFullAddress() }}</p>
                            </div>
                        </div><!-- End Info Item -->
                    </div>

                </div>

                <div class="col-lg-8">
                    <form action="{{ route('public.contactUs.sendMail') }}" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name*"
                                    required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email*"
                                    required>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6 form-group">
                                <input type="tel" name="phone" class="form-control" id="phone"
                                    placeholder="Phone Number*" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="text" class="form-control" name="city" id="city" placeholder="City*"
                                    required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject*"
                                    required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div><button type="submit">Submit</button></div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section>
