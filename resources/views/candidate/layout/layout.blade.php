<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Ứng Viên</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link REL="SHORTCUT ICON" HREF="{{asset('public/images/logo/logo.png')}}">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{asset('public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('public/admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{asset('public/admin/bower_components/Ionicons/css/ionicons.min.css')}}">
        @yield('css')
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('public/admin/dist/css/AdminLTE.min.css')}}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{asset('public/admin/dist/css/skins/_all-skins.min.css')}}">
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="{{asset('public/css/my_custom.css')}}">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="{{url('/')}}" class="logo" target="_blank">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>Tìm Việc Nhanh</b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Tìm Việc</b>Nhanh</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="{{url('/')}}/dang-xuat.html" onclick="return confirm('Bạn có chắc chắn muốn thoát??')">
                                <span class="hidden-xs">Đăng xuất</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            @include('candidate.partials.left_sidebar')
            <!-- Content Wrapper. Contains page content -->
            @yield('main_page')
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.4.0
                </div>
                <strong>Copyright &copy; 2018-2019 <a href="#">Tìm việc nhanh</a>.</strong> All rights
                reserved.
            </footer>
            <!-- Add the sidebar's background. This div must be placed
                immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
        <!-- jQuery 3 -->
        <script src="{{asset('public/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{asset('public/admin/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{asset('public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('public/admin/dist/js/adminlte.min.js')}}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{asset('public/admin/dist/js/pages/dashboard.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('public/admin/dist/js/demo.js')}}"></script>
        <script>
            var add_active=$("li[class='active']").attr("data-active");
            var array = add_active.split(",");
            array.forEach(function(item)
            {
                $("#"+item+"").addClass('active');
            })
        </script>
        @yield('script')
    </body>
</html>