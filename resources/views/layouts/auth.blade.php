<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>{{ config('app.name', 'Junior developer test') }}</title>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="RedstarHospital" />
	<title>Smart School</title>
	<!-- google font -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
	<!-- icons -->
	<link href="{{ asset('assets/fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{ asset('assets/plugins/iconic/css/material-design-iconic-font.min.css') }}">
	<!-- bootstrap -->
	<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- style -->
	<link rel="stylesheet" href="{{ asset('assets/css/pages/extra_pages.css') }}">
	<!-- favicon -->
	<link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" />
	<link href="{{ asset('assets/plugins/sweet-alert/sweetalert2.min.css') }}" type="text/css" rel="stylesheet">
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
	<div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
				@yield('content')
			</div>
		</div>
	</div>

	@section('scripts')
	<script type="text/javascript" src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/sweet-alert/sweetalert2.min.js') }}"></script>
	@show
</body>

</html>