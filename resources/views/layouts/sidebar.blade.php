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
            <li class="active"><a href="{{url('/index')}}"><i class="fa fa-tachometer"></i> <span>概览</span></a></li>
            <li><a href="#"><i class="fa fa-link"></i> <span>测试</span></a></li>
            <li class="treeview">
                <a href="{{url('/users')}}"><i class="fa fa-user"></i> <span>用户管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/users')}}"><i class="fa fa-circle-o"></i> 用户列表</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> 角色</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> 权限</a></li>
                </ul>
            </li>
            <li><a href="{{url('/customers')}}"><i class="fa fa-briefcase"></i> <span>客户管理</span></a></li>
            <li><a href="{{url('/suppliers')}}"><i class="fa fa-globe"></i> <span>供应商管理</span></a></li>
            <li><a href="{{url('/commodities')}}"><i class="fa fa-barcode"></i> <span>商品管理</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-building-o"></i> <span>仓库管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> 库存盘点</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> 商品入库</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> 商品出库</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-inbox"></i> <span>订单管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('sales_orders.index')}}"><i class="fa fa-circle-o"></i> 销售订单</a></li>
                    <li><a href="{{route('purchase_orders.create')}}"><i class="fa fa-circle-o"></i> 采购订单</a></li>
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
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>