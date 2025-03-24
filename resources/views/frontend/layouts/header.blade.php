{{-- 
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <!-- الشعار -->
        <a href="#" class="logo d-flex align-items-center me-auto">
            <h1 class="sitename">تتبع الشحن</h1>
        </a>

        <!-- القائمة -->
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="/" class="active">الرئيسية</a></li>
                <li><a href="{{ route('about') }}">من نحن</a></li>
                <li><a href="{{ route('services') }}">الخدمات</a></li>
                <li><a href="{{ route('pricing') }}">الأسعار</a></li>
                <li class="dropdown">
                    <a href="#"><span>المزيد</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">الأسئلة الشائعة</a></li>
                        <li><a href="#">الشروط والأحكام</a></li>
                        <li><a href="#">سياسة الخصوصية</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('contact') }}">اتصل بنا</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <!-- الأزرار (تسجيل الدخول / لوحة التحكم وطلب خدمة) -->
        <div class="header-buttons d-flex align-items-center">
            @auth
                <!-- إذا كان المستخدم مسجل دخول، عرض زر لوحة التحكم -->
                <a class="btn btn-sm-square btn-primary me-2" href="{{ route('user.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> لوحة التحكم
                </a>
            @else
                <!-- إذا لم يكن مسجل دخول، عرض زر تسجيل الدخول -->
                <a class="btn btn-sm-square btn-primary me-2" href="{{ route('login') }}">
                    <i class="fas fa-user"></i> تسجيل الدخول
                </a>
            @endauth
            <!-- زر طلب خدمة -->
            <a class="btn-getstarted" href="{{ route('get-a-quote') }}">طلب خدمة</a>
        </div>
    </div>
</header> --}}


<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <!-- القائمة (على أقصى اليسار تمامًا) -->
        <nav id="navmenu" class="navmenu" style="margin-right: 30px;">
            <ul>
                <li><a href="/" class="active">الرئيسية</a></li>
                <li><a href="{{ route('about') }}">من نحن</a></li>
                <li><a href="{{ route('services') }}">الخدمات</a></li>
                <li><a href="{{ route('pricing') }}">الأسعار</a></li>
                <li class="dropdown">
                    <a href="#"><span>المزيد</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">الأسئلة الشائعة</a></li>
                        <li><a href="#">الشروط والأحكام</a></li>
                        <li><a href="#">سياسة الخصوصية</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('contact') }}">اتصل بنا</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>





        <div class="d-flex align-items-center gap-3">
            <!-- الأزرار -->
            <div class="header-buttons d-flex align-items-center gap-2">
                @auth
                    <!-- زر لوحة التحكم -->
                    <a class="btn btn-primary action-btn" href="{{ route('user.dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>لوحة التحكم</span>
                    </a>
                @else
                    <!-- زر تسجيل الدخول -->
                    <a class="btn btn-primary action-btn" href="{{ route('login') }}">
                        <i class="fas fa-user"></i>
                        <span>تسجيل الدخول</span>
                    </a>
                @endauth
                <!-- زر طلب خدمة -->
                <a class="btn btn-primary action-btn" href="{{ route('get-a-quote') }}">
                    <i class="fas fa-truck-loading"></i>
                    <span>طلب خدمة</span>
                </a>
            </div>

            <!-- الشعار -->
            <a href="index.html" class="logo d-flex align-items-center">
                <h1 class="sitename">تتبع الشحن</h1>
            </a>
        </div>




    </div>
</header>
