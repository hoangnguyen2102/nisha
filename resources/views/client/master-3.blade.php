<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META SECTION -->
    @include('client.components.title')
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('css/admin/theme-default.css') }}"/>
    <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('css/admin/additional.css') }}"/>
    <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('css/admin/validation.css') }}"/>

    @yield('after_style')


    <!-- EOF CSS INCLUDE -->
</head>
<body class="x-dashboard">
<!-- START PAGE CONTAINER -->
<div class="page-container">
    <!-- PAGE CONTENT -->
    <div class="page-content">
        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">

            <!-- START X-NAVIGATION VERTICAL -->
            @include('client.layouts.navbar-3')
            <!-- END X-NAVIGATION VERTICAL -->
            @yield('content')
        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
</div>

<!-- START PRELOADS -->
<audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
<audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
<!-- END PRELOADS -->

<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<script type="text/javascript" src="{{ asset('js/admin/plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/plugins/jquery/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/plugins/bootstrap/bootstrap.min.js') }}"></script>
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->
<script type='text/javascript' src="{{ asset('js/admin/plugins/icheck/icheck.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/plugins/scrolltotop/scrolltopcontrol.js') }}"></script>

@yield('after_script')
<!-- END THIS PAGE PLUGINS-->

<!-- START TEMPLATE -->
<script type="text/javascript" src="{{ asset('js/admin/settings.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/plugins.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/actions.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/demo_dashboard.js') }}"></script>

<!-- END TEMPLATE -->
<!-- END SCRIPTS -->
</body>
</html>






