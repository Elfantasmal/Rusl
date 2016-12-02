@extends('layouts.dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                商品详情
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/index')}}"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li><a href="{{url('/commodities')}}">商品管理</a></li>
                <li class="active">商品详情</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">详情</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <strong><i class="fa fa-mobile margin-r-5"></i> 商品名称</strong>
                            <p class="text-muted">{{$commodity->name}}</p>
                            <hr>
                            <strong><i class="fa fa-jpy margin-r-5"> 销售价格</i></strong>
                            <p class="text-muted">{{$commodity->sales_price}} 元</p>
                            <hr>
                            <strong><i class="fa fa-jpy margin-r-5"> 采购价格</i></strong>
                            <p class="text-muted">{{$commodity->purchase_price}} 元</p>
                            <hr>
                            <strong><i>@</i> 所属供应商</strong>
                            <p class="text-muted">{{$commodity->supplier->company_name}}</p>
                            <hr>
                            <strong><i class="fa fa-calendar-o margin-r-5"></i> 创建时间</strong>
                            <p class="text-muted">{{$commodity->created_at}}</p>
                            <hr>
                            <strong><i class="fa fa-calendar-plus-o margin-r-5"></i> 更新时间</strong>
                            <p class="text-muted">{{$commodity->updated_at}}</p>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="col-md-9">
                    <!-- AREA CHART -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <i class="fa fa-line-chart"></i>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div id="sales-price-chart">
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- DONUT CHART -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <i class="fa fa-line-chart"></i>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div id="purchase-price-chart">
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.row -->
            </div>
        </section>
        <!-- /.section -->
    </div>
    <!-- /.content-wrapper -->
@stop
@section('script')
    <!-- HighCharts -->
    <script src="{{asset('vendor/adminlte/plugins/highcharts/highcharts.js')}}"></script>
    <script>
        $(function () {
            $('#sales-price-chart').highcharts({
                title: {
                    text: '历史销售价格',
                    x: -20 //center
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                yAxis: {
                    title: {
                        text: '价格 (￥)'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    valuePrefix: '$'
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: [ {
                    name: '采购价格',
                    data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                }]
            });
            $('#purchase-price-chart').highcharts({
                title: {
                    text: '历史采购价格',
                    x: -20 //center
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                yAxis: {
                    title: {
                        text: '价格 (￥)'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    valuePrefix: '$'
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: [ {
                    name: '采购价格',
                    data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                }]
            });
        });
    </script>
@stop