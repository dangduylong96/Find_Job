<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Tìm việc nhanh</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link REL="SHORTCUT ICON" HREF="{{asset('public/images/logo/logo.png')}}">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{asset('public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('public/admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{asset('public/admin/bower_components/Ionicons/css/ionicons.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('public/admin/dist/css/AdminLTE.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('public/admin/plugins/iCheck/square/blue.css')}}">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="{{asset('public/css/my_custom.css')}}">
        <style>
            .login-page, .register-page
            {
                <?php
                  echo "background-image: url('".url('/')."/public/images/background/".mt_rand(1,60).".jpg');";
                ?>   
                background-size:cover;            
            }
        </style>
    </head>
    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="register-logo">
                <a href="#"><b>Nhà Tuyển Dụng</b></a>
            </div>
            <div class="register-box-body">
                <p class="login-box-msg">Đăng kí tài khoản tuyển dụng mới</p>
                <form action="{{route('postRegister')}}" method="post">
                    @csrf
                    <div class="form-group has-feedback">
                        <input name="email" type="email" class="form-control" value="{{old('email')}}" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>          
                        <span class="error">{{$errors->first('email')}}</span>
                    </div>
                    
                    <div class="form-group has-feedback">
                        <input name="password" type="password" class="form-control" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <span class="error">{{$errors->first('password')}}</span>
                    </div>
                    <div class="form-group has-feedback">
                        <input name="repassword" type="password" class="form-control" placeholder="Retype password">
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        <span class="error">{{$errors->first('repassword')}}</span>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng kí</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <a href="{{route('employer_login')}}" class="text-center">Tôi đã có tài khoản</a>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.register-box -->
        <!-- jQuery 3 -->
        <script src="{{asset('public/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{asset('public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <!-- iCheck -->
        <script src="{{asset('public/admin/plugins/iCheck/icheck.min.js')}}"></script>
        <script>
            $(function () {
              $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
              });
            });
        </script>
    </body>
</html>