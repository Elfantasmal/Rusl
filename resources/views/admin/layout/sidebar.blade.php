<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('/vendor/adminlte/dist/img/avatar4.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">导航</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="#"><i class="fa fa-tachometer"></i> <span>仪表盘</span></a></li>
            <li><a href="#"><i class="fa fa-link"></i> <span>测试</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-user"></i> <span>用户管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#">添加用户</a></li>
                    <li><a href="#">编辑用户</a></li>
                    <li><a href="#">用户列表</a></li>
                    <li><a href="#">个人信息</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-briefcase"></i> <span>客户管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#">添加客户</a></li>
                    <li><a href="#">编辑客户</a></li>
                    <li><a href="#">客户列表</a></li>
                    <li><a href="#">客户信息</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-fax"></i> <span>供应商管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#">添加供应商</a></li>
                    <li><a href="#">编辑供应商</a></li>
                    <li><a href="#">供应商列表</a></li>
                    <li><a href="#">供应商信息</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-building-o"></i> <span>仓库管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-cubes"></i> <span>商品管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#">添加商品</a></li>
                    <li><a href="#">编辑商品</a></li>
                    <li><a href="#">商品列表</a></li>
                    <li><a href="#">商品信息</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-credit-card"></i> <span>订单管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#">添加订单</a></li>
                    <li><a href="#">编辑订单</a></li>
                    <li><a href="#">订单列表</a></li>
                    <li><a href="#">订单信息</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-money"></i> <span>财务管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-cogs"></i> <span>权限管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#">添加权限</a></li>
                    <li><a href="#">编辑权限</a></li>
                    <li><a href="#">权限列表</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-users"></i> <span>角色管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#">角色列表</a></li>
                    <li><a href="#">添加角色</a></li>
                    <li><a href="#">编辑角色</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>