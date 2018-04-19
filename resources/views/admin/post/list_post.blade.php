@extends('admin.layout.layout')
@section('main_page')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản Lí Tin tuyển dụng
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
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
                                <th>Tin tuyển dụng</th>
                                <th>Hết hạn</th>
                                <th>Chủ nhân</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=1;
                        ?>
                        @foreach($list_post as $k=>$v)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$v->title}}</td>
                                <td>{{date('d-m-Y',strtotime($v['expiration_date']))}}</td>
                                <td>{{$v->name}}</td>
                                <td>{!!createLabel($v['status'])!!}</td>
                                <td>
                                    <a href="<?php echo url('/admin/sua-tin-'.$v->id.'.html')?>"><button type="button" class="btn btn-info">Sửa</button></a>
                                    <a href="<?php echo url('/admin/duyet-tin-'.$v->id.'.html')?>"><button type="button" class="btn btn-success">Duyệt</button></a>
                                    <a href="<?php echo url('/admin/huy-tin-'.$v->id.'.html')?>" onclick="return confirm('Bạn có chắc chắc muốn hủy tin? hủy tin tuyển dụng thì tin tuyển dụng sẽ k được hiển thị trên website?')"><button type="button" class="btn btn-danger">Hủy</button></a>
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