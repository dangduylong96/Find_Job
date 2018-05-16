@extends('candidate.layout.layout')
@section('main_page')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Hồ sơ
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Tạo hồ sơ</li>
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
                        <h3 class="box-title">Thêm các thông tin tìm kiếm để giúp cho nhà tuyển dụng dễ dàng tìm kiếm được hồ sơ của bạn</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{route('candidate_post_add_help_search')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Tiêu đề hồ sơ</label>
                                <div class="col-sm-10">
                                    <input name="title" type="text" class="form-control" id="name" placeholder="Tên Tìm Kiếm" value="{{old('name')}}" required>
                                    <span class="error">{{$errors->first('title')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">ngành</label>
                                <div class="col-sm-10">
                                    <select id="category" name="category" class="form-control select2" style="width: 100%;">
                                        @foreach($category as $k=>$v)
                                        <option value="{{$v->id}}">{{$v->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error">{{$errors->first('sex')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Trình độ</label>
                                <div class="col-sm-10">
                                    <select id="level" name="level" class="form-control select2" style="width: 100%;">
                                        @foreach($level as $k=>$v)
                                        <option value="{{$k}}" {{(old("level") == $k ? "selected":"") }}>{{$v}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error">{{$errors->first('level')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Kinh nghiệm</label>
                                <div class="col-sm-10">
                                    <select id="experience" name="experience" class="form-control select2" style="width: 100%;">
                                        @foreach($experience as $k=>$v)
                                        <option value="{{$k}}" {{(old("experience") == $k ? "selected":"") }}>{{$v}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error">{{$errors->first('experience')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Mức lương</label>
                                <div class="col-sm-10">
                                    <select id="slary" name="slary" class="form-control select2" style="width: 100%;">
                                        @foreach($slary as $k=>$v)
                                        <option value="{{$k}}" {{(old("slary") == $k ? "selected":"") }}>{{$v}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error">{{$errors->first('slary')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nơi làm việc</label>
                                <div class="col-sm-10">
                                    <select id="city" name="city" class="form-control select2" style="width: 100%;">
                                        @foreach($city as $k=>$v)
                                        <option value="{{$k}}" {{(old("city") == $k ? "selected":"") }}>{{$v}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error">{{$errors->first('city')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Cho phép nhà tuyển dụng tìm kiếm</label>
                                <div class="col-sm-10">
                                    <select id="status" name="status" class="form-control select2" style="width: 100%;">
                                        <option value="1" {{(old("status") == 1 ? "selected":"") }}>Cho phép tìm kiếm</option>
                                        <option value="0" {{(old("status") == 0 ? "selected":"") }}>Không cho phép tìm kiếm</option>
                                    </select>
                                    <span class="error">{{$errors->first('status')}}</span>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success btn-block">Tạo</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
        @if(session()->has('message'))
        <button id="model" type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default" style="display:none">Launch Default Modal</button>
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Cập nhập thành công</h4>
                    </div>
                    <div class="modal-body">
                        <p>Cập nhập thông tin tìm kiếm thành công. Bạn có muôn cập nhập thêm hồ sơ? (Thêm hồ sơ sẽ tăng sự quan tâm của nhà tuyển dụng)</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <a href="#"><button type="button" class="btn btn-primary">Cập nhập hồ sơ</button></a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        @endif
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