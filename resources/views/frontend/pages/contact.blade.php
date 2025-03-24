@extends('frontend.layouts.master')



@section('content')


    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(frontend/assets/img/page-title-bg.jpg);">
        <div class="container position-relative">
            <h1>اتصل بنا</h1>
            <p>نحن هنا لمساعدتك! إذا كان لديك أي استفسارات أو تحتاج إلى دعم، فلا تتردد في التواصل معنا.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">الرئيسية</a></li>
                    <li class="current">اتصل بنا</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <!-- خريطة الموقع -->
            <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
                <iframe style="border:0; width: 100%; height: 270px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3610.178509744292!2d55.27218771500988!3d25.19751498389635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43348a67e24b%3A0xff45e502e1ceb7e2!2sBurj%20Khalifa!5e0!3m2!1sen!2sae!4v1676961268712!5m2!1sen!2sae"
                    frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div><!-- End Google Maps -->

            <div class="row gy-4">

                <!-- معلومات الاتصال -->
                <div class="col-lg-4">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-geo-alt flex-shrink-0 ms-3"></i>
                        <div>
                            <h3>العنوان</h3>
                            <p>دبي، الإمارات العربية المتحدة</p>
                        </div>
                    </div>
            
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-telephone flex-shrink-0 ms-3"></i>
                        <div>
                            <h3>اتصل بنا</h3>
                            <p>+971 4 123 4567</p>
                        </div>
                    </div>
            
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                        <i class="bi bi-envelope flex-shrink-0 ms-3"></i>
                        <div>
                            <h3>البريد الإلكتروني</h3>
                            <p>info@shippingtracker.com</p>
                        </div>
                    </div>
                </div>

                <!-- نموذج الاتصال -->
                <div class="col-lg-8">
                    <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="الاسم الكامل"
                                    required="">
                            </div>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="البريد الإلكتروني"
                                    required="">
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="الموضوع"
                                    required="">
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="الرسالة" required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">جاري التحميل...</div>
                                <div class="error-message">حدث خطأ أثناء إرسال الرسالة. يرجى المحاولة مرة أخرى.</div>
                                <div class="sent-message">تم إرسال رسالتك بنجاح. شكرًا لك!</div>

                                <button type="submit">إرسال الرسالة</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- /Contact Section -->
@endsection




