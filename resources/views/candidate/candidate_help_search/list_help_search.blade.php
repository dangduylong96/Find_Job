@extends('candidate.layout.layout')
@section('main_page')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách hồ sơ
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Danh sách hồ sơ</li>
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
                                <th>Tiêu đề</th>
                                <th>Lượt Xem</th>
                                <th>Ngày tạo</th>
                                <th>Hiện/Ẩn</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=1;
                        ?>
                        @foreach($list as $k=>$v)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$v['title']}}</td>
                                <td>{{$v['view']}}</td>
                                <td>{{date('d-m-Y',strtotime($v['created_at']))}}</td>                            
                                <td>{!!createLabelShowHide($v['display'])!!}</td>
                                <td>{!!createLabel2($v['status'])!!}</td>
                                <td>
                                    @if($v['status']!=2)
                                    <a href="<?php echo url('/ung-vien/sua-tro-giup-'.$v['id'].'.html')?>"><button type="button" class="btn btn-info">Sửa</button></a>
                                    <a href="<?php echo url('/ung-vien/chi-tiet-ho-so-'.$v['id'].'.html')?>"><button type="button" class="btn btn-success">Thêm Chi tiết</button></a>
                                    <a href="<?php echo url('/ung-vien/xoa-tro-giup-'.$v['id'].'.html')?>" onclick="return confirm('Bạn có chắc chắn muốn xóa hồ sơ này?')"><button type="button" class="btn btn-danger">Xóa</button></a>
                                    @endif
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