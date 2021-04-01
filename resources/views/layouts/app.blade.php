<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @section('meta-data')
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="author" content="Maqsudjon Khusainov" />
    @show
    <title>Task - {{ $title }}</title>
    @section('styles')

    <title>Smart School</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />

    <!--bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/material/material.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/material_style.css') }}">
    <!-- Theme Styles -->
    <link rel="stylesheet" id="rt_style_components" type="text/css" href="{{ asset('assets/css/theme_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme-color.css') }}">
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" />
    <!-- icons -->
    <link href="{{ asset('assets/fonts/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fonts/font-awesome/css/font-awesome.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/fonts/material-design-icons/material-icon.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/plugins/sweet-alert/sweetalert2.min.css') }}" type="text/css" rel="stylesheet">
    @show

    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
        @include('components.header-default')

        <!-- start page container -->
        <div class="page-container">
            @include('includes.left-menu.navigation')

            <!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    @yield('breadcrumb')
                    @yield('main-content')
                </div>
            </div>
            <!-- end page content -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2021 &copy; Task
                <a href="mailto:h.maksudjon@gmail.com" target="_top" class="makerCss">MK7</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- end footer -->
    </div>

    @yield('modal-windows')

    @section('scripts')
    <!-- start js include path -->
    <script type="text/javascript" src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/popper/popper.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/jquery-blockui/jquery.blockui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- bootstrap -->
    <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <!-- Common js-->
    <script type="text/javascript" src="{{ asset('assets/general-js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/general-js/layout.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/sweet-alert/sweetalert2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/general-js/theme-color.js') }}"></script>
    <!-- Material -->
    <script type="text/javascript" src="{{ asset('assets/plugins/material/material.min.js') }}"></script>
    <!-- end js include path -->
    @show
</body>

</html>