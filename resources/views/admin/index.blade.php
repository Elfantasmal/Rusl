@extends('layouts.dashboard')
@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                概览
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard active"></i>概览</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{$count['user_count']}}</h3>

                            <p>用户管理</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="{{route('users.index')}}" class="small-box-footer">
                            查看详情 <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{$count['commodity_count']}}</h3>

                            <p>商品管理</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('commodities.index')}}" class="small-box-footer">
                            查看详情 <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{$count['customer_count']}}</h3>

                            <p>客户管理</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-briefcase"></i>
                        </div>
                        <a href="{{route('customers.index')}}" class="small-box-footer">
                            查看详情 <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{$count['supplier_count']}}</h3>

                            <p>供应商管理</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-globe"></i>
                        </div>
                        <a href="{{route('suppliers.index')}}" class="small-box-footer">
                            查看详情 <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <!-- Left col -->
                <div class="col-md-8">

                    <!-- TABLE: LATEST SALES ORDERS -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">最新销售订单</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="display: block;">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                    <tr>
                                        <th class="col-md-2">销售订单ID</th>
                                        <th class="col-md-4">客户</th>
                                        <th class="col-md-2">总计</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($recently_added_sales_orders as $sales_order)
                                        <tr>
                                            <td><a href="{{ route('sales_orders.show', $sales_order->id) }}">
                                                    {{ 'SO'.str_pad($sales_order->id,4,'0',STR_PAD_LEFT) }}
                                                </a>
                                            </td>
                                            <td>{{ $sales_order->customer->company_name }}</td>
                                            <td><span class="label label-success">￥{{ $sales_order->total }}</span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix" style="display: block;">
                            <a href="{{ route('sales_orders.create') }}"
                               class="btn btn-sm btn-info btn-flat pull-left">创建销售订单</a>
                            <a href="{{ route('sales_orders.index') }}"
                               class="btn btn-sm btn-default btn-flat pull-right">查看所有销售订单</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->

                    <!-- TABLE: LATEST ORDERS -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">最新采购订单</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="display: block;">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                    <tr>
                                        <th class="col-md-2">采购订单ID</th>
                                        <th class="col-md-4">供应商</th>
                                        <th class="col-md-2">总计</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($recently_added_purchase_orders as $purchase_order)
                                        <tr>
                                            <td><a href="{{ route('purchase_orders.show', $purchase_order->id) }}">
                                                    {{ 'PO'.str_pad($purchase_order->id,4,'0',STR_PAD_LEFT) }}
                                                </a>
                                            </td>
                                            <td>{{ $purchase_order->supplier->company_name }}</td>
                                            <td><span class="label label-success">￥{{ $purchase_order->total }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix" style="display: block;">
                            <a href="{{ route('purchase_orders.create') }}"
                               class="btn btn-sm btn-info btn-flat pull-left">创建采购订单</a>
                            <a href="{{ route('purchase_orders.index') }}"
                               class="btn btn-sm btn-default btn-flat pull-right">查看所有采购订单</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->

                <div class="col-md-4">
                    <!-- PRODUCT LIST -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">商品库存预警</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <ul class="products-list product-list-in-box">
                                @foreach($stocks as $stock)
                                    @if($stock->stock < $stock->stock_alert)
                                    <li class="item">
                                        <div class=>
                                            <a href="{{ route('commodities.show', $stock->id) }}"
                                               class="product-title">
                                                {{ $stock->commodity->name }}
                                                <span class="label label-danger pull-right">{{ $stock->stock }}</span>
                                            </a>
                                            <span class="product-description">库存低于预警设置数量</span>
                                        </div>
                                    </li>
                                    <!-- /.item -->
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="{{ route('stocks.index') }}">查看所有库存</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@stop