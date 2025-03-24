




<!-- Hero Section -->
<section id="hero" class="hero section dark-background">

    <img src="frontend/assets/img/world-dotted-map.png" alt="خريطة العالم" class="hero-bg" data-aos="fade-in">

    <div class="container">
        <div class="row gy-4 d-flex justify-content-between">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h2 data-aos="fade-up">شحن سريع وموثوق إلى أي مكان!</h2>
                <p data-aos="fade-up" data-aos-delay="100">
                    نحن نضمن توصيل شحناتك بسرعة وأمان، مع نظام تتبع لحظي وفرق متخصصة لضمان تجربة سلسة واحترافية.
                </p>

                {{-- <form action="{{ route('shipment-tracking') }}" method="GET" class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up"
                    data-aos-delay="200">
                    <input type="text" class="form-control" placeholder="أدخل رقم التتبع الخاص بك">
                    <button type="submit" class="btn btn-primary">تتبع الآن</button>
                </form> --}}

                <form action="{{ route('shipment-tracking') }}" method="GET" class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
                    <input type="text" class="form-control" name="tracker" placeholder="أدخل رقم التتبع الخاص بك">
                    <button type="submit" class="btn btn-primary">تتبع الآن</button>
                </form>
                <div class="row gy-4" data-aos="fade-up" data-aos-delay="300">

                    <div class="col-lg-3 col-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="5000"
                                data-purecounter-duration="0" class="purecounter">5000+</span>
                            <p>شحنة يوميًا</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="150"
                                data-purecounter-duration="0" class="purecounter">150+</span>
                            <p>دولة مشمولة</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="98"
                                data-purecounter-duration="0" class="purecounter">98%</span>
                            <p>معدل رضا العملاء</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="0"
                                class="purecounter">24/7</span>
                            <p>دعم العملاء</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>
                <a href="#" class="btn btn-secondary mt-2">ابدأ الشحن</a>


            </div>

            <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                <img src="{{ asset('frontend/assets/img/hero-img.svg') }}" class="img-fluid mb-3 mb-lg-0" alt="تتبع الشحنات">
            </div>

        </div>
    </div>

</section>
<!-- /Hero Section -->
