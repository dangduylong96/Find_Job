@extends('employer.layout.layout')
@section('main_page')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            bài đăng
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Sửa bài đăng</li>
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
                        <h3 class="box-title">Sửa bài đăng</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{url('/')}}/employer/sua-tin-{{$id}}.html" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Tiêu đề</label>
                                <div class="col-sm-10">
                                    <input name="title" type="text" class="form-control" placeholder="Tiêu đề tuyển dụng" value="{{old('title',$current_post['title'])}}" required>
                                    <span class="error">{{$errors->first('title')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Số lượng cần tuyển</label>
                                <div class="col-sm-10">
                                    <input name="qty_candidate" type="number" class="form-control" id="address" placeholder="Số lượng" value="{{old('qty_candidate',$current_post['qty_candidate'])}}" required>
                                    <span class="error">{{$errors->first('qty_candidate')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Giới tính</label>
                                <div class="col-sm-10">
                                    <select id="sex" name="sex" class="form-control select2" style="width: 100%;">
                                        @foreach($list_sex as $k=>$v)
                                        <option value="{{$k}}" {{(old("sex",$current_post['sex']) == $k ? "selected":"") }}>{{$v}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error">{{$errors->first('sex')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nghành</label>
                                <div class="col-sm-10">
                                    <select id="category" class="form-control select2" name="category[]" multiple="multiple" data-placeholder="Chọn nghành, tối đa 5 ngành" style="width: 100%;">
                                    @if(count($category)>0)
                                    @foreach($category as $v)
                                    <option value="{{$v}}" selected="selected">{{MyLibrary::getNameCategory($v)}}</option>
                                    @endforeach
                                    @endif
                                    </select>
                                    <span class="error">{{$errors->first('category')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Mô tả công việc</label>
                                <div class="col-sm-10">
                                    <textarea name="desc" class="form-control" rows="10"  placeholder="Sơ lược về bài đăng" required>{{old('desc',$current_post['desc'])}}</textarea>
                                    <span class="error">{{$errors->first('desc')}}</span>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Yêu cầu công việc</label>
                                <div class="col-sm-10">
                                    <textarea name="requirement" class="form-control" rows="10"  placeholder="Yêu cầu công việc" required>{{old('requirement',$current_post['requirement'])}}</textarea>
                                    <span class="error">{{$errors->first('requirement')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Hình thức làm việc</label>
                                <div class="col-sm-10">
                                    <select id="working_form" name="working_form" class="form-control select2" style="width: 100%;">
                                        @foreach($list_working_form as $k=>$v)
                                        <option value="{{$k}}" {{(old("working_form",$current_post['working_form']) == $k ? "selected":"") }}>{{$v}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error">{{$errors->first('working_form')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Trình độ</label>
                                <div class="col-sm-10">
                                    <select id="level" name="level" class="form-control select2" style="width: 100%;">
                                        @foreach($level as $k=>$v)
                                        <option value="{{$k}}" {{(old("level",$current_post['level']) == $k ? "selected":"") }}>{{$v}}</option>
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
                                        <option value="{{$k}}" {{(old("experience",$current_post['experience']) == $k ? "selected":"") }}>{{$v}}</option>
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
                                        <option value="{{$k}}" {{(old("slary",$current_post['slary']) == $k ? "selected":"") }}>{{$v}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error">{{$errors->first('slary')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Thời gian thử việc</label>
                                <div class="col-sm-10">
                                    <select id="time_try" name="time_try" class="form-control select2" style="width: 100%;">
                                        @foreach($time_try as $k=>$v)
                                        <option value="{{$k}}" {{(old("time_try",$current_post['time_try']) == $k ? "selected":"") }}>{{$v}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error">{{$errors->first('time_try')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Quyền Lợi</label>
                                <div class="col-sm-10">
                                    <textarea name="benefit" class="form-control" rows="10"  placeholder="Sơ lược về bài đăng">{{old('benefit',$current_post['benefit'])}}</textarea>
                                    <span class="error" required>{{$errors->first('benefit')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nơi làm việc</label>
                                <div class="col-sm-10">
                                    <select id="workplace" name="workplace" class="form-control select2" style="width: 100%;">
                                        @foreach($city as $k=>$v)
                                        <option value="{{$k}}" {{(old("workplace",$current_post['workplace']) == $k ? "selected":"") }}>{{$v}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error">{{$errors->first('workplace')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Ngày hết hạn</label>
                                <div class="col-sm-10">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input name="expiration_date" type="text" class="form-control pull-right" id="datepicker" value="{{old('expiration_date',date('d-m-Y',strtotime($current_post['expiration_date'])))}}" required>
                                    </div>
                                    <span class="error">{{$errors->first('expiration_date')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Keywords</label>
                                <div class="col-sm-10">
                                    <select id="tags" class="form-control select2" name="tags[]" multiple="multiple" data-placeholder="Chọn keyword.." style="width: 100%;">
                                        @if(count($tags)>0)
                                        @foreach($tags as $v)
                                        <option value="{{$v}}" selected="selected">{{$v}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    <span class="error">{{$errors->first('tags')}}</span>
                                </div>
                            </div>
                            <hr>
                            <h4 style="color:green">Thông tin liên hệ</h4>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Tên người liên hệ</label>
                                <div class="col-sm-10">
                                    <input name="name_contact" type="text" class="form-control" placeholder="Tên người liên hệ" value="{{old('name_contact',$detail_contact['name_contact'])}}" required>
                                    <span class="error">{{$errors->first('name_contact')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input name="email_contact" type="email" class="form-control" placeholder="Email người liên hệ" value="{{old('email_contact',$detail_contact['email_contact'])}}" required>
                                    <span class="error">{{$errors->first('email_contact')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <input name="address_contact" type="text" class="form-control" placeholder="Địa chỉ người liên hệ" value="{{old('address_contact',$detail_contact['address_contact'])}}" required>
                                    <span class="error">{{$errors->first('address_contact')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Số điện thoại</label>
                                <div class="col-sm-10">
                                    <input name="mobile_contact" type="text" class="form-control" placeholder="Số điện thoại người liên hệ" value="{{old('mobile_contact',$detail_contact['mobile_contact'])}}" required>
                                    <span class="error">{{$errors->first('mobile_contact')}}</span>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success btn-block">Sửa</button>
                        </div>
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
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: "dd-mm-yyyy"
    })
    $('.select2').select2();
    $("#tags").select2({
        multiple: true,
        tags: true,
        data: [1,2,3],
        ajax: {
            url: '{{url('/')}}/employer/ajax-list-tags.html',
            dataType: 'json',
            processResults: function(data) {
                return {
                    results: data
                };
            }
        },
        // max tags is 5
        maximumSelectionLength: 5,

        // add "(new tag)" for new tags
        createTag: function (params) {
            var term = $.trim(params.term);

            if (term === '') {
                return null;
            }
            return {
                id: term,
                text: term + ' (new keyword)'
            };
        },
    });
    $("#category").select2({
        ajax: {
            url: '{{url('/')}}/employer/ajax-list-category.html',
            dataType: 'json',
            processResults: function(data) {
                return {
                    results: data
                };
            }
        },
        // max tags is 5
        maximumSelectionLength: 5,
    });
</script>
@endsection