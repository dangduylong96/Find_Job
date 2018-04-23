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
            <li class="<?php if(strpos(url()->current(),'thong-tin-tai-khoan.html')!==false) echo 'active'?>">
                <a href="thong-tin-tai-khoan.html">
                <i class="fa fa-building"></i> <span>Quản lí thông tin tài khoản</span>
                </a>
            </li>
            <li class="treeview" id="search">
                <a href="#">
                <i class="fa fa-search"></i>
                <span>Quản lí hồ sơ</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if(strpos(url()->current(),'danh-sach-tro-giup-nha-tuyen-dung.html')!==false) echo 'active'?>" data-active="search"><a href="<?php echo url('/ung-vien/danh-sach-tro-giup-nha-tuyen-dung.html')?>"><i class="fa fa-circle-o"></i> Dang sách hồ sơ</a></li>
                    <li class="<?php if(strpos(url()->current(),'them-tro-giup.html')!==false) echo 'active'?>" data-active="search"><a href="<?php echo url('/ung-vien/them-tro-giup.html')?>"><i class="fa fa-circle-o"></i> Tạo hồ sơ</a></li>
                </ul>
            </li>
            <li class="<?php if(strpos(url()->current(),'danh-sach-ung-tuyen.html')!==false) echo 'active'?>">
                <a href="danh-sach-ung-tuyen.html">
                <i class="fa fa-save"></i> <span>Việc làm đã ứng tuyển</span>
                </a>
            </li>
            <li class="<?php if(strpos(url()->current(),'danh-sach-yeu-thich.html')!==false) echo 'active'?>">
                <a href="danh-sach-yeu-thich.html">
                <i class="fa fa-heart"></i> <span>Việc làm đã đã yêu thích</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>