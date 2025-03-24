<!DOCTYPE html>

<html lang="ar" dir="rtl">


<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('frontend.dashboard.layouts.header')

</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('frontend.dashboard.layouts.aside')

            <!-- Layout container -->
            <div class="layout-page">
                @include('frontend.dashboard.layouts.nav')

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    @yield('content')
                    <!-- / Content -->

                    <!-- Footer -->
                    {{-- @include('frontend.dashboard.layouts.footer') --}}
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    
    @include('frontend.dashboard.layouts.script')
    
    @stack('scripts')
</body>

</html>
