





<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <!-- العلامة التجارية -->
        <div class="sidebar-brand">
            <a href="">تتبع الشحن والطرود</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="">||</a>
        </div>

        <!-- القائمة الجانبية -->
        <ul class="sidebar-menu">
            <!-- لوحة التحكم -->
            <li class="menu-header">لوحة التحكم</li>
            <li class="dropdown active">
                <a href="#" class="nav-link"><i class="fas fa-fire"></i><span>لوحة التحكم</span></a>
            </li>
            <br>

            <!-- التقارير -->
            <li class="menu-header">التقارير</li>
            <li>
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-chart-line"></i><span>التقارير</span>
                </a>
            </li>
            <br>



            <li class="menu-header">إدارة الشحنات</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i
                        class="fas fa-shipping-fast"></i><span>الشحنات</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.shipment.index') }}"><i
                                class="fas fa-shipping-fast"></i><span>
                                عرض الشحنات</span></a></li>

                    <li>
                        <a class="nav-link" href="{{ route('admin.shipment.create') }}">
                            <i class="fas fa-plus-circle"></i><span>إضافة شحنة</span>
                        </a>
                    </li>
                </ul>


            </li>
            <br>

            <!-- تتبع حالات الشحناتتتبع حالات الشحنات -->
            <li class="menu-header"> تتبع حالات الشحنات</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-truck"></i> <!-- أيقونة الشحنات -->
                    <span>إدارة الشحنات</span>
                </a>
                <ul class="dropdown-menu">

                    <!-- كل الشحنات -->
                    <li>
                        <a class="nav-link" href="{{ route('admin.shipment.allShipments') }}">
                            <i class="fas fa-shipping-fast"></i> <!-- أيقونة الشحنات -->
                            <span> كل الشحنات</span>
                        </a>
                    </li>


                    <!-- الشحنات قيد الانتظار -->
                    <li>
                        <a class="nav-link" href="{{ route('admin.shipment.pendingShipments') }}">
                            <i class="fas fa-clock"></i> <!-- أيقونة الساعة -->
                            <span>الشحنات قيد الانتظار</span>
                        </a>
                    </li>

                    <!-- الشحنات المستلمة -->
                    <li>
                        <a class="nav-link" href="{{ route('admin.shipment.receivedShipments') }}">
                            <i class="fas fa-check-circle"></i> <!-- أيقونة التأكيد -->
                            <span>الشحنات المستلمة</span>
                        </a>
                    </li>

                    <!-- الشحنات في الطريق -->
                    <li>
                        <a class="nav-link" href="{{ route('admin.shipment.inTransitShipments') }}">
                            <i class="fas fa-shipping-fast"></i> <!-- أيقونة الشحن السريع -->
                            <span>الشحنات في الطريق</span>
                        </a>
                    </li>

                    <!-- الشحنات قيد التخليص الجمركي -->
                    <li>
                        <a class="nav-link" href="{{ route('admin.shipment.customsClearanceShipments') }}">
                            <i class="fas fa-passport"></i> <!-- أيقونة الجواز (تمثيل الجمارك) -->
                            <span>الشحنات قيد التخليص الجمركي</span>
                        </a>
                    </li>

                    <!-- الشحنات المحتجزة في الجمارك -->
                    <li>
                        <a class="nav-link" href="{{ route('admin.shipment.customsClearanceShipments') }}">
                            <i class="fas fa-ban"></i> <!-- أيقونة المنع -->
                            <span>الشحنات المحتجزة في الجمارك</span>
                        </a>
                    </li>

                    <!-- الشحنات في مركز التوزيع -->
                    <li>
                        <a class="nav-link" href="{{ route('admin.shipment.inTransitShipments') }}">
                            <i class="fas fa-warehouse"></i> <!-- أيقونة المستودع -->
                            <span>الشحنات في مركز التوزيع</span>
                        </a>
                    </li>

                    <!-- الشحنات في الطريق للتوصيل -->
                    <li>
                        <a class="nav-link" href="{{ route('admin.shipment.inTransitShipments') }}">
                            <i class="fas fa-truck-loading"></i> <!-- أيقونة التحميل -->
                            <span>الشحنات في الطريق للتوصيل</span>
                        </a>
                    </li>

                    <!-- الشحنات التي تم توصيلها -->
                    <li>
                        <a class="nav-link" href="{{ route('admin.shipment.deliveredShipments') }}">
                            <i class="fas fa-check-double"></i> <!-- أيقونة التأكيد المزدوج -->
                            <span>الشحنات التي تم توصيلها</span>
                        </a>
                    </li>

                    <!-- الشحنات المتأخرة -->
                    <li>
                        <a class="nav-link" href="#">
                            <i class="fas fa-exclamation-triangle"></i> <!-- أيقونة التحذير -->
                            <span>الشحنات المتأخرة</span>
                        </a>
                    </li>

                    <!-- الشحنات التي تم إرجاعها -->
                    <li>
                        <a class="nav-link" href="#">
                            <i class="fas fa-undo"></i> <!-- أيقونة الإرجاع -->
                            <span>الشحنات التي تم إرجاعها</span>
                        </a>
                    </li>

                    <!-- الشحنات الملغاة -->
                    <li>
                        <a class="nav-link" href="{{ route('admin.shipment.canceledShipments') }}">
                            <i class="fas fa-times-circle"></i> <!-- أيقونة الإلغاء -->
                            <span>الشحنات الملغاة</span>
                        </a>
                    </li>
                </ul>
            </li>
            <br>


            <!-- إدارة السائقين -->
            <li class="menu-header">إدارة السائقين</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-users"></i><span>السائقين</span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('drivers.create') }}">
                            <i class="fas fa-user-plus"></i><span>إضافة سائق</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('drivers.index') }}">
                            <i class="fas fa-users"></i><span>عرض السائقين</span>
                        </a>
                    </li>
                </ul>
            </li>
            <br>

            <!-- إدارة الشاحنات -->
            <li class="menu-header">إدارة الشاحنات</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-truck"></i><span>الشاحنات</span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('trucks.create') }}">
                            <i class="fas fa-plus-circle"></i><span>إضافة شاحنة</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('trucks.index') }}">
                            <i class="fas fa-truck"></i><span>عرض الشاحنات</span>
                        </a>
                    </li>
                </ul>
            </li>
            <br>






            <br>
        </ul>
    </aside>
</div>









