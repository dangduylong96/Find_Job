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
            <li class="<?php if(strpos(url()->current(),'thong-tin-cong-ty.html')!==false) echo 'active'?>">
                <a href="thong-tin-cong-ty.html">
                <i class="fa fa-building"></i> <span>Thông tin Công Ty</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                <i class="fa  fa-sticky-note-o"></i>
                <span>Tin tuyển dụng</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Dang sách tin</a></li>
                    <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Thêm tin</a></li>
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