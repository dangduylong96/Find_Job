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
        <link rel="stylesheet" type="text/css" href="{{asset('public/admin/bower_components/select2/dist/css/select2.min.css')}}" />
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
                                    <ul class="float_left">
                                        <li class="gc_main_navigation parent"><a href="contact.html" class="gc_main_navigation" style="visibility: hidden;">Mục ẩn đi</a></li>
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
                                    @if(!Auth::check())
                                    <li><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal1"><i class="fa fa-user"></i>&nbsp; Đăng kí</a></li>
                                    <li><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal"><i class="fa fa-sign-in"></i>&nbsp; Đăng Nhập</a></li>
                                    @elseif(Auth::user()->type=="employer")
                                    <a href="{{url('/')}}/employer/dashboard.html" target="_blank"><button class="btn btn-danger btn-lg btn-block"><i class="fa fa-sign-in"></i>&nbsp; Quay lại trang nhà tuyển dụng</button></a>
                                    @elseif(Auth::user()->type=="candidate")
                                    <a href="{{url('/')}}/ung-vien/dashboard.html" target="_blank"><button class="btn btn-danger btn-lg btn-block"><i class="fa fa-sign-in"></i>&nbsp; Quay lại trang người tìm việc</button></a>
                                    @endif                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Wrapper End -->
        <!-- jp tittle slider Wrapper Start -->
        @include('frontend.partials.footer_register')
        
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
        <script src="{{asset('public/admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
        <script>
            $( function() {
                $('.select2').select2();
            });
        </script>
        <!--main js file end-->
        @yield('js')
    </body>
</html>