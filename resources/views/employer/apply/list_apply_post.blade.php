@extends('employer.layout.layout')
@section('main_page')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản Lí Tin tuyển dụng
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Danh sách Tin tuyển dụng</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="box">
                @if(session()->has('message'))
                    <?php
                        $mg=session('message');
                        echo createMessage($mg['status'],$mg['content']);
                    ?>
                @endif
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Tiêu đề tuyển dụng</th>
                                <th>Số điện thoại</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=1;
                        ?>
                        @foreach($Manager_cadidate_and_post as $k=>$v)
                        @if($v->candidate->status==1)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$v->candidate->name}}</td>
                                <td>{{$v->postemployer->title}}</td>
                                <td>{{$v->candidate->phone}}</td>
                                @if(!isset($v->manager_cv_company) || $v->manager_cv_company->status!=1)
                                <td><small class="label label-danger"><i class="fa fa-clock-o"></i>Chưa lưu </small></td>
                                @else
                                <td><small class="label label-success"><i class="fa fa-clock-o"></i>Đã lưu </small></td>
                                @endif
                                <td>
                                    <a href="chi-tiet-cv-{{$v->id}}.html" target="_blank"><button type="button" class="btn btn-info">Xem CV</button></a>
                                    <a href="luu-cv-{{$v->id}}.html"><button type="button" class="btn btn-danger">Lưu CV</button></a>
                                    <a href="huy-luu-cv-{{$v->id}}.html"><button type="button" class="btn btn-default">Hủy Lưu</button></a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('public/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('script')
<!-- DataTables -->
<script src="{{asset('public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
$(function () {
    $('#example1').DataTable()
})
</script>
@endsection