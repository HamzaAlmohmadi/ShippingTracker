{{-- <!DOCTYPE html>
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


        /* تخصيص القسم للغة العربية */
        #featured-services .service-item {
            direction: rtl;
            /* اتجاه النص من اليمين إلى اليسار */
            text-align: right;
            /* محاذاة النص لليمين */
        }

        #featured-services .icon {
            margin-left: 20px;
            /* مسافة بين الأيقونة والنص */
            margin-right: 0;
            /* إزالة المسافة الافتراضية */
        }

        #featured-services .content {
            flex: 1;
            /* لجعل المحتوى يأخذ المساحة المتبقية */
        }

        #featured-services .readmore {
            display: flex;
            align-items: center;
            gap: 5px;
            /* مسافة بين النص والأيقونة */
        }

        #featured-services .readmore i {
            transform: rotate(180deg);
            /* تدوير الأيقونة لتناسب الاتجاه */
        }

        /* تخصيص القسم للغة العربية */
        #about .content {
            direction: rtl;
            /* اتجاه النص من اليمين إلى اليسار */
            text-align: right;
            /* محاذاة النص لليمين */
        }

        #about ul {
            list-style: none;
            /* إزالة النقاط الافتراضية */
            padding: 0;
            /* إزالة الحشوة الافتراضية */
        }

        #about ul li {
            display: flex;
            align-items: flex-start;
            /* محاذاة العناصر من الأعلى */
            margin-bottom: 20px;
            /* مسافة بين العناصر */
        }

        #about ul li i {
            /* font-size: 24px; */
            /* حجم الأيقونة */
            color: #007bff;
            /* لون الأيقونة */
            margin-left: 15px;
            /* مسافة بين الأيقونة والنص */
            margin-right: 0;
            /* إزالة المسافة الافتراضية */
        }

        #about ul li .text-content {
            flex: 1;
            /* لجعل النص يأخذ المساحة المتبقية */
        }

        #about ul li h5 {
            font-size: 18px;
            /* حجم العنوان */
            color: #333;
            /* لون العنوان */
            margin-bottom: 5px;
            /* مسافة بين العنوان والنص */
        }

        #about ul li p {
            font-size: 14px;
            /* حجم النص */
            color: #555;
            /* لون النص */
            margin: 0;
            /* إزالة الهوامش الافتراضية */
        }
    </style>
    @stack('css')
</head>

<body class="index-page">


    @include('frontend.layouts.header')

    <main class="main">
        @yield('content')
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

 --}}




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



        .action-btn {
            width: 40px;
            /* حجم الزر الافتراضي */
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
            overflow: hidden;
            position: relative;
            padding: 5px 10px;
        }

        .action-btn i {
            font-size: 18px;
            transition: transform 0.3s ease-in-out;
        }

        .action-btn span {
            opacity: 0;
            /* إخفاء النص افتراضيًا */
            max-width: 0;
            overflow: hidden;
            white-space: nowrap;
            transition: all 0.3s ease-in-out;
            margin-left: 8px;
            font-size: 14px;
        }

        .action-btn:hover {
            width: 130px;
            /* توسعة الزر عند التحويم */
            justify-content: flex-start;
        }

        .action-btn:hover i {
            transform: scale(1.2);
            /* تكبير الأيقونة */
        }

        .action-btn:hover span {
            opacity: 1;
            /* إظهار النص */
            max-width: 100px;
        }
    </style>
</head>

<body class="index-page">


    @include('frontend.layouts.header')

    <main class="main">



        @yield('content')

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
