<!DOCTYPE HTML>
<html lang="vi">
<head>
    <meta charset=utf-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    @include('client.components.title')
    <meta name="google-site-verification" content="1nyKTkT2EzAM5IC2owDY_eLr5YVBe6fdfGSWAHcUi3c" />
    <meta name="keywords" content="Lifestyle California Fitness Yoga"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href="{{ asset('css/client/font-utmavo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/client/owl.theme.default.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/client/owl.carousel.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/client/vendor2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/client/menu-auddict.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/client/bundle2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/client/style.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="/favicon.ico">

    <script>
        // Picture element HTML5 shiv
        document.createElement( "picture" );
    </script>
    <script src="{{ asset('js/client/vendor.min.js') }}"></script>
    <script src="{{ asset('js/client/picturefill.min.js') }}" async></script>
</head><body>
<!-- CFYC MENU -->
@include('client.layouts.navbar-2')
<!-- menu row -->
<!-- lifestyle menu -->

    @yield('content')
    @include('client.layouts.footer-2')

<script src="{{ asset('js/client/bundle2.min.js') }}"></script>
<script src="{{ asset('js/client/jquery.match-height2.min.js') }}" async></script>

</div>
</body>
</html>