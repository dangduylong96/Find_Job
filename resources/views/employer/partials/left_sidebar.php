<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Quản trị</li>
            <li class="<?php if(strpos(url()->current(),'dashboard.html')!==false) echo 'active'?>">
                <a href="dashboard.html">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a target="_blank" href="tim-kiem-ung-vien.html">
                <i class="fa fa-search"></i> <span>Tìm kiếm ứng viên</span>
                </a>
            </li>
            <li class="<?php if(strpos(url()->current(),'thong-tin-cong-ty.html')!==false) echo 'active'?>">
                <a href="thong-tin-cong-ty.html">
                <i class="fa fa-building"></i> <span>Quản lí thông tin tài khoản</span>
                </a>
            </li>
            <li class="treeview" id="post">
                <a href="#">
                <i class="fa  fa-sticky-note-o"></i>
                <span>Quản lí tin tuyển dụng</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if(strpos(url()->current(),'danh-sach-tin.html')!==false) echo 'active'?>" data-active="post"><a href="<?php echo url('/employer/danh-sach-tin.html')?>"><i class="fa fa-circle-o"></i> Dang sách tin tuyển dụng</a></li>
                    <li class="<?php if(strpos(url()->current(),'them-tin.html')!==false) echo 'active'?>" data-active="post"><a href="<?php echo url('/employer/them-tin.html')?>"><i class="fa fa-circle-o"></i> Đăng tin</a></li>
                </ul>
            </li>
            <li class="<?php if(strpos(url()->current(),'danh-sach-cv-luu.html')!==false) echo 'active'?>">
                <a href="danh-sach-cv-luu.html">
                <i class="fa fa-save"></i> <span>Danh sách CV ứng tuyển</span>
                </a>
            </li>
            <li class="<?php if(strpos(url()->current(),'danh-sach-tim-kiem-cv.html')!==false) echo 'active'?>">
                <a href="danh-sach-tim-kiem-cv.html">
                <i class="fa fa-save"></i> <span>Danh sách CV lưu khi tìm kiếm</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>