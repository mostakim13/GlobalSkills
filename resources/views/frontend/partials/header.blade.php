<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- DESCRIPTION -->
	<meta name="description" content="Global Skills Development Agency" />

	<!-- OG -->
	<meta property="og:title" content="Global Skills Development Agency" />
	<meta property="og:description" content="Global Skills Development Agency" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">

	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="{{ asset('images/favicon.ico')}}" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset ('images/favicon.png')}}" />

	<!-- PAGE TITLE HERE ============================================= -->
	<title>Globalskills.com.bd </title>

	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--[if lt IE 9]
	<script src="{{ asset('js/html5shiv.min.js')}}"></script>
	<script src="{{ asset('js/respond.min.js')}}"></script>
	<![endif]-->
  @include('frontend.partials.styles')


</head>
