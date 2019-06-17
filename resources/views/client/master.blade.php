﻿﻿﻿﻿﻿﻿<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, target-densityDpi=device-dpi">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trung t&acirc;m thể dục thể h&igrave;nh v&agrave; yoga | California Fitness &amp; Yoga</title>

    <!-- CSS -->
    <link href="{{ asset('css/client/font-utmavo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/client/vendor.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/client/owl.theme.default.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/client/owl.carousel.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/client/bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/client/style.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <script src="{{ asset('js/client/vendor.min.js') }}"></script>

    @yield('after_style')

</head><body>
<!-- HOTLINE DISPLAY ONLY ON MOBILE & TABLET-->
<div class="visible-xs visible-sm">
    <div class="hotline hidden-xs">
        <img class="faa-wrench animated" src="image/phone.png"/>
        <div class="hotline-no">
            <p class="phone-btn-on-desktop">18006995</p>
            <p>gọi để nhận tư vấn miễn phí</p>
        </div>
    </div>
    <a href="tel:18006995" class="visible-xs phone-btn-on-mobile" >
        <div class="hotline-mobile">
            <img class="faa-wrench animated" src="image/phone.png"/>
        </div>
    </a>
</div>
<!-- STICKY NAVBAR DISPLAY ONLY ON DESKTOP -->
<div id="sticky-nav" class="hidden-sm hidden-xs">
    <div class="sticky-item hotline-nav">
        <span class="icon-sticky"><img src="image/icon-phone.png"></span>
        <a href="tel:18006995" class="info-expanded">
            <small>Gọi để nhận tư vấn miễn phí</small>
            18006995
        </a>
    </div>
    <div class="sticky-item hidden">
        <span class="icon-sticky"><img src="image/icon-gift.png"></span>
        <a href="https://landing.cfyc.com.vn/giam-5kg-cung-dance.html?utm_track=navibar" target="_blank" class="info-expanded">Xem ưu đãi</a>
    </div>
    <div class="sticky-item">
        <span class="icon-sticky"><img src="image/icon-comment-light.png"></span>
        <a href="/feedback.html" target="_blank" class="info-expanded">Góp ý - Phản hồi</a>
    </div>
</div>

<div class="@yield('page_style')">
    @include('client.layouts.navbar') <!-- row -->

    <div class="container-fluid">
        @yield('content')
    </div>

    @include('client.layouts.footer')

    <style>
        #nikeCampaign .register-form {
            padding: 0;border-radius: 0;margin-top: 0; max-width: 785px;top: 50%; transform: translateY(-50%);
        }
        .btn-click-no {
            display: inline-block;
            background-color: #898989;
            padding: 10px 30px;
            text-transform: uppercase;
            font-weight: bold;
            border-radius: 20px;
            color: #fff;
            margin: 20px 8px 80px;
        }
        .btn-click-yes {
            display: inline-block;
            background-color: #d92128;
            padding: 10px 30px;
            text-transform: uppercase;
            font-weight: bold;
            border-radius: 20px;
            color: #fff;
            width: 117px;
            text-align: center;
            margin: 20px 8px 80px;
        }
        a[class^='btn-click']:hover, a[class^='btn-click']:focus {
            text-decoration: none;
        }
        @media screen and (max-width: 767px) {
            .wrap-offer {
                padding-right: 15px !important;
            }
            a[class^='btn-click'] {
                margin-bottom: 60px;
            }
            #toClickFunnel .form-inner {
                overflow: hidden;
            }
            #toClickFunnel img {padding: 0 10px;}
        }
    </style>

</div>
<script src="{{ asset('js/client/bundle.min.js') }}"></script>
<script src="{{ asset('js/client/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/client/jquery.data-owl.carousel.min.js') }}"></script>
<!--<script src="js/jquery.validate.min.js"></script>-->
<!--<script src="js/jquery.match-height.min.js"></script>-->
<!--<script src="js/sticky-navbar.js"></script><script src="js/jquery.plugin.js"></script>-->
<!--<script src="js/jquery.slimscroll.min.js"></script>-->
<script src="{{ asset('js/client/home.js') }}"></script>
<script>

    $("#banners-homepage-carousel").dataOwlCarousel({
        navText: ['',''],
        items:1,
        responsive:{
            0:{
                nav:false,
                dots: true
            },
            768:{
                nav:true,
                dots: false
            }
        }
    });
    var interval;
    interval = setInterval(function() {
        $("#banners-homepage-carousel").trigger('next.owl.carousel', [1000]);
    }, 4000);



</script>
</body>
</html>