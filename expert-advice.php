<?php include('header.php');?>

    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(assets/images/main/bg-better.webp);"></div>
        <div class="container">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.php">Home</a></li>
                <li>/</li>
                <li><span>Expert Advice</span></li>
            </ul>
            <h2>Expert Advice</h2>
        </div>
    </section>
    

    <section class="apply-one">
        <div class="container">
            <form action="" method="post" class="contact-one__form">
                <div class="contact-one__form-box">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block-title">
                                <p class="small-title">Calculate you loan amount</p>
                                <h2 class="title-block">Expert Advice Details</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Enter Your Name*</label>
                                <input type="text" name="" class="form-control contact-one__form-input" placeholder="Your Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Enter Phone No.*</label>
                                <input type="tel" name="" class="form-control contact-one__form-input" placeholder="Phone No." required>
                            </div><!-- /.form-group-->
                        </div><!-- /.col-md-6-->
                    </div><!-- /.row-->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Enter Email Id*</label>
                                <input type="email" name="" class="form-control contact-one__form-input" placeholder="Phone No." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>State*</label>
                                <select name="" class="form-control contact-one__form-input">
                                    <option value="">Select State</option>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jammu &amp; Kashmir">Jammu &amp; Kashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="Uttar Pradesh ">Uttar Pradesh</option>
                                    <option value="West Bengal ">West Bengal</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Investment *</label> 
                                <select name="" class="form-control contact-one__form-input">
                                    <option value="">Investment</option>
                                    <option value="Above Rs 50000">Above Rs 50000</option>
                                    <option value="Above Rs 1 lac">Above Rs 1 lac</option>
                                    <option value="Above 3 Lac">Above 3 Lac</option>
                                    <option value="Above 5 Lac">Above 5 Lac</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Segment *</label>
                                <select name="" class="form-control contact-one__form-input">
                                    <option value="">Segment</option>
                                    <option value="Equity Cash / Intraday">Equity Cash / Intraday</option>
                                    <option value="Option (Call - Put)">Option (Call - Put)</option>
                                    <option value="Future (Derivatives)">Future (Derivatives )</option>
                                    <option value="Index">Index </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="contact-one__form-submit">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="Submit" class="thm-btn">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    
    <section class="testimonials-one">
        <div class="container">
            <div class="block-title text-center">
                <p>Customers Testimonials</p>
                <h2>Customers Testimonials</h2>
            </div><!-- /.block-title -->
            <div class="thm-swiper__slider swiper-container" data-swiper-options='{
                "spaceBetween": 0,
                "slidesPerView": 1,
                "slidesPerGroup": 1,
                "loop":true,
                "autoplay": {
                    "delay": 5000
                },
                "pagination": {
                    "el": ".testimonials-one__swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                },
                "breakpoints": {
                    "0": {
                        "spaceBetween": 0,
                        "slidesPerView": 1,
                        "slidesPerGroup": 1
                    },
                    "375": {
                        "spaceBetween": 0,
                        "slidesPerView": 1,
                        "slidesPerGroup": 1
                    },
                    "667": {
                        "spaceBetween": 30,
                        "slidesPerView": 1,
                        "slidesPerGroup": 1
                    },
                    "767": {
                        "spaceBetween": 30,
                        "slidesPerView": 1,
                        "slidesPerGroup": 1
                    },
                    "991": {
                        "spaceBetween": 30,
                        "slidesPerView": 2,
                        "slidesPerGroup": 2
                    },
                    "1199": {
                        "spaceBetween": 30,
                        "slidesPerView": 3,
                        "slidesPerGroup": 3
                    }
                }}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonials-one__box">
                            <p><span>Stock benefits affords fantastic execution and gadget control services. I am a totally happy client. </span></p>
                            <h3>-	Harsh Gupta</h3> 
                        </div><!-- /.testimonials-one__box -->
                            <div class="testimonials-one__box-info">
                                <img src="assets/images/resources/testimonials-1-1.png" alt="">   
                            </div><!-- /.testimonials-one__box-info -->
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <div class="testimonials-one__box">
                            <p><span>I am very enthusiastic about your organization as I were gaining knowledge of shares for pretty a while and feature now no longer observed an organization with which I experience snug till I reached your net site.</span></p>
                            <h3>-	Rekha Sharma</h3> 
                        </div><!-- /.testimonials-one__box -->
                            <div class="testimonials-one__box-info">
                                <img src="assets/images/resources/testimonials-1-2.png" alt="">
                            </div><!-- /.testimonials-one__box-info -->
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <div class="testimonials-one__box">
                            <p><span>It’s very step-by-step. I got here in understanding not anything in any respect approximately shares, options, and investments. When you don’t recognize what to do, it allows to peer different humans doing it. There’s a lot engagement! </span></p>
                                <h3>-	Himanshu Rawat</h3> 
                        </div><!-- /.testimonials-one__box -->
                            <div class="testimonials-one__box-info">
                                <img src="assets/images/resources/testimonials-1-3.png" alt="">
                            </div><!-- /.testimonials-one__box-info -->
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <div class="testimonials-one__box">
                            <p><span>I am studying a lot approximately technical evaluation now that I am a member to Stock Benefits. This is my favorite internet site ever! It’s really well worth each penny. I actually have carried out my understanding to my inventory alternatives and now I am making money, without a broker! Thanks!</span></p>
                                <h3>-	Ravi Kumar</h3> 
                        </div><!-- /.testimonials-one__box -->
                            <div class="testimonials-one__box-info">
                                <img src="assets/images/resources/testimonials-1-4.png" alt="">
                            </div><!-- /.testimonials-one__box-info -->
                    </div><!-- /.swiper-slide --> 
                </div><!-- /.swiper-wrapper -->

                <div class="testimonials-one__swiper-pagination swiper-pagination"></div><!-- /.testimonials-one__swiper-pagination swiper-pagination -->
            </div><!-- /.thm-swiper__slider -->
        </div>
    </section>
    
<?php include('footer.php');?>
</body>
</html>