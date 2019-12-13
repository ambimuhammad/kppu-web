<!DOCTYPE html>
<html lang="en">
<head>
  
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 

	<title>Trend | Responsive Multipurpose Bootstrap Theme</title>
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('front/trend/css/bootstrap.min.css') }}" type="text/css">

	<!-- Styles -->
	<link rel="stylesheet" href="{{ asset('front/trend/js/owl-carousel/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('front/trend/js/owl-carousel/owl.theme.css') }}">
	<link rel="stylesheet" href="{{ asset('front/trend/js/owl-carousel/owl.transitions.css') }}">
	<link rel="stylesheet" href="{{ asset('front/trend/js/rs-plugin/css/settings.css') }}">
	<link rel="stylesheet" href="{{ asset('front/trend/js/flexslider/flexslider.css') }}">
	<link rel="stylesheet" href="{{ asset('front/trend/js/isotope/isotope.css') }}">
	<link rel="stylesheet" href="{{ asset('front/trend/css/jquery-ui.css') }}">
	<link rel="stylesheet" href="{{ asset('front/trend/js/magnific-popup/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('front/trend/css/style.css') }}">

	<!-- Google Fonts -->
	<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Raleway:400,200,100,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Dosis:400,200,300,500,600,700,800' rel='stylesheet' type='text/css'>

	<!-- Icon Fonts -->
	<link rel="stylesheet" href="{{ asset('front/trend/css/icomoon/style.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('front/trend/font-awesome/css/font-awesome.min.css') }}" type="text/css">

	<!-- SKIN -->
	<link rel="stylesheet" href="{{ asset('front/trend/css/color-scheme/vivid-blue.css') }}" type="text/css">
	@stack('css')

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
           <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-ajaxtransport-xdomainrequest/1.0.2/jquery.xdomainrequest.min.js"></script>      
	<![endif]-->

</head>
<body>
	<div class="outer-wrapper">
		@include('front.layouts.partial.header')

		@yield('content')
		
        @include('front.layouts.partial.footer')
        
	</div>

	<!-- STYLE SWITCHER 
============================================= -->
    @include('front.layouts.partial.switcher')
	<!-- END STYLE SWITCHER 
============================================= -->

	<!-- jQuery -->
	<script src="{{ asset('front/trend/js/jquery.js') }}"></script>

	<!-- Plugins -->
	<script src="{{ asset('front/trend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('front/trend/js/menu.js') }}"></script>
	<script src="{{ asset('front/trend/js/owl-carousel/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('front/trend/js/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>   
	<script src="{{ asset('front/trend/js/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
	<script src="{{ asset('front/trend/js/jquery.easing.min.js') }}"></script>
	<script src="{{ asset('front/trend/js/isotope/isotope.pkgd.js') }}"></script>
	<script src="{{ asset('front/trend/js/flexslider/jquery.flexslider.js') }}"></script>
	<script src="{{ asset('front/trend/js/easypie/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ asset('front/trend/js/jquery-ui.js') }}"></script>
	<script src="{{ asset('front/trend/js/jquery.appear.js') }}"></script>
	<script src="{{ asset('front/trend/js/jquery.inview.js') }}"></script>
	<script src="{{ asset('front/trend/js/jquery.countdown.min.js') }}"></script>
	<script src="{{ asset('front/trend/js/jquery.sticky.js') }}"></script>
	<script src="{{ asset('front/trend/js/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

	<script src="{{ asset('front/trend/js/main.js') }}"></script>
    @stack('script')
</body>

</html>