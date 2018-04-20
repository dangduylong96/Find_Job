<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Quản trị</li>
            <li class="<?php if(strpos(url()->current(),'dashboard.html')!==false) echo 'active'?>" data-active="">
                <a href="<?php echo url('/admin/dashboard.html')?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="<?php if(strpos(url()->current(),'danh-sach-cong-ty.html')!==false) echo 'active'?>">
                <a href="danh-sach-cong-ty.html">
                <i class="fa fa-building"></i> <span>Danh sách công ty</span>
                </a>
            </li>
            <li class="<?php if(strpos(url()->current(),'danh-sach-ung-vien.html')!==false) echo 'active'?>">
                <a href="danh-sach-ung-vien.html">
                <i class="fa fa-user"></i> <span>Danh sách Ứng viên</span>
                </a>
            </li>
            <li class="<?php if(strpos(url()->current(),'danh-sach-tin.html')!==false) echo 'active'?>">
                <a href="danh-sach-tin.html">
                <i class="fa fa-sticky-note"></i> <span>Tin tuyển dụng</span>
                </a>
            </li>
            <li class="treeview" id="category">
                <a href="#">
                <i class="fa fa-trademark"></i>
                <span>Quản lí nghành</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if(strpos(url()->current(),'danh-sach-nghanh.html')!==false) echo 'active'?>" data-active="category"><a href="danh-sach-nghanh.html"><i class="fa fa-circle-o"></i> Dang sách nghành</a></li>
                    <li class="<?php if(strpos(url()->current(),'them-nghanh.html')!==false) echo 'active'?>" data-active="category"><a href="them-nghanh.html"><i class="fa fa-circle-o"></i> Thêm nghành</a></li>
                </ul>
            </li>
            <li class="header">Tùy Chỉnh</li>
            <li id="setting" class="treeview">
                <a href="#">
                <i class="fa fa-cogs"></i>
                <span>Tùy Chỉnh Dữ Liệu</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li id="city" class="treeview" data-active="city">
                        <a href="#"><i class="fa fa-circle-o text-yellow"></i> Thành Phố
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php if(strpos(url()->current(),'thanh-pho.html')!==false) echo 'active'?>" data-active="setting,city"><a href="<?php echo url('/admin/thanh-pho.html')?>"><i class="fa fa-circle-o text-red"></i> Danh sách thành phố</a></li>
                            <li class="<?php if(strpos(url()->current(),'thanh-pho/them.html')!==false) echo 'active'?>" data-active="setting,city"><a href="<?php echo url('/admin/thanh-pho/them.html')?>"><i class="fa fa-circle-o text-red"></i> Thêm thành phố</a></li>
                        </ul>
                    </li>
                    <li id="size" class="treeview" data-active="city">
                        <a href="#"><i class="fa fa-circle-o text-yellow"></i> Qui mô
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php if(strpos(url()->current(),'qui-mo.html')!==false) echo 'active'?>" data-active="setting,size"><a href="<?php echo url('/admin/qui-mo.html')?>"><i class="fa fa-circle-o text-red"></i> Danh sách qui mô</a></li>
                            <li class="<?php if(strpos(url()->current(),'qui-mo/them.html')!==false) echo 'active'?>" data-active="setting,size"><a href="<?php echo url('/admin/qui-mo/them.html')?>"><i class="fa fa-circle-o text-red"></i> Thêm qui mô</a></li>
                        </ul>
                    </li>
                    <li id="sex" class="treeview" data-active="city">
                        <a href="#"><i class="fa fa-circle-o text-yellow"></i> Giới Tính
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php if(strpos(url()->current(),'gioi-tinh.html')!==false) echo 'active'?>" data-active="setting,sex"><a href="<?php echo url('/admin/qui-mo.html')?>"><i class="fa fa-circle-o text-red"></i> Danh sách giới tính</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
    </section>
    <!-- /.sidebar -->
</aside>