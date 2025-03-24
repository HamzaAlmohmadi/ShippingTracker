@extends('frontend.layouts.master')


@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade"
        style="background-image: url(frontend/assets/img/page-title-bg.jpg);">
        <div class="container position-relative">
            <h1>تتبع الشحن والطرود</h1>
            <p>نقدم لكم حلولًا متكاملة لتتبع شحناتكم وطرودكم بكل سهولة وشفافية.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">الرئيسية</a></li>
                    <li class="current">تتبع الشحن</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    {{-- <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon flex-shrink-0"><i class="fa-solid fa-map-marker-alt"></i></div>
                    <div>
                        <h4 class="title">تتبع في الوقت الحقيقي</h4>
                        <p class="description">احصل على تحديثات فورية عن موقع شحنتك في أي وقت ومن أي مكان.</p>
                        <a href="#" class="readmore stretched-link"><span>المزيد</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon flex-shrink-0"><i class="fa-solid fa-bell"></i></div>
                    <div>
                        <h4 class="title">إشعارات التحديثات</h4>
                        <p class="description">تلقى إشعارات فورية عند أي تغيير في حالة الشحنة.</p>
                        <a href="#" class="readmore stretched-link"><span>المزيد</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon flex-shrink-0"><i class="fa-solid fa-history"></i></div>
                    <div>
                        <h4 class="title">سجل التتبع</h4>
                        <p class="description">اطلع على سجل كامل لحركة الشحنة من البداية حتى الوصول.</p>
                        <a href="#" class="readmore stretched-link"><span>المزيد</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div><!-- End Service Item -->
            </div>
        </div>
    </section><!-- /Featured Services Section -->

 --}}


    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">

        <div class="container">

            <div class="row gy-4">

                <!-- خدمة تتبع الشحن -->
                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon flex-shrink-0"><i class="fa-solid fa-location-dot"></i></div>
                    <div>
                        <h4 class="title">تتبع الشحنة</h4>
                        <p class="description">
                            تتبع شحنتك بسهولة مع تحديثات فورية عن حالة الطرد. أدخل رقم الطرد واحصل على تفاصيل الشحن في أي
                            وقت.
                        </p>
                        <a href="#" class="readmore stretched-link">
                            <span>تعرف أكثر</span>
                            <i class="bi bi-arrow-left"></i> <!-- تم تعديل الاتجاه ليتناسب مع اللغة العربية -->
                        </a>
                    </div>
                </div>
                <!-- End Service Item -->

                <!-- خدمة الشحن السريع -->
                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon flex-shrink-0"><i class="fa-solid fa-truck-fast"></i></div>
                    <div>
                        <h4 class="title">شحن سريع</h4>
                        <p class="description">
                            نوفر خدمة شحن سريعة وآمنة لتوصيل الطرود في أسرع وقت ممكن. نضمن وصول شحنتك بسلام.
                        </p>
                        <a href="#" class="readmore stretched-link">
                            <span>تعرف أكثر</span>
                            <i class="bi bi-arrow-left"></i>
                        </a>
                    </div>
                </div>
                <!-- End Service Item -->

                <!-- خدمة الدعم الفني -->
                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon flex-shrink-0"><i class="fa-solid fa-headset"></i></div>
                    <div>
                        <h4 class="title">دعم فني</h4>
                        <p class="description">
                            فريق دعم فني متاح على مدار الساعة لمساعدتك في أي استفسار أو مشكلة تواجهها أثناء تتبع شحنتك.
                        </p>
                        <a href="#" class="readmore stretched-link">
                            <span>تعرف أكثر</span>
                            <i class="bi bi-arrow-left"></i>
                        </a>
                    </div>
                </div>
                <!-- End Service Item -->

            </div>

        </div>

    </section>
    <!-- /Featured Services Section -->



    <!-- Services Section -->
    <section id="services" class="services section">
        <div class="container section-title" data-aos="fade-up">
            <span>خدماتنا<br></span>
            <h2>خدمات التتبع</h2>
            <p>نقدم لكم مجموعة واسعة من الخدمات لتتبع شحناتكم بكل دقة.</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <div class="card-img">
                            <img src="frontend/assets/img/service-1.jpg" alt="" class="img-fluid">
                        </div>
                        <h3>تتبع الشحنات الدولية</h3>
                        <p>نقدم خدمة تتبع الشحنات الدولية بكل تفاصيلها من البداية حتى الوصول.</p>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card">
                        <div class="card-img">
                            <img src="frontend/assets/img/service-2.jpg" alt="" class="img-fluid">
                        </div>
                        <h3><a href="#" class="stretched-link">تتبع الشحنات المحلية</a></h3>
                        <p>خدمة تتبع الشحنات المحلية مع تحديثات فورية عن حالة الشحنة.</p>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card">
                        <div class="card-img">
                            <img src="frontend/assets/img/service-3.jpg" alt="" class="img-fluid">
                        </div>
                        <h3><a href="#" class="stretched-link">تتبع الطرود السريعة</a></h3>
                        <p>خدمة تتبع خاصة للطرود السريعة مع إشعارات فورية.</p>
                    </div>
                </div><!-- End Card Item -->
            </div>
        </div>
    </section><!-- /Services Section -->

    <!-- Features Section -->
    <section id="features" class="features section">
        <div class="container section-title" data-aos="fade-up">
            <span>المميزات<br></span>
            <h2>مميزات نظام التتبع</h2>
            <p>نقدم لكم نظام تتبع متكامل مع مميزات فريدة لتسهيل متابعة شحناتكم.</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row gy-4 align-items-center features-item">
                <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
                    <img src="frontend/assets/img/features-1.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
                    <h3>تتبع في الوقت الفعلي</h3>
                    <p class="fst-italic">
                        احصل على تحديثات فورية عن موقع شحنتك في أي وقت ومن أي مكان.
                    </p>
                    <ul>
                        <li><i class="bi bi-check"></i><span> تحديثات فورية عن حالة الشحنة.</span></li>
                        <li><i class="bi bi-check"></i> <span>إشعارات عند كل تغيير في حالة الشحنة.</span></li>
                        <li><i class="bi bi-check"></i> <span>سجل كامل لحركة الشحنة.</span></li>
                    </ul>
                </div>
            </div><!-- Features Item -->
        </div>
    </section><!-- /Features Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section dark-background">
        <img src="frontend/assets/img/testimonials-bg.jpg" class="testimonials-bg" alt="">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper init-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="frontend/assets/img/testimonials/testimonials-1.jpg" class="testimonial-img"
                                alt="">
                            <h3>محمد أحمد</h3>
                            <h4>مدير شركة</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>خدمة التتبع ممتازة وسهلة الاستخدام، ساعدتني في متابعة شحناتي بكل دقة.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section><!-- /Testimonials Section -->

    <!-- Faq Section -->
    <section id="faq" class="faq section">
        <div class="container section-title" data-aos="fade-up">
            <span>الأسئلة الشائعة<br></span>
            <h2>أسئلة شائعة حول التتبع</h2>
            <p>إجابات على الأسئلة الأكثر شيوعًا حول خدمات تتبع الشحن.</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="faq-container">
                        <div class="faq-item faq-active" data-aos="fade-up" data-aos-delay="200">
                            <i class="faq-icon bi bi-question-circle"></i>
                            <h3>كيف يمكنني تتبع شحنتي؟</h3>
                            <div class="faq-content">
                                <p>يمكنك تتبع شحنتك عن طريق إدخال رقم التتبع في الحقل المخصص على موقعنا.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                            <i class="faq-icon bi bi-question-circle"></i>
                            <h3>ما هي المدة التي يستغرقها التتبع؟</h3>
                            <div class="faq-content">
                                <p>يتم تحديث معلومات التتبع في الوقت الفعلي، لذا يمكنك الحصول على آخر التحديثات فورًا.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Faq Section -->
@endsection
