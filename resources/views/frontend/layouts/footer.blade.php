{{-- @php
    $footerInfo = Cache::rememberForever('footer_info', function(){
            return \App\Models\FooterInfo::first();
    });
    $footerSocials = Cache::rememberForever('footer_socials', function(){
        return \App\Models\FooterSocial::where('status', 1)->get();
    });
    $footerGridTwoLinks = Cache::rememberForever('footer_grid_two', function(){
        return \App\Models\FooterGridTwo::where('status', 1)->get();
    });
    $footerTitle = \App\Models\FooterTitle::first();
    $footerGridThreeLinks =Cache::rememberForever('footer_grid_three', function(){
        return \App\Models\FooterGridThree::where('status', 1)->get();
    });
@endphp --}}
<footer class="footer_2">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-3 col-sm-7 col-md-6 col-lg-3">
                <div class="wsus__footer_content">
                    <a class="wsus__footer_2_logo" href="{{url('/')}}">
                        <img src="تسجيل دخول" alt="logo">
                    </a>
                    <a class="action" href="callto:774207379"><i class="fas fa-phone-alt"></i>774204379</a>
                    <a class="action" href="mailto:hamzanasr2003@gmail.com"><i class="far fa-envelope"></i>hamzanasr2003@gmail.com</a>
                    <p><i class="fal fa-map-marker-alt"></i>صنعاء</p>
                    <ul class="wsus__footer_social">
    
                        <li><a class="behance">hhh</a></li>
                
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-sm-5 col-md-4 col-lg-2">
                <div class="wsus__footer_content">
                    <h5>تتبع الشحنات والطرود </h5>
                    <ul class="wsus__footer_menu">
                     
                            <li><a href="#"><i class="fas fa-caret-right">تتبع</i></a></li>
               
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-sm-5 col-md-4 col-lg-2">
                <div class="wsus__footer_content">
                    <h5>تتبع الشحنات والطرود </h5>
                    <ul class="wsus__footer_menu">
                    
                        <li><a href="#"><i class="fas fa-caret-right">تتبع</i></a></li>
          
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-sm-7 col-md-8 col-lg-5">
                <div class="wsus__footer_content wsus__footer_content_2">
                    <h3>Subscribe To Our Newsletter</h3>
                    <p>Get all the latest information on Events, Sales and Offers.
                        Get all the latest information on Events.</p>
                    <form action="" method="POST" id="newsletter">
                        @csrf
                        <input type="text" placeholder="Email" name="email" class="newsletter_email">
                        <button type="submit" class="common_btn subscribe_btn">subscribe</button>
                    </form>
                    <div class="footer_payment">
                        <p>We're using safe payment for :</p>
                        <img src="{{asset('frontend/images/credit2.png')}}" alt="card" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wsus__footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__copyright d-flex justify-content-center">
                        <p>hamza@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


