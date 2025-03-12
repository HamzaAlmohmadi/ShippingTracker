<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>General Dashboard &mdash; Stisla</title>

@include('admin.layouts.head')

{{-- @vite(['resources/js/app.js', 'resources/js/admin.js']) --}}
@vite(['resources/js/app.js'])

</head>

<body dir="rtl">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <!-- Navbar Content -->
            @include('admin.layouts.navbar')
            <!-- Navbar Content End-->

            <!-- sidebar Content -->
            @include('admin.layouts.sidebar')
            <!-- sidebar Content -->

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>

        </div>
    </div>

    @include('admin.layouts.footer-scripts')
</body>

</html>
