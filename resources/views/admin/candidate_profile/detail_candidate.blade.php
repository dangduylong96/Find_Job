@extends('admin.layout.layout')
@section('main_page')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cá Nhân
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Thông tin Cá Nhân</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin Cá Nhân</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Họ và Tên</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Tên Cá Nhân" value="{{old('name',$candidate_info['name'])}}" required disabled>
                                    <span class="error">{{$errors->first('name')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Ngày Sinh</label>
                                <div class="col-sm-10">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input name="dob" type="text" class="form-control pull-right" id="datepicker" placeholder="Dùng dấu - nối ngày sinh: 15-01-1996" value="{{old('dob',date('d-m-Y',strtotime($candidate_info['dob'])))}}" required disabled>
                                    </div>
                                    <span class="error">{{$errors->first('dob')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Giới tính</label>
                                <div class="col-sm-10">
                                    <select id="sex" name="sex" class="form-control select2" style="width: 100%;" disabled>
                                        @foreach($sex as $k=>$v)
                                        <option value="{{$k}}" {{($candidate_info['sex'] == $k ? "selected":"") }}>{{$v}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error">{{$errors->first('sex')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <input name="address" type="text" class="form-control" id="address" placeholder="Nhập địa chỉ" value="{{old('address',$candidate_info['address'])}}" required disabled>
                                    <span class="error">{{$errors->first('address')}}</span>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Số điện thoại</label>
                                <div class="col-sm-10">
                                    <input name="phone" type="text" class="form-control" id="phone" placeholder="Số điện thoại" value="{{old('phone',$candidate_info['phone'])}}" required disabled>
                                    <span class="error">{{$errors->first('phone')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Hình ảnh đại diện</label>
                                <div class="col-sm-10">
                                    <br>
                                    <image id="blah" src="{{url('/').'/'.$candidate_info['image']}}" alt="Hình ảnh Cá Nhân" width="122px" height="133px">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <!-- /.box-footer -->
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('public/admin/bower_components/select2/dist/css/select2.min.css')}}">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{asset('public/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endsection

@section('script')
<!-- Select2 -->
<script src="{{asset('public/admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('public/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    })
    function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function() {
        readURL(this);
    });
    @if(session()->has('message'))
    jQuery(function(){
        jQuery('#model').click();
    });
    @endif
</script>
@endsection