@extends('frontend.layouts.master')


@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(frontend/assets/img/page-title-bg.jpg);">
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(frontend/assets/img/page-title-bg.jpg);">
        <div class="container position-relative">
            <h1>الأسعار</h1>
            <p>اختر الخطة المناسبة لاحتياجاتك واستمتع بخدمات تتبع الشحنات والطرود بكل سهولة.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">الرئيسية</a></li>
                    <li class="current">الأسعار</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Pricing Section -->
    <section id="pricing" class="pricing section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span>الأسعار</span>
            <h2>الأسعار</h2>
            <p>اختر الخطة التي تناسب عملك واستفد من خدماتنا المتقدمة لتتبع الشحنات.</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row gy-4">
                <!-- الخطة المجانية -->
                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="pricing-item">
                        <h3>الخطة المجانية</h3>
                        <h4><sup>$</sup>0<span> / شهر</span></h4>
                        <ul>
                            <li><i class="bi bi-check"></i> <span>تتبع حتى 10 شحنات شهريًا</span></li>
                            <li><i class="bi bi-check"></i> <span>إشعارات عبر البريد الإلكتروني</span></li>
                            <li><i class="bi bi-check"></i> <span>دعم عبر البريد الإلكتروني</span></li>
                            <li class="na"><i class="bi bi-x"></i> <span>تقارير مفصلة</span></li>
                            <li class="na"><i class="bi bi-x"></i> <span>دعم فني على مدار الساعة</span></li>
                        </ul>
                        <a href="#" class="buy-btn">اشترك الآن</a>
                    </div>
                </div><!-- End Pricing Item -->

                <!-- خطة الأعمال -->
                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="pricing-item featured">
                        <h3>خطة الأعمال</h3>
                        <h4><sup>$</sup>29<span> / شهر</span></h4>
                        <ul>
                            <li><i class="bi bi-check"></i> <span>تتبع حتى 50 شحنة شهريًا</span></li>
                            <li><i class="bi bi-check"></i> <span>إشعارات عبر البريد الإلكتروني والرسائل النصية</span></li>
                            <li><i class="bi bi-check"></i> <span>دعم فني عبر البريد الإلكتروني والدردشة</span></li>
                            <li><i class="bi bi-check"></i> <span>تقارير مفصلة شهريًا</span></li>
                            <li><i class="bi bi-check"></i> <span>دعم فني على مدار الساعة</span></li>
                        </ul>
                        <a href="#" class="buy-btn">اشترك الآن</a>
                    </div>
                </div><!-- End Pricing Item -->

                <!-- خطة المطورين -->
                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="pricing-item">
                        <h3>خطة المطورين</h3>
                        <h4><sup>$</sup>49<span> / شهر</span></h4>
                        <ul>
                            <li><i class="bi bi-check"></i> <span>تتبع عدد غير محدود من الشحنات</span></li>
                            <li><i class="bi bi-check"></i> <span>إشعارات عبر البريد الإلكتروني والرسائل النصية</span></li>
                            <li><i class="bi bi-check"></i> <span>دعم فني على مدار الساعة</span></li>
                            <li><i class="bi bi-check"></i> <span>تقارير مفصلة أسبوعية</span></li>
                            <li><i class="bi bi-check"></i> <span>واجهة برمجية (API) للتكامل</span></li>
                        </ul>
                        <a href="#" class="buy-btn">اشترك الآن</a>
                    </div>
                </div><!-- End Pricing Item -->
            </div>
        </div>
    </section><!-- /Pricing Section -->

    <!-- Alt Pricing Section -->
    <section id="alt-pricing" class="alt-pricing section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span>خطط بديلة</span>
            <h2>خطط بديلة</h2>
            <p>اختر من بين خططنا البديلة التي تناسب احتياجاتك الخاصة.</p>
        </div><!-- End Section Title -->

        <div class="container">
            <!-- الخطة المجانية -->
            <div class="row gy-4 pricing-item" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-3 d-flex align-items-center justify-content-center">
                    <h3>الخطة المجانية</h3>
                </div>
                <div class="col-lg-3 d-flex align-items-center justify-content-center">
                    <h4><sup>$</sup>0<span> / شهر</span></h4>
                </div>
                <div class="col-lg-3 d-flex align-items-center justify-content-center">
                    <ul>
                        <li><i class="bi bi-check"></i> <span>تتبع حتى 10 شحنات شهريًا</span></li>
                        <li><i class="bi bi-check"></i> <span>إشعارات عبر البريد الإلكتروني</span></li>
                        <li class="na"><i class="bi bi-x"></i> <span>تقارير مفصلة</span></li>
                    </ul>
                </div>
                <div class="col-lg-3 d-flex align-items-center justify-content-center">
                    <div class="text-center"><a href="#" class="buy-btn">اشترك الآن</a></div>
                </div>
            </div><!-- End Pricing Item -->

            <!-- خطة الأعمال -->
            <div class="row gy-4 pricing-item featured mt-4" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-3 d-flex align-items-center justify-content-center">
                    <h3>خطة الأعمال</h3>
                </div>
                <div class="col-lg-3 d-flex align-items-center justify-content-center">
                    <h4><sup>$</sup>29<span> / شهر</span></h4>
                </div>
                <div class="col-lg-3 d-flex align-items-center justify-content-center">
                    <ul>
                        <li><i class="bi bi-check"></i> <span>تتبع حتى 50 شحنة شهريًا</span></li>
                        <li><i class="bi bi-check"></i> <strong>إشعارات عبر البريد الإلكتروني والرسائل النصية</strong></li>
                        <li><i class="bi bi-check"></i> <span>دعم فني عبر البريد الإلكتروني والدردشة</span></li>
                    </ul>
                </div>
                <div class="col-lg-3 d-flex align-items-center justify-content-center">
                    <div class="text-center"><a href="#" class="buy-btn">اشترك الآن</a></div>
                </div>
            </div><!-- End Pricing Item -->

            <!-- خطة المطورين -->
            <div class="row gy-4 pricing-item mt-4" data-aos="fade-up" data-aos-delay="300">
                <div class="col-lg-3 d-flex align-items-center justify-content-center">
                    <h3>خطة المطورين</h3>
                </div>
                <div class="col-lg-3 d-flex align-items-center justify-content-center">
                    <h4><sup>$</sup>49<span> / شهر</span></h4>
                </div>
                <div class="col-lg-3 d-flex align-items-center justify-content-center">
                    <ul>
                        <li><i class="bi bi-check"></i> <span>تتبع عدد غير محدود من الشحنات</span></li>
                        <li><i class="bi bi-check"></i> <span>إشعارات عبر البريد الإلكتروني والرسائل النصية</span></li>
                        <li><i class="bi bi-check"></i> <span>دعم فني على مدار الساعة</span></li>
                    </ul>
                </div>
                <div class="col-lg-3 d-flex align-items-center justify-content-center">
                    <div class="text-center"><a href="#" class="buy-btn">اشترك الآن</a></div>
                </div>
            </div><!-- End Pricing Item -->
        </div>
    </section><!-- /Alt Pricing Section -->


@endsection
