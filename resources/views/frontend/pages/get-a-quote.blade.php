@extends('frontend.layouts.master')


@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade"
        style="background-image: url(frontend/assets/img/page-title-bg.jpg);">
        <div class="container position-relative">
            <h1>احصل على عرض سعر</h1>
            <p>نقدم لكم خدمة استعلام عن أسعار الشحن بكل سهولة وشفافية.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">الرئيسية</a></li>
                    <li class="current">احصل على عرض سعر</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Get A Quote Section -->
    <section id="get-a-quote" class="get-a-quote section">

        <div class="container">

            <div class="row g-0" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-5 quote-bg" style="background-image: url(frontend/assets/img/quote-bg.jpg);"></div>

                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
                    <form action="forms/get-a-quote.php" method="post" class="php-email-form">
                        <h3>احصل على عرض سعر</h3>
                        <p>نقدم لكم خدمة استعلام عن أسعار الشحن بكل سهولة وشفافية.</p>

                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="departure" class="form-control" placeholder="مدينة المغادرة"
                                    required="">
                            </div>

                            <div class="col-md-6">
                                <input type="text" name="delivery" class="form-control" placeholder="مدينة التسليم"
                                    required="">
                            </div>

                            <div class="col-md-6">
                                <input type="text" name="weight" class="form-control" placeholder="الوزن الكلي (كجم)"
                                    required="">
                            </div>

                            <div class="col-md-6">
                                <input type="text" name="dimensions" class="form-control" placeholder="الأبعاد (سم)"
                                    required="">
                            </div>

                            <div class="col-lg-12">
                                <h4>تفاصيلك الشخصية</h4>
                            </div>

                            <div class="col-12">
                                <input type="text" name="name" class="form-control" placeholder="الاسم"
                                    required="">
                            </div>

                            <div class="col-12 ">
                                <input type="email" class="form-control" name="email" placeholder="البريد الإلكتروني"
                                    required="">
                            </div>

                            <div class="col-12">
                                <input type="text" class="form-control" name="phone" placeholder="الهاتف"
                                    required="">
                            </div>

                            <div class="col-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="الرسالة" required=""></textarea>
                            </div>

                            <div class="col-12 text-center">
                                <div class="loading">جاري التحميل</div>
                                <div class="error-message"></div>
                                <div class="sent-message">تم إرسال طلبك بنجاح. شكرًا لك!</div>

                                <button type="submit">احصل على عرض سعر</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Quote Form -->

            </div>

        </div>

    </section><!-- /Get A Quote Section -->
@endsection
