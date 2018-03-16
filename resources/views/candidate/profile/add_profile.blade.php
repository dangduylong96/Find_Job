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
                @if(session()->has('message'))
                    <?php
                        $mg=session('message');
                        echo createMessage($mg['status'],$mg['content']);
                    ?>
                @endif
                    <div class="box-header with-border">
                        <h3 class="box-title title-custom">Mục tiêu nghề nghiệp</h3>
                        <button type="button" class="btn btn-default btn-sm button-collapse" data-toggle="collapse" data-target="#target"><i class="fa fa-sort-desc"> Mở rộng</i></button>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_profile" value="{{$id}}">
                        <div class="box-body">
                            <div id="target" class="form-group collapse">
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
                            <div class="box-header with-border">
                                <h3 class="box-title title-custom">Kinh Nghiệm Làm Việc</h3>
                                <button type="button" class="btn btn-default btn-sm button-collapse" data-toggle="collapse" data-target="#experience"><i class="fa fa-sort-desc"> Mở rộng</i></button>
                            </div>
                            <div id="experience" class="collapse">
                                <div class="list_collapse_experience">
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
                            <div id="level" class="collapse ">
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
                                <h3 class="box-title title-custom">Trình độ tiếng anh</h3>
                                <button type="button" class="btn btn-default btn-sm button-collapse" data-toggle="collapse" data-target="#english"><i class="fa fa-sort-desc"> Mở rộng</i></button>
                            </div>
                            <div id="english" class="form-group collapse">
                                @if(empty($profile['english']))
                                <div id="button_target" class="button-custom">
                                    <button id="add_english" type="button" class="btn btn-success btn-lg"><i class="fa fa-plus"> Thêm trình độ tiếng anh</i></button>
                                </div>
                                @else
                                <label for="inputEmail3" class="col-sm-2 control-label">Sơ lược về tiếng anh</label>
                                <div class="col-sm-10">
                                    <textarea name="english" class="form-control" rows="10"  placeholder="Nên ghi bằng những gạch đầu dòng" required disabled>{{json_decode($profile['english'])->english}}</textarea>
                                </div>
                                <div id="button_target" class="button-custom">
                                    <button id="edit_english" type="button" class="btn btn-info btn-lg"><i class="fa fa-save">Sửa</i></button>
                                </div>
                                @endif
                            </div>
                            <div class="box-header with-border">
                                <h3 class="box-title title-custom">Kĩ năng và Sở trường</h3>
                                <button type="button" class="btn btn-default btn-sm button-collapse" data-toggle="collapse" data-target="#advantages"><i class="fa fa-sort-desc"> Mở rộng</i></button>
                            </div>
                            <div id="advantages" class="form-group collapse">
                                @if(empty($profile['advantages']))
                                <div id="button_target" class="button-custom">
                                    <button id="add_advantages" type="button" class="btn btn-success btn-lg"><i class="fa fa-plus"> Thêm kĩ năng sở trường</i></button>
                                </div>
                                @else
                                <label for="inputEmail3" class="col-sm-2 control-label">Liệt kê kĩ năng sở trường</label>
                                <div class="col-sm-10">
                                    <textarea name="advantages" class="form-control" rows="10"  placeholder="Liệt kê bằng các gạch đầu dòng" required disabled>{{json_decode($profile['advantages'])->advantages}}</textarea>
                                </div>
                                <div id="button_target" class="button-custom">
                                    <button id="edit_advantages" type="button" class="btn btn-info btn-lg"><i class="fa fa-save">Sửa</i></button>
                                </div>
                                @endif
                            </div>
                            <div class="box-header with-border">
                                <h3 class="box-title title-custom">Hồ sơ bổ sung</h3>
                                <button type="button" class="btn btn-default btn-sm button-collapse" data-toggle="collapse" data-target="#cv_form"><i class="fa fa-sort-desc"> Mở rộng</i></button>
                            </div>
                            </form>
                            <div id="cv_form" class="collapse">
                                <form id="upload_cv" action="http://localhost:90/Find_Job/ung-vien/upload-ho-so.html" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_profile1" value="{{$id}}">
                                    <div id="cv" class="form-group">                               
                                        <div class="list_collapse">
                                            <table class="show_data_profile_form" with="300">
                                                <tr>
                                                    <td with="200px"><p>Hồ sơ hiện tại:</p></td>
                                                    @if(empty($profile['cv']))
                                                    <td><p><span> Chưa có hồ sơ</span><p></td>
                                                    @else
                                                    <td><p><span> <a target="_blank" href="{{asset('public/cv/'.$profile['cv'])}}">{{$profile['cv']}}</a></span><p></td>
                                                    @endif
                                                </tr>
                                            </table>
                                        </div>                            
                                        <label class="col-sm-2 control-label">Hồ sơ</label>
                                        <div class="col-sm-10">
                                            <input id="image" name="cv" class="form-control" type="file" placehoder="Chọn file upload hồ sơ">
                                            @if(session()->has('error_upload_cv'))
                                            <span class="error">{{session('error_upload_cv')}}</span>
                                            @endif
                                        </div>
                                        <div id="button_target" class="button-custom">
                                            <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-save">Upload</i></button>
                                        </div>                                   
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-danger btn-block">Xem trước hồ sơ</button>
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