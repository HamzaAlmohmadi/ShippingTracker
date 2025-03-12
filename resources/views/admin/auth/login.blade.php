<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>
        @yield('title')
    </title>

    @yield('metas')

    {{-- <link rel="icon" type="image/png" href="{{asset($logoSetting->favicon)}}"> --}}
    <link rel="icon" type="image/png" href="#">
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.nice-number.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/add_row_custon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/mobile_menu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.exzoom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/multiple-image-video.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/ranger_style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.classycountdown.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/venobox.min.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    {{-- @if ($settings->layout === 'RTL')
    <link rel="stylesheet" href="{{asset('frontend/css/rtl.css')}}">
    @endif --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/rtl.css') }}">
    @vite(['resources/js/app.js'])
</head>



<body>


    <!--============================
         BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>login / register</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">login / register</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <section id="wsus__login_register">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 m-auto">
                            <div class="wsus__login_reg_area">
                                <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab2" data-bs-toggle="pill"
                                            data-bs-target="#pills-homes" type="button" role="tab"
                                            aria-controls="pills-homes" aria-selected="true">login</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab2" data-bs-toggle="pill"
                                            data-bs-target="#pills-profiles" type="button" role="tab"
                                            aria-controls="pills-profiles" aria-selected="true">signup</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent2">
                                    <div class="tab-pane fade show active" id="pills-homes" role="tabpanel"
                                        aria-labelledby="pills-home-tab2">
                                        <div class="wsus__login">
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="wsus__login_input">
                                                    <i class="fas fa-user-tie"></i>
                                                    <input id="email" type="email" value="{{ old('email') }}"
                                                        name="email" placeholder="Email">
                                                </div>

                                                <div class="wsus__login_input">
                                                    <i class="fas fa-key"></i>
                                                    <input id="password" type="password" name="password"
                                                        placeholder="Password">
                                                </div>


                                                <div class="wsus__login_save">
                                                    <div class="form-check form-switch">
                                                        <input id="remember_me" name="remember"
                                                            class="form-check-input" type="checkbox"
                                                            id="flexSwitchCheckDefault">
                                                        <label class="form-check-label"
                                                            for="flexSwitchCheckDefault">Remember
                                                            me</label>
                                                    </div>
                                                    <a class="forget_p" href="{{ route('password.request') }}">forget
                                                        password
                                                        ?</a>
                                                </div>

                                                <button class="common_btn" type="submit">login</button>
                                                {{-- <p class="social_text">Sign in with social account</p>
                                            <ul class="wsus__login_link">
                                                <li><a href="#"><i class="fab fa-google"></i></a></li>
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            </ul> --}}
                                            </form>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="pills-profiles" role="tabpanel"
                                        aria-labelledby="pills-profile-tab2">
                                        <div class="wsus__login">
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf
                                                <div class="wsus__login_input">
                                                    <i class="fas fa-user-tie"></i>
                                                    <input id="name" name="name" value="{{ old('name') }}"
                                                        type="text" placeholder="Name">
                                                </div>


                                                <div class="wsus__login_input">
                                                    <i class="far fa-envelope"></i>
                                                    <input id="email" type="email" name="email"
                                                        value="{{ old('email') }}" type="text"
                                                        placeholder="Email">
                                                </div>


                                                <div class="wsus__login_input">
                                                    <i class="fas fa-key"></i>
                                                    <input id="password" name="password" type="password"
                                                        placeholder="Password">
                                                </div>


                                                <div class="wsus__login_input">
                                                    <i class="fas fa-key"></i>
                                                    <input id="password_confirmation" type="password"
                                                        name="password_confirmation" placeholder="Confirm Password">
                                                </div>

                                                <button class="common_btn mt-4" type="submit">signup</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </div>
    </section>
    <!--============================
    BREADCRUMB END
    ==============================-->


    <!--============================
      Main Content Start
  ==============================-->




    <!--============================







    {{-- <section class="product_popup_modal">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content product-modal-content">

                </div>
            </div>
        </div>
    </section>
 --}}


    {{-- <div class="wsus__scroll_btn">
        <i class="fas fa-chevron-up"></i>
    </div> --}}



    <!--jquery library js-->
    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    <!--bootstrap js-->
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <!--font-awesome js-->
    <script src="{{ asset('frontend/js/Font-Awesome.js') }}"></script>
    <!--select2 js-->
    <script src="{{ asset('frontend/js/select2.min.js') }}"></script>
    <!--slick slider js-->
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <!--simplyCountdown js-->
    <script src="{{ asset('frontend/js/simplyCountdown.js') }}"></script>
    <!--product zoomer js-->
    <script src="{{ asset('frontend/js/jquery.exzoom.js') }}"></script>
    <!--nice-number js-->
    <script src="{{ asset('frontend/js/jquery.nice-number.min.js') }}"></script>
    <!--counter js-->
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.countup.min.js') }}"></script>
    <!--add row js-->
    <script src="{{ asset('frontend/js/add_row_custon.js') }}"></script>
    <!--multiple-image-video js-->
    <script src="{{ asset('frontend/js/multiple-image-video.js') }}"></script>
    <!--sticky sidebar js-->
    <script src="{{ asset('frontend/js/sticky_sidebar.js') }}"></script>
    <!--price ranger js-->
    <script src="{{ asset('frontend/js/ranger_jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/js/ranger_slider.js') }}"></script>
    <!--isotope js-->
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <!--venobox js-->
    <script src="{{ asset('frontend/js/venobox.min.js') }}"></script>
    <!--Toaster js-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!--Sweetalert js-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--classycountdown js-->
    <script src="{{ asset('frontend/js/jquery.classycountdown.js') }}"></script>


    <!--main/custom js-->
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>
    <script>
        $(document).ready(function() {
            $('.auto_click').click();
        })
    </script>
    @include('frontend.layouts.scripts')
    @stack('scripts')
</body>

</html>
