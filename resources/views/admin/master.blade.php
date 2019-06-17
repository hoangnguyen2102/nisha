<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META SECTION -->
    @include('client.components.title')
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('css/admin/theme-default.css') }}"/>
    <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('css/admin/additional.css') }}"/>
    <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('css/admin/validation.css') }}"/>
    <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('css/client/style.css') }}"/>
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-rc.1/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
    <!-- EOF CSS INCLUDE -->

    @yield('after_style')
</head>
<body>
<!-- START PAGE CONTAINER -->
<div class="page-container">

    <!-- START PAGE SIDEBAR -->
    @include ('admin.layouts.sidebar')
    <!-- END PAGE SIDEBAR -->

    <!-- PAGE CONTENT -->
    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        @include ('admin.layouts.navigation')
        <!-- END X-NAVIGATION VERTICAL -->

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="#  "></a></li>
        </ul>
        <!-- END BREADCRUMB -->

        <div class="page-title">
            <h2><span class="fa fa-arrow-circle-o-left"></span>{{ $pageTitle }}</h2>
        </div>

        <!-- CONTENT -->
        @yield ('content')
        <!-- END CONTENT -->

    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<!-- MESSAGE BOX-->
@include ('admin.component.message-box-sign-out')
<!-- END MESSAGE BOX-->

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






