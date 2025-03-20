<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>
    @yield('title')
  </title>
@include('driver.layouts.head')

  @stack('css')
  {{-- <script>
    const USER = {
        id: "{{ auth()->user()->id }}",
        name: "{{ auth()->user()->nmae }}",
        image: "{{ asset(auth()->user()->image) }}"
    }

  </script> --}}
    {{-- @vite(['resources/js/app.js', 'resources/js/frontend.js']) --}}
    @vite(['resources/js/app.js',])
</head>

<body>


  <!--=============================
    DASHBOARD MENU START
  ==============================-->

  <!--=============================
    DASHBOARD MENU END
  ==============================-->

  @include('driver.layouts.sidebar')

  <!--=============================
    DASHBOARD START
  ==============================-->
    @yield('content')
  <!--=============================
    DASHBOARD START
  ==============================-->


  <!--============================
      SCROLL BUTTON START
    ==============================-->
  <div class="wsus__scroll_btn">
    <i class="fas fa-chevron-up"></i>
  </div>
  <!--============================
    SCROLL BUTTON  END
  ==============================-->


  @include('driver.layouts.script')
</body>

</html>
