










{{-- <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                            <g id="Icon" transform="translate(27.000000, 15.000000)">
                                <g id="Mask" transform="translate(0.000000, 8.000000)">
                                    <use fill="#696cff"></use>
                                </g>
                                <g id="Triangle"
                                    transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                                    <use fill="#696cff"></use>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">تتبع الشحن</span>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- الرئيسية -->
        <li class="menu-item">
            <a href="{{ route('user.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>الصفحة الرئيسية</div>
            </a>
        </li>

        <!-- تتبع الطرود -->
        <li class="menu-item">
            <a href="{{ route('user.shipment-tracking.track') }}" class="menu-link">
                <i class='menu-icon bx bx-package'></i>
                <div>تتبع الطرود</div>
            </a>
        </li>

        <!-- إضافة طرد جديد -->
        <li class="menu-item">
            <a href="{{ route('user.shipments.index') }}" class="menu-link">
                <i class='menu-icon bx bx-plus-circle'></i>
                <div>إضافة شحنة جديد</div>
            </a>
        </li>

        <!-- الإشعارات -->
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class='menu-icon bx bx-bell'></i>
                <div>الإشعارات</div>
            </a>
        </li>

        <!-- التقارير -->
        <li class="menu-item">
            <a href="{{ route('user.dashboard.reports') }}" class="menu-link">
                <i class='menu-icon bx bx-line-chart'></i>
                <div>التقارير</div>
            </a>
        </li>

        <!-- الإعدادات -->
        <li class="menu-item">
            <a href="{{ route('product-traking.index') }}" class="menu-link">
                <i class='menu-icon bx bx-cog'></i>
                <div>الإعدادات</div>
            </a>
        </li>

        <!-- الدعم الفني -->
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class='menu-icon bx bx-support'></i>
                <div>الدعم الفني</div>
            </a>
        </li>
    </ul>
</aside> --}}



<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                            <g id="Icon" transform="translate(27.000000, 15.000000)">
                                <g id="Mask" transform="translate(0.000000, 8.000000)">
                                    <use fill="#696cff"></use>
                                </g>
                                <g id="Triangle"
                                    transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                                    <use fill="#696cff"></use>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">اهلا بك  {{ Auth::user()->name }}</span>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- الرئيسية -->
        <li class="menu-item">
            <a href="{{ route('user.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>الصفحة الرئيسية</div>
            </a>
        </li>

        <!-- الشحنات -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">إدارة الشحنات</span>
        </li>
        <li class="menu-item">
            <a href="{{ route('user.shipment-tracking.track') }}" class="menu-link">
                <i class='menu-icon bx bx-map'></i>
                <div>تتبع الشحنات</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('user.shipments.index') }}" class="menu-link">
                <i class='menu-icon bx bx-plus'></i>
                <div>إضافة شحنة جديدة</div>
            </a>
        </li>

        <!-- الإشعارات -->
        {{-- <li class="menu-header small text-uppercase">
            <span class="menu-header-text">الإشعارات</span>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class='menu-icon bx bx-bell'></i>
                <div>الإشعارات</div>
                <span class="badge bg-danger rounded-pill ms-auto">4</span> <!-- عدد الإشعارات غير المقروءة -->
            </a>
        </li> --}}

        <!-- التقارير -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">التقارير والإحصائيات</span>
        </li>
        <li class="menu-item">
            <a href="{{ route('user.dashboard.reports') }}" class="menu-link">
                <i class='menu-icon bx bx-line-chart'></i>
                <div>التقارير</div>
            </a>
        </li>

        <!-- الإعدادات -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">الإعدادات</span>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class='menu-icon bx bx-user'></i>
                <div>الملف الشخصي</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class='menu-icon bx bx-cog'></i>
                <div>إعدادات الحساب</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class='menu-icon bx bx-support'></i>
                <div>الدعم الفني</div>
            </a>
        </li>

        <!-- تسجيل الخروج -->
        <li class="menu-item">
            <a href="{{ route('logout') }}" class="menu-link">
                <i class='menu-icon bx bx-log-out'></i>
                <div>تسجيل الخروج</div>
            </a>
        </li>
    </ul>
</aside>