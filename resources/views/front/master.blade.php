<!DOCTYPE html>
<html lang="{{ app()->currentLocale() }}">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="edutim,coaching, distant learning, education html, health coaching, kids education, language school, learning online html, live training, online courses, online training, remote training, school html theme, training, university html, virtual training  ">

  <meta name="author" content="themeturn.com">

  <title>@yield('title', env('APP_NAME'))</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="{{ asset('webasset/assets/images/logo-dark.png') }}">

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{ asset('webasset/assets/vendors/bootstrap/bootstrap.css ') }}">
  <!-- Iconfont Css -->
  <link rel="stylesheet" href="{{ asset('webasset/assets/vendors/fontawesome/css/all.css ') }}">
  <link rel="stylesheet" href="{{ asset('webasset/assets/vendors/bicon/css/bicon.min.css ') }}">
  <link rel="stylesheet" href="{{ asset('webasset/assets/vendors/themify/themify-icons.css ') }}">
  <!-- animate.css -->
  <link rel="stylesheet" href="{{ asset('webasset/assets/vendors/animate-css/animate.css ') }}">
  <!-- WooCOmmerce CSS -->
  <link rel="stylesheet" href="{{ asset('webasset/assets/vendors/woocommerce/woocommerce-layouts.css ') }}">
  <link rel="stylesheet" href="{{ asset('webasset/assets/vendors/woocommerce/woocommerce-small-screen.css ') }}">
  <link rel="stylesheet" href="{{ asset('webasset/assets/vendors/woocommerce/woocommerce.css ') }}">
   <!-- Owl Carousel  CSS -->
  <link rel="stylesheet" href="{{ asset('webasset/assets/vendors/owl/assets/owl.carousel.min.css ') }}">
  <link rel="stylesheet" href="{{ asset('webasset/assets/vendors/owl/assets/owl.theme.default.min.css ') }}">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('webasset/assets/css/style.css ') }}">
  <link rel="stylesheet" href="{{ asset('webasset/assets/css/responsive.css ') }}">

  @if (app()->currentLocale() == 'ar')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo&display=swap');
        body {
            direction: rtl;
            text-align: right;
            font-family: 'Cairo', sans-serif;
        }
        .header-form i {
            left: 14px;
            right: auto;
        }
    </style>
  @endif

  @yield('style')

</head>

<body id="top-header">






<header>
    <!-- Main Menu Start -->
    <div class="site-navigation main_menu menu-2" id="mainmenu-area">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('website.index') }}">
                    <img src="{{ asset('webasset/assets/images/logo-dark.png') }}" alt="Edutim" class="img-fluid">
                </a>

                <!-- Toggler -->

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>

                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="navbarMenu">

                    <div class="category-menu d-none d-lg-block">
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-grip-horizontal"></i>{{ __('web.Categoris') }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbar3">
                                @foreach (App\Models\Category::all() as $item)
                                    <a class="dropdown-item " href="{{ route('website.category', $item->slug) }}">
                                        {{ $item->trans_name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <form action="#" class="header-form">
                        <input type="text" class="form-control" placeholder="{{ __('web.search') }}">
                        <i class="fa fa-search"></i>
                    </form>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a href="{{ route('website.index') }}" class="nav-link js-scroll-trigger {{ request()->routeIs('website.index') ? 'active' : '' }}">
                                {{ __('web.home') }}
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{ route('website.about') }}" class="nav-link js-scroll-trigger {{ request()->routeIs('website.about') ? 'active' : '' }}">
                                {{ __('web.About') }}
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{ route('website.courses') }}" class="nav-link js-scroll-trigger {{ request()->routeIs('website.courses') ? 'active' : '' }}">
                                {{ __('web.Courses') }}
                            </a>
                        </li>

                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('web.Courses') }}<i class="fa fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbar3">
                                <a class="dropdown-item " href="course-grid.html">
                                   Course Style 1
                               </a>
                               <a class="dropdown-item " href="course-grid-2.html">
                                   Course Style 2
                               </a>

                               <a class="dropdown-item " href="course-grid-3.html">
                                   Course Style 3
                               </a>
                               <a class="dropdown-item " href="course-grid-4.html">
                                   Course Style 4
                               </a>
                               <a class="dropdown-item " href="course-grid-5.html">
                                   Course Filter
                               </a>
                               <a class="dropdown-item " href="course-grid-6.html">
                                   Course List
                               </a>
                                <a class="dropdown-item " href="course-single.html">
                                   Course Details Style 1
                               </a>
                               <a class="dropdown-item " href="course-single2.html">
                                   Course Details Style Tab
                               </a>
                               <a class="dropdown-item " href="course-single3.html">
                                   Course Details Style Tab2
                               </a>
                               <a class="dropdown-item " href="course-single4.html">
                                   Course Details Classic
                               </a>
                            </div>
                        </li> --}}
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ @trans('web.Shop') }}<i class="fa fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbar3">
                                 <a class="dropdown-item " href="shop.html">
                                    Shop
                                </a>
                                <a class="dropdown-item " href="product-list-filter.html">
                                    Shop List Filter
                                </a>
                                <a class="dropdown-item " href="product-single.html">
                                   Shop Single
                                </a>
                                <a class="dropdown-item " href="cart.html">
                                    Cart
                                </a>
                                <a class="dropdown-item " href="checkout.html">
                                    Checkout
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('web.Pages') }}<i class="fa fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbar3">
                                <a class="dropdown-item " href="instructors.html">
                                    Instructor
                                </a>
                                 <a class="dropdown-item " href="login-registration.html">
                                    Login
                                </a>
                                <a class="dropdown-item " href="404.html">
                                    404
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('web.Blog') }} <i class="fa fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbar3">
                                 <a class="dropdown-item " href="blog.html">
                                    Blog
                                </a>
                                <a class="dropdown-item " href="blog-single.html">
                                    Blog Single
                                </a>
                            </div>
                        </li> --}}

                        <li class="nav-item ">
                            <a href="{{ route('website.contact') }}" class="nav-link {{ request()->routeIs('website.contact') ? 'active' : '' }}">
                                {{ __('web.Contact') }}
                            </a>
                        </li>

                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            @if (app()->currentLocale() != $localeCode)
                            <li class="nav-item ">
                                <a  hreflang="{{ $localeCode }}"  class="nav-link" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <img width="30" src="{{ asset('flags/'.$properties['flag']) }}" alt="">
                                </a>
                            </li>
                            @endif
                        @endforeach

                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('web.Languages') }}<i class="fa fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbar3">


                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <a  hreflang="{{ $localeCode }}"  class="dropdown-item " href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                @endforeach
                            </div>
                        </li> --}}
                    </ul>

                    <a href="{{ route('website.login') }}" class="btn btn-main btn-small {{ request()->routeIs('website.login') ? 'active' : '' }}"><i class="fa fa-sign-in-alt mr-2"></i>{{ __('web.Login') }}</a>

                </div> <!-- / .navbar-collapse -->
            </div> <!-- / .container -->
        </nav>
    </div>
