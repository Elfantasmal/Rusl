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
            <li class="{{ Request::is('index') ? ' active' : '' }}">
                <a href="{{route('index')}}"><i class="fa fa-tachometer "></i>
                    <span>概览</span>
                </a>
            </li>
            <li class="{{ Request::is('users')||Request::is('users/*') ? ' active' : '' }}">
                <a href="{{route('users.index')}}"><i class="fa fa-user"></i> <span>用户列表</span></a>
            </li>
            <li class="treeview {{ Request::is('roles')||Request::is('roles/*')
                                 ||Request::is('permissions')||Request::is('permissions/*') ? ' active' : '' }}">
                <a href="#"><i class="fa fa-hashtag"></i> <span>权限控制</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('roles')||Request::is('roles/*') ? ' active' : '' }}">
                        <a href="{{route('roles.index')}}"><i class="fa fa-circle-o"></i> 角色列表</a>
                    </li>
                    <li class="{{ Request::is('permissions')||Request::is('permissions/*') ? ' active' : '' }}">
                        <a href="{{route('permissions.index')}}"><i class="fa fa-circle-o"></i> 权限列表</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::is('customers')||Request::is('customers/*') ? ' active' : '' }}">
                <a href="{{route('customers.index')}}"><i class="fa fa-briefcase"></i> <span>客户管理</span></a>
            </li>
            <li class="{{ Request::is('suppliers')||Request::is('suppliers/*') ? ' active' : '' }}">
                <a href="{{route('suppliers.index')}}"><i class=" fa fa-globe"></i> <span>供应商管理</span></a>
            </li>
            <li class="{{ Request::is('commodities')||Request::is('commodities/*') ? ' active' : '' }}">
                <a href="{{route('commodities.index')}}"><i class="fa fa-barcode"></i> <span>商品管理</span></a>
            </li>
            <li class="treeview {{ Request::is('stocks')||Request::is('stocks/*')
                                || Request::is('stock_in')||Request::is('stock_in/*')
                                || Request::is('stock_out')||Request::is('stock_out/*')
                                 ? ' active' : '' }}">
                <a href="#"><i class="fa fa-building-o"></i>
                    <span>仓库管理</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('stocks')||Request::is('stocks/*') ? ' active' : '' }}">
                        <a href="{{ route('stocks.index') }}"><i class="fa fa-circle-o"></i> 库存盘点</a>
                    </li>
                    <li class="{{ Request::is('stock_in')||Request::is('stock_in/*') ? ' active' : '' }}">
                        <a href="{{ route('stock_in.index') }}"><i class="fa fa-circle-o"></i> 商品入库</a>
                    </li>
                    <li class="{{ Request::is('stock_out')||Request::is('stock_out/*') ? ' active' : '' }}">
                        <a href="{{ route('stock_out.index') }}"><i class="fa fa-circle-o"></i> 商品出库</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ Request::is('sales_orders')||Request::is('sales_orders/*')
                                 ||Request::is('purchase_orders')||Request::is('purchase_orders/*') ? ' active' : '' }}">
                <a href="#"><i class="fa fa-inbox"></i> <span>订单管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('sales_orders')||Request::is('sales_orders/*') ? ' active' : '' }}">
                        <a href="{{route('sales_orders.index')}}"><i class="fa fa-circle-o"></i> 销售订单</a>
                    </li>
                    <li class="{{ Request::is('purchase_orders')||Request::is('purchase_orders/*') ? ' active' : '' }}">
                        <a href="{{route('purchase_orders.index')}}"><i class="fa fa-circle-o"></i> 采购订单</a>
                    </li>
                </ul>
            </li>
            <li><a href="{{url('/test')}}"><i class="fa fa-money"></i> <span>财务管理</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>