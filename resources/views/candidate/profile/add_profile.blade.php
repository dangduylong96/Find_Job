@extends('candidate.layout.layout')
@section('main_page')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            hồ sơ
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Thêm hồ sơ</li>
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
                        <h3 class="box-title title-custom">Mục tiêu nghề nghiệp</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{route('post_add_employer')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_profile" value="{{$id}}">
                        <div class="box-body">
                            <div id="target" class="form-group">
                                @if(empty($profile['target']))
                                <div id="button_target" class="button-custom">
                                    <button id="add_target" type="button" class="btn btn-success btn-lg"><i class="fa fa-plus"> Thêm mục tiêu nghề nghiệp</i></button>
                                </div>
                                @else
                                <label for="inputEmail3" class="col-sm-2 control-label">Mục tiêu</label>
                                <div class="col-sm-10">
                                    <textarea name="target" class="form-control" rows="10"  placeholder="Mục tiêu nghề nghiệp" required disabled>{{json_decode($profile['target'])->target}}</textarea>
                                </div>
                                <div id="button_target" class="button-custom">
                                    <button id="edit_target" type="button" class="btn btn-info btn-lg"><i class="fa fa-save">Sửa</i></button>
                                </div>
                                @endif
                            </div>
                            <hr>
                            <div class="box-header with-border">
                                <h3 class="box-title title-custom">Kinh Nghiệm Làm Việc</h3>
                                <button type="button" class="btn btn-default btn-sm button-collapse" data-toggle="collapse" data-target="#experience"><i class="fa fa-sort-desc"> Mở rộng</i></button>
                            </div>
                            <div id="experience" class="collapse in">
                                <div class="list_collapse">
                                </div>
                                @if(!empty($profile['experience']))
                                @foreach(json_decode($profile['experience'],true) as $k=>$v)
                                <div class="list_collapse" data-remove="{{$k}}">
                                    <div class="header_list">
                                        <h3>{{$v['experience_name_company']}}</h3>
                                        <button type="button" class="btn btn-default btn-sm button-collapse" data-toggle="collapse" data-target="#experience_{{$k}}"><i class="fa fa-sort-desc"> Mở rộng</i></button>
                                        <button data-edit="{{$k}}" type="button" class="btn btn-default btn-sm edit_experience"><i class="fa fa-edit"> Sửa</i></button>
                                        <button data-remove="{{$k}}" type="button" class="btn btn-default btn-sm remove_experience" >Xóa</button>
                                    </div>
                                    <table id="experience_{{$k}}" class="show_data_profile_form collapse">
                                        <tr>
                                            <td><p>Tên công ty:</p></td>
                                            <td><p><span>{{$v['experience_name_company']}}</span><p></td>
                                        </tr>
                                        <tr>
                                            <td><p>Chức vụ:</p></td>
                                            <td><p><span>{{$v['experience_title']}}</span><p></td>
                                        </tr>
                                        <tr>
                                            <td><p>Thời gian làm việc:</p></td>
                                            <td><p><span>{{$v['experience_time']}} tháng</span><p></td>
                                        </tr>
                                        <tr>
                                            <td><p>Mô tả công việc:</p></td>
                                            <td><p><span>{{substr($v['experience_desc'],0,50)}}.....</span><p></td>
                                        </tr>
                                        <tr>
                                            <td><p>Thành tích đạt được:</p></td>
                                            <td><p><span>{{substr($v['experience_medal'],0,50)}}...</span><p></td>
                                        </tr>
                                    </table>
                                </div>
                                @endforeach
                                @endif
                                <div id="button_target" class="button-custom">
                                    <button id="add_experience" type="button" class="btn btn-success btn-lg"><i class="fa fa-plus"> Thêm mục kinh nghiệm làm việc</i></button>
                                </div>
                            </div>
                            <div class="box-header with-border">
                                <h3 class="box-title title-custom">Trình độ bằng cấp</h3>
                                <button type="button" class="btn btn-default btn-sm button-collapse" data-toggle="collapse" data-target="#level"><i class="fa fa-sort-desc"> Mở rộng</i></button>
                            </div>
                            <div id="level" class="collapse in">
                                <div class="list_collapse">
                                </div>
                                @if(!empty($profile['level']))
                                @foreach(json_decode($profile['level'],true) as $k=>$v)
                                <div class="list_collapse" data-remove="{{$k}}">
                                    <div class="header_list">
                                        <h3>{{$setting_level[$v['name_level']]}}</h3>
                                        <button type="button" class="btn btn-default btn-sm button-collapse" data-toggle="collapse" data-target="#level_{{$k}}"><i class="fa fa-sort-desc"> Mở rộng</i></button>
                                        <button data-edit="{{$k}}" type="button" class="btn btn-default btn-sm edit_level"><i class="fa fa-edit"> Sửa</i></button>
                                        <button data-remove="{{$k}}" type="button" class="btn btn-default btn-sm remove_level" >Xóa</button>
                                    </div>
                                    <table id="level_{{$k}}" class="show_data_profile_form collapse">
                                        <tr>
                                            <td><p>Trình độ:</p></td>
                                            <td><p><span>{{$setting_level[$v['name_level']]}}</span><p></td>
                                        </tr>
                                        <tr>
                                            <td><p>Đơn vị đào tạo:</p></td>
                                            <td><p><span>{{$v['tranning_unit_level']}}</span><p></td>
                                        </tr>
                                        <tr>
                                            <td><p>Chuyên nghành:</p></td>
                                            <td><p><span>{{$v['specialized_level']}}</span><p></td>
                                        </tr>
                                        <tr>
                                            <td><p>Xếp loại:</p></td>
                                            <td><p><span>{{$setting_type_level[$v['type_level']]}}</span><p></td>
                                        </tr>
                                    </table>
                                </div>
                                @endforeach
                                @endif
                                <div id="button_target" class="button-custom">
                                    <button id="add_level" type="button" class="btn btn-success btn-lg"><i class="fa fa-plus"> Thêm mục trình độ</i></button>
                                </div>
                            </div>
                            <div class="box-header with-border">
                                <h3 class="box-title title-custom">Trình độ và bằng cấp</h3>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Hình thức làm việc</label>
                                <div class="col-sm-10">
                                    <select id="working_form" name="working_form" class="form-control select2" style="width: 100%;">
                                        @foreach($list_working_form as $k=>$v)
                                        <option value="{{$k}}" {{(old("working_form") == $k ? "selected":"") }}>{{$v}}</option>
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
                                <label for="inputEmail3" class="col-sm-2 control-label">Thời gian thử việc</label>
                                <div class="col-sm-10">
                                    <select id="time_try" name="time_try" class="form-control select2" style="width: 100%;">
                                        @foreach($time_try as $k=>$v)
                                        <option value="{{$k}}" {{(old("time_try") == $k ? "selected":"") }}>{{$v}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error">{{$errors->first('time_try')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Quyền Lợi</label>
                                <div class="col-sm-10">
                                    <textarea name="benefit" class="form-control" rows="10"  placeholder="Sơ lược về hồ sơ">{{old('benefit')}}</textarea>
                                    <span class="error" required>{{$errors->first('benefit')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nơi làm việc</label>
                                <div class="col-sm-10">
                                    <select id="workplace" name="workplace" class="form-control select2" style="width: 100%;">
                                        @foreach($city as $k=>$v)
                                        <option value="{{$k}}" {{(old("workplace") == $k ? "selected":"") }}>{{$v}}</option>
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
                                        <input name="expiration_date" type="text" class="form-control pull-right" id="datepicker" value="{{old('expiration_date')}}" required>
                                    </div>
                                    <span class="error">{{$errors->first('expiration_date')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Keywords</label>
                                <div class="col-sm-10">
                                    <select id="tags" class="form-control select2" name="tags[]" multiple="multiple" data-placeholder="Chọn keyword.." style="width: 100%;">
                                        
                                    </select>
                                    <span class="error">{{$errors->first('tags')}}</span>
                                </div>
                            </div>
                            <hr>
                            <h4 style="color:green">Thông tin liên hệ</h4>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Tên người liên hệ</label>
                                <div class="col-sm-10">
                                    <input name="name_contact" type="text" class="form-control" placeholder="Tên người liên hệ" value="{{old('name_contact')}}" required>
                                    <span class="error">{{$errors->first('name_contact')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input name="email_contact" type="email" class="form-control" placeholder="Email người liên hệ" value="{{old('email_contact')}}" required>
                                    <span class="error">{{$errors->first('email_contact')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <input name="address_contact" type="text" class="form-control" placeholder="Địa chỉ người liên hệ" value="{{old('address_contact')}}" required>
                                    <span class="error">{{$errors->first('address_contact')}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Số điện thoại</label>
                                <div class="col-sm-10">
                                    <input name="mobile_contact" type="text" class="form-control" placeholder="Số điện thoại người liên hệ" value="{{old('mobile_contact')}}" required>
                                    <span class="error">{{$errors->first('mobile_contact')}}</span>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success btn-block">Thêm</button>
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
<script src="{{asset('public/js/candidate_profile.js')}}"></script>
<script>
    //Date picker
    $('.datepicker').datepicker({
        startView: "months",
        autoclose: true,
        format: "dd-mm-yyyy"
    })
    $('.select2').select2();
    $("#tags").select2({
        multiple: true,
        tags: true,
        ajax: {
            url: 'http://localhost:90/Find_Job/employer/ajax-list-tags.html',
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
</script>
@endsection