<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Actor Pass</title>
	<!-- Bootstrap -->
	<link href="{{ asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<!-- FontAwesome -->
	<link href="{{ asset('public/assets/css/font-awesome.min.css') }}" rel="stylesheet">
	<!-- Animate -->
	<link href="{{ asset('public/assets/css/animate.css') }}" rel="stylesheet">
	<!-- Owl Slider -->
	<link href="{{ asset('public/assets/css/owl.carousel.css') }}" rel="stylesheet">
	<!-- Owl Slider Theme -->
	<link href="{{ asset('public/assets/css/owl.theme.css') }}" rel="stylesheet">
	<!--Jquery Validation -->
	<link href="{{ asset('public/assets/css/validationEngine.jquery.css') }}" rel="stylesheet">
	<!--Jquery custom Validation -->
	<link href="{{ asset('public/assets/css/custom_validatiion.css') }}" rel="stylesheet">
	<!--Mobile menu -->
	<link href="{{ asset('public/assets/plugins/menu/css/hamburgers.css') }}" rel="stylesheet">
	<link href="{{ asset('public/assets/plugins/menu/css/jquery.mmenu.all.css') }}" rel="stylesheet">
	<link href="{{ asset('public/assets/plugins/menu/css/jquery.mhead.css') }}" rel="stylesheet">
	<!-- Animation CSS -->
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/default.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/component.css') }}" /> -->
	<!-- AOS Animation -->
    <link href="{{ asset('public/assets/css/aos.css') }}" rel="stylesheet">
	<!-- style.css -->
	<link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet">
	<!-- custom Css Lins -->
	<link href="{{ asset('public/assets/css/custom.css') }}" rel="stylesheet">
	<!-- Responsive -->
	<link href="{{ asset('public/assets/css/responsive.css') }}" rel="stylesheet">

	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>
	<div id="wrapper">
		<header class="container">
			<div class="row">
				<div class="col-md-3 col-sm-8 col-xs-8">
					<div class="img-logo"  style="margin-top: 21px;">
					<a href=""><img src="{{ asset('public/assets/images/logo_actor.png') }}" alt="Actor Pass Logo" class="img-responsive"></a>
					</div>
				</div>

				<div class="col-sm-4 col-xs-4 only-mobile only-tablet">
					<a href="" class="navbar-toggle only-mobile only-tablet">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<div id="my-menu">
						<ul class="nav navbar-nav">
							<li>
								<a href="{{ route('public_index') }}">HOME</a>
							</li>
							<li>
								<a href="{{ route('about') }}">ABOUT US</a>
							</li>
							<li>
								<a href="{{ route('takeaclass') }}">TAKE A CLASS</a>
							</li>
							<li>
								<a href="{{ route('faq') }}">FAQ</a>
							</li>
							<li>
								<a href="{{ route('contact') }}">CONTACT US</a>
							</li>
							<li>
								<a href="{{ route('login_view') }}">LOGIN</a>
							</li>
						</ul>
					</div>
				</div>

				<div class="col-md-7 col-sm-12 col-xs-12">
					<div class="top-header">
						<div class="header-contact">
							<div class="pull-left social">
								<a href=""> <i class="fa fa-facebook"></i> </a>
								<a href=""> <i class="fa fa-twitter"></i> </a>
								<a href=""> <i class="fa fa-instagram"></i> </a>
							</div>
							<div class="pull-right contact">
								<a href=""> <i class="fa fa-phone"></i>  :  + 212-593-0066</a>
								<a href=""> <i class="fa fa-envelope"></i> : info@actorpass.com</a>
							</div>
						</div>
						<div class="menu">
							<nav>
								<ul class="navigation only-desktop">
									<li {{{ (Request::is('/') ? 'class=active' : '') }}} ><a href="{{ route('public_index') }}">HOME</a></li>
									<li {{{ (Request::is('/about') ? 'class=active' : '') }}}><a href="{{ route('about') }}">ABOUT US</a></li>
									<li {{{ (Request::is('/takeaclass') ? 'class=active' : '') }}}><a href="{{ route('takeaclass') }}">TAKE A CLASS</a></li>
									<li {{{ (Request::is('/faq') ? 'class=active' : '') }}}><a href="{{ route('faq') }}">FAQ</a></li>
									<li {{{ (Request::is('/contact') ? 'class=active' : '') }}}><a href="{{ route('contact') }}">CONTACT</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>

				<div class="col-md-2 only-desktop">
				  @if(Auth::check())
					<div class="login-button" style="margin-top: 35px;">
						@if(Auth::user()->role_id == 1)
						<a href="{{route('admin_index')}}" class="btn btn-login">{{Auth::user()->fullname}}</a>
						@else
						<a href="{{route('dash_index')}}" class="btn btn-login">{{Auth::user()->fullname}}</a>
						@endif
					</div>
				  @else
					<div class="login-button" style="margin-top: 35px;">
						<a href="{{route('login_view')}}" class="btn btn-login">LOGIN</a>
					</div>				  
				  @endif	
				</div>
			</div>
		</header>