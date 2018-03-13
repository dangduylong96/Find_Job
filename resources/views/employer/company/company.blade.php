@extends('employer.layout.layout')
@section('main_page')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Công Ty
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Thông tin Công Ty</li>
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
                        <h3 class="box-title">Thông tin công ty</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{route('employer_update_company')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Tên công ty</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Tên công ty" value="{{old('name',$company['name'])}}" required>
                                    <span class="error">{{$errors->first('name')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <input name="address" type="text" class="form-control" id="address" placeholder="Nhập địa chỉ" value="{{old('address',$company['address'])}}" required>
                                    <span class="error">{{$errors->first('address')}}</span>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Số điện thoại</label>
                                <div class="col-sm-10">
                                    <input name="phone" type="text" class="form-control" id="phone" placeholder="Số điện thoại" value="{{old('phone',$company['phone'])}}" required>
                                    <span class="error">{{$errors->first('phone')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Tỉnh Thành Phố</label>
                                <div class="col-sm-10">
                                    <select id="city" name="city" class="form-control select2" style="width: 100%;">
                                        @foreach($list_place as $k=>$v)
                                        <option value="{{$k}}" {{($k == $company['place'] ? "selected":"") }}>{{$v}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error">{{$errors->first('city')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Qui Mô</label>
                                <div class="col-sm-10">
                                    <select id="size" name="size" class="form-control select2" style="width: 100%;">
                                        @foreach($list_size as $k=>$v)
                                        <option value="{{$k}}" {{($k == $company['size'] ? "selected":"") }}>{{$v}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error">{{$errors->first('size')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Sơ lược về công ty</label>
                                <div class="col-sm-10">
                                    <textarea name="desc" class="form-control" rows="10"  placeholder="Sơ lược về công ty">{{old('desc',$company['desc'])}}</textarea>
                                    <span class="error">{{$errors->first('desc')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Logo</label>
                                <div class="col-sm-10">
                                    <input name="image" type="file" id="imgInp">
                                    <span class="error">{{$errors->first('image')}}</span>
                                    <br>
                                    <image id="blah" src="{{url('/').'/'.$company['image']}}" alt="Hình ảnh công ty" width="122px" height="133px">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Website</label>
                                <div class="col-sm-10">
                                    <input name="website" type="url" class="form-control" id="name" placeholder="Địa chỉ trang web" value="{{old('website',$company['website'])}}" required>
                                    <span class="error">{{$errors->first('website')}}</span>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success btn-block">Cập nhập</button>
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
                        <p>Cập nhập thành công công ty!!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
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
@endsection

@section('script')
<!-- Select2 -->
<script src="{{asset('public/admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
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