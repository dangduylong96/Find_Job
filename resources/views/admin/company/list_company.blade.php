@extends('admin.layout.layout')
@section('main_page')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách nhà tuyển dụng
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">quản lí nhà tuyển dụng</li>
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
                                <th>Công ty</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=1;
                        ?>
                        @foreach($list_company as $k=>$v)
                            <tr>
                                <td>{{$i}}</td>
                                <td><a href="<?php echo url('/admin/chi-tiet-cong-ty-'.$v['id'].'.html')?>" target="_blank">{{$v->name}}</a></td>
                                @if($v->status==0)
                                <td><span class="label label-primary">Chờ duyệt</span></td>
                                @elseif($v->status==1)
                                <td><span class="label label-success">Đã Duyệt</span></td>
                                @else
                                <td><span class="label label-danger">Đã hủy</span></td>
                                @endif
                                <td>
                                    <a href="<?php echo url('/admin/duyet-cong-ty-'.$v['id'].'.html')?>"><button type="button" class="btn btn-success">Duyệt</button></a>
                                    <a href="<?php echo url('/admin/huy-cong-ty-'.$v['id'].'.html')?>" onclick="return confirm('Bạn có chắc chắc muốn hủy công ty? hủy công thì tất cả bài viết và thông tin công ty đều k được hiển thị trong mục duyệt và trong website?')"><button type="button" class="btn btn-danger">Hủy</button></a>
                                </td>
                            </tr>
                            <?php $i++; ?>
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