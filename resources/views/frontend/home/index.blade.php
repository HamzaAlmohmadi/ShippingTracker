<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>تتبع الشحن - نظام تتبع الطرود</title>
    <meta name="description" content="نظام تتبع الشحن والطرود - تتبع شحنتك بسهولة">
    <meta name="keywords" content="تتبع الشحن, تتبع الطرود, نظام التتبع, شحن سريع">

    @include('frontend.layouts.head')

    <!-- إضافة CSS لتعديلات RTL -->
    <style>
        /* تعديلات عامة للاتجاه RTL */
        body {
            text-align: right;
            direction: rtl;
        }

        /* تعديلات للقوائم */
        .navmenu ul {
            padding-right: 0;
        }

        /* تعديلات للأيقونات */
        .bi-chevron-down::before {
            margin-left: 0.5rem;
            margin-right: 0;
        }

        /* تعديلات للأزرار */
        .btn-getstarted {
            margin-left: 0;
            margin-right: 1rem;
        }

        /* تعديلات للفوتر */
        .footer-links ul {
            padding-right: 0;
        }

        /* تعديلات للأسئلة الشائعة */
        .faq-item {
            text-align: right;
        }

        .faq-toggle {
            left: 0;
            right: auto;
        }
    </style>
</head>

<body class="index-page">

    {{-- <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <h1 class="sitename">تتبع الشحن</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="index.html" class="active">الرئيسية</a></li>
                    <li><a href="about.html">من نحن</a></li>
                    <li><a href="services.html">الخدمات</a></li>
                    <li><a href="pricing.html">الأسعار</a></li>
                    <li class="dropdown"><a href="#"><span>المزيد</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#">الأسئلة الشائعة</a></li>
                            <li><a href="#">الشروط والأحكام</a></li>
                            <li><a href="#">سياسة الخصوصية</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">اتصل بنا</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="get-a-quote.html">طلب خدمة</a>
        </div>
    </header> --}}

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <!-- الشعار -->
            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <h1 class="sitename">تتبع الشحن</h1>
            </a>

            <!-- القائمة -->
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="index.html" class="active">الرئيسية</a></li>
                    <li><a href="about.html">من نحن</a></li>
                    <li><a href="services.html">الخدمات</a></li>
                    <li><a href="pricing.html">الأسعار</a></li>
                    <li class="dropdown">
                        <a href="#"><span>المزيد</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#">الأسئلة الشائعة</a></li>
                            <li><a href="#">الشروط والأحكام</a></li>
                            <li><a href="#">سياسة الخصوصية</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">اتصل بنا</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        <!-- أيقونة تسجيل الدخول -->
        <a class="btn btn-sm-square btn-primary me-2" href="{{ route('login') }}">
            <i class="fas fa-user"></i> <!-- أيقونة تسجيل الدخول -->
        </a>
        {{-- <div class="login-icon me-3" onclick="window.location.href='{{ route('login') }}'">
            <i class="bi bi-person"></i> <!-- أيقونة تسجيل الدخول -->
        </div> --}}

            <!-- زر طلب خدمة -->
            <a class="btn-getstarted" href="get-a-quote.html">طلب خدمة</a>
        </div>
    </header>


    <main class="main">

        <!-- Hero Section -->
        @include('frontend.home.hero')
        <!-- /Hero Section -->

        <!-- Featured Services Section -->
        @include('frontend.home.featured')
        <!-- /Featured Services Section -->

        <!-- About Section -->
        @include('frontend.home.about')
        <!-- /About Section -->

        <!-- Services Section -->
        @include('frontend.home.services')
        <!-- /Services Section -->

        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section dark-background">
            <img src="assets/img/cta-bg.jpg" alt="">
            <div class="container">
                <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-10">
                        <div class="text-center">
                            <h3>ابدأ التتبع الآن</h3>
                            <p>تتبع شحنتك بسهولة وسرعة. أدخل رقم الطرد للحصول على تفاصيل الشحن.</p>
                            <a class="cta-btn" href="#">تتبع الشحنة</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Call To Action Section -->

        <!-- Features Section -->
        @include('frontend.home.features')
        <!-- /Features Section -->

        <!-- Pricing Section -->
        @include('frontend.home.pricing')
        <!-- /Pricing Section -->

        <!-- Testimonials Section -->
        @include('frontend.home.testimonials')
        <!-- /Testimonials Section -->

        <!-- Faq Section -->
        @include('frontend.home.faq')
        <!-- /Faq Section -->

    </main>

    @include('frontend.layouts.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Preloader -->
    <div id="preloader"></div>

    @include('frontend.layouts.scripts')

</body>

</html>
