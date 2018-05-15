
<!DOCTYPE html>
<html>

<head>
	<title>LipaRent | Welcome </title>

	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
    <!--//tags -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{asset('css/prettyPhoto.css')}}"  rel="stylesheet" type="text/css" />
    <link  href="{{asset('css/font-awesome.css')}}"  rel="stylesheet">
    <link  href="{{asset('css/team.css')}}"  rel="stylesheet">
    <link  href="{{asset('css/contact.css')}}"  rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,300,300i,400,400i,500,500i,600,600i,700,800" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700" rel="stylesheet">
</head>

<body id="app">
	<div class="top_header" id="home">
		<!-- Fixed navbar -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="nav_top_fx_w3ls_agileinfo">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
					    aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
					<div class="logo-w3layouts-agileits">
						<h1> <a class="navbar-brand" href="#"><i class="fa fa-home" aria-hidden="true"></i>LipaRent <span class="desc">Convinience, for you.</span></a></h1>
					</div>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<div class="nav_right_top">
						<ul class="nav navbar-nav navbar-right">
							<li><a class="request" href="#">Pay Rent</a></li>

						</ul>
						<ul class="nav navbar-nav">
							<li class="active"><a href="#">Home</a></li>
							<li><a href="#features">Features</a></li>
							<li><a href="{{ route('pricing') }}">Pricing</a></li>
							<li><a href="#contact">Contact</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User<span class="caret"></span></a>
								<ul class="dropdown-menu">
                                    @guest
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                    @else
                                      <div class="center">
                                          <a href="{{ route('logout') }}"  class="btn btn-default btn-flat"
                                          onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                          Logout
                                      </a>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          {{ csrf_field() }}
                                      </form>
                                      </div>
                                    </li>
                                  @endguest  
								</ul>
							</li>
						</ul>
					</div>
				</div>
				<!--/.nav-collapse -->
			</div>
		</nav>
	</div>
	<!-- banner -->
	@yield('content')
	<!-- footer -->
	<div class="footer">
		<div class="footer_inner_info_w3ls_agileits">
			<div class="col-md-3 footer-left">
				<h2><a href="/"><i class="fa fa-home" aria-hidden="true"></i> LipaRent </a></h2>
				<p>Lorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora.</p>
				<ul class="social-nav model-3d-0 footer-social social two">
					<li>
						<a href="#" class="facebook">
							<div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
						</a>
					</li>
					<li>
						<a href="#" class="twitter">
							<div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
						</a>
					</li>
					<li>
						<a href="#" class="instagram">
							<div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
						</a>
					</li>
					<li>
						<a href="#" class="pinterest">
							<div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
						</a>
					</li>
				</ul>
			</div>
			<div class="col-md-9 footer-right">
				<div class="sign-grds">
					<div class="col-md-4 sign-gd">
						<h4>P<span>ages</span> </h4>
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Features</a></li>
							<li><a href="#">Pricing</a></li>
							<li><a href="#">Signin</a></li>
							<li><a href="#">Contact</a></li>
						</ul>
					</div>
					<div class="col-md-3 sign-gd flickr-post">
						<h4> Featured<span>Houses</span></h4>
						<ul>
							<li><a href="single.html"><img src="images/g1.jpg" alt=" " class="img-responsive" /></a></li>
							<li><a href="single.html"><img src="images/g2.jpg" alt=" " class="img-responsive" /></a></li>
							<li><a href="single.html"><img src="images/g3.jpg" alt=" " class="img-responsive" /></a></li>
							<li><a href="single.html"><img src="images/g4.jpg" alt=" " class="img-responsive" /></a></li>
							<li><a href="single.html"><img src="images/g5.jpg" alt=" " class="img-responsive" /></a></li>
							<li><a href="single.html"><img src="images/g6.jpg" alt=" " class="img-responsive" /></a></li>
							<li><a href="single.html"><img src="images/g7.jpg" alt=" " class="img-responsive" /></a></li>
							<li><a href="single.html"><img src="images/g8.jpg" alt=" " class="img-responsive" /></a></li>
							<li><a href="single.html"><img src="images/g4.jpg" alt=" " class="img-responsive" /></a></li>
						</ul>
					</div>
					<div class="col-md-5 sign-gd-two">
						<h4>Contact <span>Information</span></h4>
						<div class="address">
							<div class="address-grid">
								<div class="address-left">
									<i class="fa fa-phone" aria-hidden="true"></i>
								</div>
								<div class="address-right">
									<h6>Phone Number</h6>
									<p>+244 700 000 000</p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="address-grid">
								<div class="address-left">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</div>
								<div class="address-right">
									<h6>Email Address</h6>
									<p>Email :<a href="mailto:example@email.com"> mail@example.com</a></p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="address-grid">
								<div class="address-left">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
								</div>
								<div class="address-right">
									<h6>Buruburu</h6>
									<p>Some St. ,Nairobi, Kenya.

									</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>

					<div class="clearfix"></div>
				</div>
			</div>
			<div class="clearfix"></div>
			<p class="copy-right">&copy 2018 Liparent. All rights reserved | Design by <a href="http://lipa-rent.co.ke/">LipaRent</a></p>
		</div>
	</div>
	</div>
    <!-- //footer -->
    <script src="{{asset('js/jquery-2.2.3.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
	<script>
		$('ul.dropdown-menu li').hover(function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		}, function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
		});
	</script>

	<!-- js -->
    <!-- Smooth-Scrolling-JavaScript -->
    <script src="{{asset('js/easing.js')}}"></script>
    <script src="{{asset('js/move-top.js')}}"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll, .navbar li a, .footer li a").click(function (event) {
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //Smooth-Scrolling-JavaScript -->
	<script type="text/javascript">
		$(document).ready(function () {
			/*
									var defaults = {
							  			containerID: 'toTop', // fading element id
										containerHoverID: 'toTopHover', // fading element hover id
										scrollSpeed: 1200,
										easingType: 'linear' 
							 		};
									*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- jQuery-Photo-filter-lightbox-Gallery-plugin -->

	<script src="{{asset('js/bootsrap.js')}}"></script>
    <script src="{{asset('js/jquery-1.7.2.js')}}"></script>
    <script src="{{asset('js/jquery.quicksand.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
	<script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
	<!-- //jQuery-Photo-filter-lightbox-Gallery-plugin -->

</body>

</html>