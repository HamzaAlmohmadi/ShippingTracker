@extends('frontend.layouts.master')


@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade"
        style="background-image: url(frontend/assets/img/page-title-bg.jpg);">
        <div class="container position-relative">
            <h1>من نحن</h1>
            <p>نحن شركة متخصصة في تتبع الشحنات والطرود، نقدم حلولًا ذكية لتلبية احتياجات عملائنا.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">الرئيسية</a></li>
                    <li class="current">من نحن</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->



    <!-- About Section -->
    <section id="about" class="about section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 position-relative align-self-start order-lg-last order-first" data-aos="fade-up"
                    data-aos-delay="200">
                    <img src="{{ asset('frontend/assets/img/about.jpg') }}" class="img-fluid" alt="من نحن">
                    <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
                </div>

                <div class="col-lg-6 content order-last order-lg-first" data-aos="fade-up" data-aos-delay="100">
                    <h3>من نحن</h3>
                    <p>
                        نحن شركة رائدة في مجال تتبع الشحنات والطرود، نقدم خدمات عالية الجودة لتلبية احتياجات عملائنا. نحرص
                        على توفير حلول مبتكرة وموثوقة لضمان وصول شحناتك بأمان وسرعة.
                    </p>
                    <ul>
                        <li>
                            <i class="bi bi-diagram-3"></i>
                            <div class="text-content">
                                <h5>تتبع الشحنات في الوقت الفعلي</h5>
                                <p>نوفر لك نظامًا متقدمًا لتتبع شحناتك في الوقت الفعلي، مما يضمن لك الراحة والاطمئنان.</p>
                            </div>
                        </li>
                        <li>
                            <i class="bi bi-fullscreen-exit"></i>
                            <div class="text-content">
                                <h5>خدمة عملاء على مدار الساعة</h5>
                                <p>فريق دعمنا متاح على مدار الساعة لمساعدتك في أي استفسارات أو مشكلات تواجهها.</p>
                            </div>
                        </li>
                        <li>
                            <i class="bi bi-broadcast"></i>
                            <div class="text-content">
                                <h5>حلول متكاملة للشحن</h5>
                                <p>نقدم حلولًا شاملة لإدارة الشحنات، بدءًا من التتبع وحتى التسليم النهائي.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="5000" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>شحنة تم تتبعها</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="1000" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>عميل راضٍ</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>دعم على مدار الساعة</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>شركاء شحن</p>
                    </div>
                </div><!-- End Stats Item -->
            </div>
        </div>
    </section><!-- /Stats Section -->

    <!-- Team Section -->
    <section id="team" class="team section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span>فريقنا</span>
            <h2>فريقنا</h2>
            <p>فريقنا المختص يعمل بجد لتقديم أفضل الخدمات لعملائنا.</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <img src="{{ asset('frontend/assets/img/team/team-1.jpg') }}" class="img-fluid" alt="فريق العمل">
                        <div class="member-content">
                            <h4>أحمد محمد</h4>
                            <span>مدير العمليات</span>
                            <p>
                                أحمد مسؤول عن إدارة عمليات الشحن والتوصيل لضمان وصول الشحنات في الوقت المحدد.
                            </p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter-x"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Team Member -->

                <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="member">
                        <img src="{{ asset('frontend/assets/img/team/team-2.jpg') }}" class="img-fluid" alt="فريق العمل">
                        <div class="member-content">
                            <h4>فاطمة علي</h4>
                            <span>مديرة خدمة العملاء</span>
                            <p>
                                فاطمة مسؤولة عن توفير الدعم والمساعدة لعملائنا على مدار الساعة.
                            </p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter-x"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Team Member -->

                <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                    <div class="member">
                        <img src="{{ asset('frontend/assets/img/team/team-3.jpg') }}" class="img-fluid" alt="فريق العمل">
                        <div class="member-content">
                            <h4>خالد سعيد</h4>
                            <span>مطور النظام</span>
                            <p>
                                خالد مسؤول عن تطوير وتحسين نظام تتبع الشحنات لتلبية احتياجات عملائنا.
                            </p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter-x"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Team Member -->
            </div>
        </div>
    </section><!-- /Team Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section dark-background">
        <img src="{{ asset('frontend/assets/img/testimonials-bg.jpg') }}" class="testimonials-bg"
            alt="خلفية آراء العملاء">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
          {
            "loop": true,
            "speed": 600,
            "autoplay": {
              "delay": 5000
            },
            "slidesPerView": "auto",
            "pagination": {
              "el": ".swiper-pagination",
              "type": "bullets",
              "clickable": true
            }
          }
        </script>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('frontend/assets/img/testimonials/testimonials-1.jpg') }}"
                                class="testimonial-img" alt="رأي العميل">
                            <h3>سالم أحمد</h3>
                            <h4>مدير شركة</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>خدمة ممتازة! نظام التتبع سهل الاستخدام ويوفر تحديثات دقيقة عن شحناتي.</span>
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
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span>الأسئلة الشائعة</span>
            <h2>الأسئلة الشائعة</h2>
            <p>إجابات على الأسئلة الأكثر شيوعًا حول نظام تتبع الشحنات.</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="faq-container">
                        <div class="faq-item faq-active" data-aos="fade-up" data-aos-delay="200">
                            <i class="faq-icon bi bi-question-circle"></i>
                            <h3>كيف يمكنني تتبع شحنتي؟</h3>
                            <div class="faq-content">
                                <p>يمكنك تتبع شحنتك باستخدام رقم التتبع الموجود في إيصال الشحن.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Faq Section -->
@endsection
