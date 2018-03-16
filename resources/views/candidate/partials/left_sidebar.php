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
                <i class="fa fa-building"></i> <span>Thông tin Tài Khoản</span>
                </a>
            </li>
            <li class="treeview" id="search">
                <a href="#">
                <i class="fa fa-search"></i>
                <span>Trợ giúp nhà tuyển tìm kiếm</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if(strpos(url()->current(),'danh-sach-tro-giup-nha-tuyen-dung.html')!==false) echo 'active'?>" data-active="search"><a href="<?php echo url('/ung-vien/danh-sach-tro-giup-nha-tuyen-dung.html')?>"><i class="fa fa-circle-o"></i> Dang sách trợ giúp</a></li>
                    <li class="<?php if(strpos(url()->current(),'them-tro-giup.html')!==false) echo 'active'?>" data-active="search"><a href="<?php echo url('/ung-vien/them-tro-giup.html')?>"><i class="fa fa-circle-o"></i> Thêm trợ giúp</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Layout Options</span>
                <span class="pull-right-container">
                <span class="label label-primary pull-right">4</span>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                    <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                    <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                    <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                </ul>
            </li>
            <li>
                <a href="pages/widgets.html">
                <i class="fa fa-th"></i> <span>Widgets</span>
                <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
                </span>
                </a>
            </li>
            <li>
                <a href="pages/mailbox/mailbox.html">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <span class="pull-right-container">
                <small class="label pull-right bg-yellow">12</small>
                <small class="label pull-right bg-green">16</small>
                <small class="label pull-right bg-red">5</small>
                </span>
                </a>
            </li>
            <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>