</header>

 <!--search overlay start-->
 <div class="search-wrap">
    <div class="overlay">
        <form action="" class="search-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-9">
                        <h3>Search Your keyword</h3>
                        <input type="text" class="form-control" placeholder="Search..."/>
                    </div>
                    <div class="col-md-2 col-3 text-right">
                        <div class="search_toggle toggle-wrap d-inline-block">
                            <img class="search-close" src="{{ asset('webasset/assets/images/close.png') }}" srcset="assets/images/close@2x.png 2x" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--search overlay end-->

@yield('content')

<section class="cta-2">
    <div class="container">
        <div class="row align-items-center subscribe-section ">
            <div class="col-lg-6">
                <div class="section-heading white-text">
                    <span class="subheading">Newsletter</span>
                    <h3>Join our community of students</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="subscribe-form">
                    <form action="#">
                        <input type="text" class="form-control" placeholder="Email Address">
                        <a href="#" class="btn btn-main">Subscribe<i class="fa fa-angle-right ml-2"></i> </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="footer pt-120">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 mr-auto col-sm-6 col-md-6">
				<div class="widget footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">About Us</h5>
					<p class="mt-3">Veniam Sequi molestias aut necessitatibus optio magni at natus accusamus.Lorem ipsum dolor sit amet, consectetur adipisicin gelit, sed do eiusmod tempor incididunt .</p>
					<ul class="list-inline footer-socials">
						<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="list-inline-item"> <a href="#"><i class="fab fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-2 col-sm-6 col-md-6">
				<div class="footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">Company</h5>
					<ul class="list-unstyled footer-links">
						<li><a href="#">About us</a></li>
						<li><a href="#">Contact us</a></li>
						<li><a href="#">Projects</a></li>
						<li><a href="#">Terms & Condition</a></li>
						<li><a href="#">Privacy policy</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-2 col-sm-6 col-md-6">
				<div class="footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">Courses</h5>
					<ul class="list-unstyled footer-links">
						<li><a href="#">SEO Business</a></li>
						<li><a href="#">Digital Marketing</a></li>
						<li><a href="#">Graphic Design</a></li>
						<li><a href="#">Site Development</a></li>
						<li><a href="#">Social Marketing</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-md-6">
				<div class="footer-widget footer-contact mb-5 mb-lg-0">
					<h5 class="widget-title">Contact </h5>

					<ul class="list-unstyled">
						<li><i class="bi bi-headphone"></i>
							<div>
								<strong>Phone number</strong>
								(68) 345 5902
							</div>

						</li>
						<li> <i class="bi bi-envelop"></i>
							<div>
								<strong>Email Address</strong>
								info@yourdomain.com
							</div>
						</li>
						<li><i class="bi bi-location-pointer"></i>
							<div>
								<strong>Office Address</strong>
								Moon Street Light Avenue
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="footer-btm">
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-6">
					<div class="footer-logo">
						<img src="{{ asset('webasset/assets/images/logo-white.png') }}" alt="Edutim" class="img-fluid">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="copyright text-lg-center">
						<p>@ Copyright reserved to Edutim.Proudly Crafted by <a href="https://themeturn.com">Dreambuzz</a> </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<div class="fixed-btm-top">
	<a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up"></i></a>
</div>



    <!--
    Essential Scripts
    =====================================-->

    <!-- Main jQuery -->
    <script src="{{ asset('webasset/assets/vendors/jquery/jquery.js') }}"></script>
    <!-- Bootstrap 4.5 -->
    <script src="{{ asset('webasset/assets/vendors/bootstrap/bootstrap.js') }}"></script>
    <!-- Counterup -->
    <script src="{{ asset('webasset/assets/vendors/counterup/waypoint.js') }}"></script>
    <script src="{{ asset('webasset/assets/vendors/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('webasset/assets/vendors/jquery.isotope.js') }}"></script>
    <script src="{{ asset('webasset/assets/vendors/imagesloaded.js') }}"></script>
    <!--  Owlk Carousel-->
    <script src="{{ asset('webasset/assets/vendors/owl/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('webasset/assets/js/script.js') }}"></script>

    @yield('script')

  </body>
  </html>
