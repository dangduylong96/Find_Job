<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Tìm việc nhanh</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta name="description" content="Job Pro" />
        <meta name="keywords" content="Job Pro" />
        <meta name="author" content="" />
        <meta name="MobileOptimized" content="320" />
        <!--srart theme style -->
        <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/animate.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/bootstrap.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/font-awesome.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/fonts.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/reset.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/owl.carousel.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/owl.theme.default.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/flaticon.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/style.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/responsive.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/library/jquery-ui/jquery-ui.min.css')}}" />
        @yield('css')
        <link rel="stylesheet" type="text/css" href="{{asset('public/css/my_custom_frontend.css')}}" />
        <!-- favicon links -->
        <link rel="shortcut icon" type="image/png" href="{{asset('public/frontend/images/header/favicon.ico')}}" />
    </head>
    <body>
        <!-- preloader Start -->
        <div id="preloader">
            <div id="status"><img src="{{asset('public/frontend/images/header/loadinganimation.gif')}}" id="preloader_image')}}" alt="loader">
            </div>
        </div>
        <!-- Top Scroll End -->
        <!-- Header Wrapper Start -->
        <div class="jp_top_header_img_wrapper">
            <div class="jp_slide_img_overlay"></div>
            <div class="gc_main_menu_wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 hidden-xs hidden-sm full_width">
                            <div class="gc_header_wrapper">
                                <div class="gc_logo">
                                    <a href="{{url('/')}}"><img src="{{asset('public/frontend/images/header/logo.png')}}" alt="Logo" title="Job Pro" class="img-responsive"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-8 col-sm-12 col-xs-12 center_responsive">
                            <div class="header-area hidden-menu-bar stick" id="sticker">
                                <!-- mainmenu start -->
                                <div class="mainmenu">
                                    <div class="gc_right_menu">
                                        <ul>
                                            <li id="search_button">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_3" x="0px" y="0px" viewBox="0 0 451 451" style="enable-background:new 0 0 451 451;" xml:space="preserve">
                                                    <g>
                                                        <path id="search" d="M447.05,428l-109.6-109.6c29.4-33.8,47.2-77.9,47.2-126.1C384.65,86.2,298.35,0,192.35,0C86.25,0,0.05,86.3,0.05,192.3   s86.3,192.3,192.3,192.3c48.2,0,92.3-17.8,126.1-47.2L428.05,447c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4   C452.25,441.8,452.25,433.2,447.05,428z M26.95,192.3c0-91.2,74.2-165.3,165.3-165.3c91.2,0,165.3,74.2,165.3,165.3   s-74.1,165.4-165.3,165.4C101.15,357.7,26.95,283.5,26.95,192.3z" fill="#23c0e9"/>
                                                    </g>
                                                </svg>
                                            </li>
                                            <li>
                                                <div id="search_open" class="gc_search_box">
                                                    <input type="text" placeholder="Search here">
                                                    <button><i class="fa fa-search" aria-hidden="true"></i></button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <ul class="float_left">
                                        <li class="has-mega gc_main_navigation">
                                            <a href="#" class="gc_main_navigation">  Home&nbsp;<i class="fa fa-angle-down"></i></a>
                                            <!-- mega menu start -->
                                            <ul>
                                                <li class="parent"><a href="index.html">Home1</a></li>
                                                <li class="parent"><a href="index_II.html">Home2</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-mega gc_main_navigation">
                                            <a href="#" class="gc_main_navigation">  Listing&nbsp;<i class="fa fa-angle-down"></i></a>
                                            <!-- mega menu start -->
                                            <ul>
                                                <li class="parent"><a href="listing_left.html">Listing-Left</a></li>
                                                <li class="parent"><a href="listing_right.html">Listing-Right</a></li>
                                                <li class="parent"><a href="listing_single.html">listing_single.html</a></li>
                                            </ul>
                                        </li>
                                        <li class="parent gc_main_navigation">
                                            <a href="#" class="gc_main_navigation">Candidates &nbsp;<i class="fa fa-angle-down"></i></a>
                                            <!-- sub menu start -->
                                            <ul>
                                                <li class="parent">
                                                    <a href="#">header style</a>
                                                    <!-- second child menu start -->
                                                    <ul>
                                                        <li><a href="#">header 1</a></li>
                                                        <li><a href="#">header 1 fluid</a></li>
                                                        <li><a href="#">header 2</a></li>
                                                        <li><a href="#">header 2 fluid</a></li>
                                                        <li><a href="#">header sidebar onepage</a></li>
                                                    </ul>
                                                    <!-- second child menu end -->
                                                </li>
                                                <li class="parent">
                                                    <a href="#">slider style</a>
                                                    <!-- second child menu start -->
                                                    <ul>
                                                        <li><a href="#">slider version 1</a></li>
                                                        <li><a href="#">slider version 2</a></li>
                                                        <li><a href="#">slider version 3</a></li>
                                                    </ul>
                                                    <!-- second child menu end -->
                                                </li>
                                                <li class="parent">
                                                    <a href="#">text change style</a>
                                                    <!-- second child menu start -->
                                                    <ul>
                                                        <li><a href="#">clip style</a></li>
                                                        <li><a href="#">push style</a></li>
                                                        <li><a href="#">scale style</a></li>
                                                        <li><a href="#">slide style</a></li>
                                                        <li><a href="#">typed style</a></li>
                                                        <li><a href="#">zoom style</a></li>
                                                        <li><a href="#">rotate 1 style</a></li>
                                                        <li><a href="#">rotate 2 style</a></li>
                                                        <li><a href="#">rotate 3 style</a></li>
                                                        <li><a href="#">loading bar style</a></li>
                                                    </ul>
                                                    <!-- second child menu end -->
                                                </li>
                                                <li class="parent">
                                                    <a href="#">breadcrumb style</a>
                                                    <!-- second child menu start -->
                                                    <ul>
                                                        <li><a href="#">breadcrumb default</a></li>
                                                        <li><a href="#"> breadcrumb left </a></li>
                                                        <li><a href="#"> breadcrumb right</a></li>
                                                        <li><a href="#"> breadcrumb color </a></li>
                                                        <li><a href="#">breadcrumb color left</a></li>
                                                        <li><a href="#">breadcrumb color right</a></li>
                                                    </ul>
                                                    <!-- second child menu end -->
                                                </li>
                                                <li class="parent">
                                                    <a href="#">multilevel dropdown</a>
                                                    <!-- second child menu start -->
                                                    <ul>
                                                        <li><a href="#">second level</a></li>
                                                        <li><a href="#">second level</a></li>
                                                        <li class="parent">
                                                            <a href="#">More level</a>
                                                            <!-- third child menu start -->
                                                            <ul>
                                                                <li><a href="#">third level</a></li>
                                                                <li><a href="#">third level</a></li>
                                                                <li class="parent">
                                                                    <a href="#">More level</a>
                                                                    <!-- fourth child menu start -->
                                                                    <ul>
                                                                        <li><a href="#">forth level</a></li>
                                                                        <li><a href="#">forth level</a></li>
                                                                        <li class="parent">
                                                                            <a href="#">More level</a>
                                                                            <!-- fifth child menu start -->
                                                                            <ul>
                                                                                <li><a href="#">fifth level</a></li>
                                                                                <li><a href="#">fifth level</a></li>
                                                                                <li class="parent">
                                                                                    <a href="#">More level</a>
                                                                                    <!-- sixth child menu start -->
                                                                                    <ul>
                                                                                        <li><a href="#">sixth level</a></li>
                                                                                        <li><a href="#">sixth level</a></li>
                                                                                        <li><a href="#">sixth level</a></li>
                                                                                        <li><a href="#">sixth level</a></li>
                                                                                    </ul>
                                                                                    <!-- sixth child menu start -->
                                                                                </li>
                                                                                <li><a href="#">fifth level</a></li>
                                                                            </ul>
                                                                            <!-- fifth child menu end -->
                                                                        </li>
                                                                        <li><a href="#">forth level</a></li>
                                                                    </ul>
                                                                    <!-- fourth child menu start -->
                                                                </li>
                                                                <li><a href="#">third level</a></li>
                                                            </ul>
                                                            <!-- third child menu end -->
                                                        </li>
                                                        <li><a href="#">second level</a></li>
                                                    </ul>
                                                    <!-- second child menu end -->
                                                </li>
                                            </ul>
                                            <!-- sub menu end -->
                                        </li>
                                        <li class="has-mega gc_main_navigation">
                                            <a href="#" class="gc_main_navigation">  Blog&nbsp;<i class="fa fa-angle-down"></i></a>
                                            <!-- mega menu start -->
                                            <ul>
                                                <li class="parent"><a href="blog_left.html">Blog-Left</a></li>
                                                <li class="parent"><a href="blog_right.html">Blog-Right</a></li>
                                                <li class="parent"><a href="blog_single_left.html">Blog-Single-Left</a></li>
                                                <li class="parent"><a href="blog_single_right.html">Blog-Single-Right</a></li>
                                            </ul>
                                        </li>
                                        <li class="gc_main_navigation parent"><a href="pricing.html" class="gc_main_navigation">Pricing</a></li>
                                        <li class="gc_main_navigation parent"><a href="contact.html" class="gc_main_navigation">Contact</a></li>
                                    </ul>
                                </div>
                                <!-- mainmenu end -->
                                <!-- mobile menu area start -->
                                <header class="mobail_menu">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6">
                                                <div class="gc_logo">
                                                    <a href="index.html"><img src="{{asset('public/frontend/images/header/logo.png')}}" alt="Logo" title="Grace Church"></a>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6">
                                                <div class="cd-dropdown-wrapper">
                                                    <a class="house_toggle" href="#0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 31.177 31.177" style="enable-background:new 0 0 31.177 31.177;" xml:space="preserve" width="25px" height="25px">
                                                            <g>
                                                                <g>
                                                                    <path class="menubar" d="M30.23,1.775H0.946c-0.489,0-0.887-0.398-0.887-0.888S0.457,0,0.946,0H30.23    c0.49,0,0.888,0.398,0.888,0.888S30.72,1.775,30.23,1.775z" fill="#ffffff"/>
                                                                </g>
                                                                <g>
                                                                    <path class="menubar" d="M30.23,9.126H12.069c-0.49,0-0.888-0.398-0.888-0.888c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,8.729,30.72,9.126,30.23,9.126z" fill="#ffffff"/>
                                                                </g>
                                                                <g>
                                                                    <path class="menubar" d="M30.23,16.477H0.946c-0.489,0-0.887-0.398-0.887-0.888c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,16.079,30.72,16.477,30.23,16.477z" fill="#ffffff"/>
                                                                </g>
                                                                <g>
                                                                    <path class="menubar" d="M30.23,23.826H12.069c-0.49,0-0.888-0.396-0.888-0.887c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,23.43,30.72,23.826,30.23,23.826z" fill="#ffffff"/>
                                                                </g>
                                                                <g>
                                                                    <path class="menubar" d="M30.23,31.177H0.946c-0.489,0-0.887-0.396-0.887-0.887c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.398,0.888,0.888C31.118,30.78,30.72,31.177,30.23,31.177z" fill="#ffffff"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                    <nav class="cd-dropdown">
                                                        <h2><a href="#">Job<span>Pro</span></a></h2>
                                                        <a href="#0" class="cd-close">Close</a>
                                                        <ul class="cd-dropdown-content">
                                                            <li>
                                                                <form class="cd-search">
                                                                    <input type="search" placeholder="Search...">
                                                                </form>
                                                            </li>
                                                            <li class="has-children">
                                                                <a href="#">Home</a>
                                                                <ul class="cd-secondary-dropdown is-hidden">
                                                                    <li class="go-back"><a href="#0">Menu</a></li>
                                                                    <li>
                                                                        <a href="index.html">Home1</a>
                                                                    </li>
                                                                    <!-- .has-children -->
                                                                    <li>
                                                                        <a href="index_II.html">Home2</a>
                                                                    </li>
                                                                    <!-- .has-children -->
                                                                </ul>
                                                                <!-- .cd-secondary-dropdown -->
                                                            </li>
                                                            <!-- .has-children -->
                                                            <li class="has-children">
                                                                <a href="#">Listing</a>
                                                                <ul class="cd-secondary-dropdown is-hidden">
                                                                    <li class="go-back"><a href="#0">Menu</a></li>
                                                                    <li>
                                                                        <a href="listing_left.html">Listing-Left</a>
                                                                    </li>
                                                                    <!-- .has-children -->
                                                                    <li>
                                                                        <a href="listing_right.html">Listing-Right</a>
                                                                    </li>
                                                                    <!-- .has-children -->
                                                                    <li>
                                                                        <a href="listing_single.html">Listing-Single</a>
                                                                    </li>
                                                                    <!-- .has-children -->
                                                                </ul>
                                                                <!-- .cd-secondary-dropdown -->
                                                            </li>
                                                            <!-- .has-children -->
                                                            <li class="has-children">
                                                                <a href="#">Candidates</a>
                                                                <ul class="cd-secondary-dropdown is-hidden">
                                                                    <li class="go-back"><a href="#0">Menu</a></li>
                                                                    <li>
                                                                        <a href="#">Candidates</a>
                                                                    </li>
                                                                    <!-- .has-children -->
                                                                    <li>
                                                                        <a href="#">Candidates</a>
                                                                    </li>
                                                                    <!-- .has-children -->
                                                                    <li>
                                                                        <a href="#">Candidates</a>
                                                                    </li>
                                                                    <!-- .has-children -->
                                                                </ul>
                                                                <!-- .cd-secondary-dropdown -->
                                                            </li>
                                                            <!-- .has-children -->
                                                            <li class="has-children">
                                                                <a href="#">Blog</a>
                                                                <ul class="cd-secondary-dropdown is-hidden">
                                                                    <li class="go-back"><a href="#0">Menu</a></li>
                                                                    <li>
                                                                        <a href="blog_left.html">Blog-Left</a>
                                                                    </li>
                                                                    <!-- .has-children -->
                                                                    <li>
                                                                        <a href="blog_right.html">Blog-Right</a>
                                                                    </li>
                                                                    <!-- .has-children -->
                                                                    <li>
                                                                        <a href="blog_single_left.html">Blog-Single-Left</a>
                                                                    </li>
                                                                    <!-- .has-children -->
                                                                    <li>
                                                                        <a href="blog_single_right.html">Blog-Single-Left</a>
                                                                    </li>
                                                                    <!-- .has-children -->
                                                                </ul>
                                                                <!-- .cd-secondary-dropdown -->
                                                            </li>
                                                            <!-- .has-children -->
                                                            <li>
                                                                <a href="pricing.html">Pricing</a>
                                                            </li>
                                                            <!-- .has-children -->
                                                            <li>
                                                                <a href="contact.html">Contact</a>
                                                            </li>
                                                        </ul>
                                                        <!-- .cd-dropdown-content -->
                                                    </nav>
                                                    <!-- .cd-dropdown -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .cd-dropdown-wrapper -->
                                </header>
                            </div>
                        </div>
                        <!-- mobile menu area end -->
                        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 hidden-sm hidden-xs">
                            <div class="jp_navi_right_btn_wrapper">
                                <ul>
                                    <li><a href="#"><i class="fa fa-user"></i>&nbsp; SIGN UP</a></li>
                                    <li><a href="#"><i class="fa fa-sign-in"></i>&nbsp; LOGIN</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @yield('header')
        </div>
        <!-- Header Wrapper End -->
        <!-- jp tittle slider Wrapper Start -->
        @yield('content')
        <!-- jp downlord Wrapper End -->
        <!-- jp Newsletter Wrapper Start -->
        @include('frontend.partials.footer')
        <!-- jp footer Wrapper End -->
        <!--main js file start-->
        <script src="{{asset('public/frontend/js/jquery_min.js')}}"></script>
        <script src="{{asset('public/frontend/js/bootstrap.js')}}"></script>
        <script src="{{asset('public/frontend/js/jquery.menu-aim.js')}}"></script>
        <script src="{{asset('public/frontend/js/jquery.countTo.js')}}"></script>
        <script src="{{asset('public/frontend/js/jquery.inview.min.js')}}"></script>
        <script src="{{asset('public/frontend/js/owl.carousel.js')}}"></script>
        <script src="{{asset('public/frontend/js/modernizr.js')}}"></script>
        <script src="{{asset('public/frontend/js/custom.js')}}"></script>
        <script src="{{asset('public/frontend/library/jquery-ui/jquery-ui.min.js')}}"></script>
        <script src="{{asset('public/js/my_custom_frontend.js')}}"></script>
        <!--main js file end-->
        @yield('js')
    </body>
</html>