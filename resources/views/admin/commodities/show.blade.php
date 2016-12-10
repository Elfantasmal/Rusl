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
            @include('flash::message')
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">详情</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <strong><i class="fa fa-barcode margin-r-5"></i> 商品名称</strong>
                            <p class="text-muted">{{$commodity->name}}</p>
                            <hr>
                            <strong><i class="fa fa-credit-card margin-r-5"> 销售价格</i></strong>
                            <p class="text-muted">{{$commodity->sales_price}} 元</p>
                            <hr>
                            <strong><i class="fa fa-credit-card-alt margin-r-5"> 采购价格</i></strong>
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
            Highcharts.setOptions({
                lang: {
                    months: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
                    resetZoom: "重置",
                    resetZoomTitle: "重置比 1:1",
                    shortMonths: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
                    thousandsSep: ",",
                    weekdays: ["星期天", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"],

                }
            });

            var salesPriceData = [
                @foreach($sales_price_history_logs as $log)
                    [Date.UTC({{explode('-', $log->changed_at)[0]}}, {{explode('-', $log->changed_at)[1] - 1}}, {{explode('-', $log->changed_at)[2]}}),{{$log->sales_price}}],
                @endforeach
            ];

            var purchasePriceData = [
                @foreach($purchase_price_history_logs as $log)
                [Date.UTC({{explode('-', $log->changed_at)[0]}}, {{explode('-', $log->changed_at)[1] - 1}}, {{explode('-', $log->changed_at)[2]}}),{{$log->purchase_price}}],
                @endforeach
            ];

            $('#sales-price-chart').highcharts({
                chart: {
                    zoomType: 'x'
                },
                title: {
                    text: '历史销售价格'
                },
                subtitle: {
                    text: document.ontouchstart === undefined ?
                            '鼠标拖动可以进行缩放' : '手势操作进行缩放'
                },
                xAxis: {
                    type: 'datetime',
                    dateTimeLabelFormats: {
                        millisecond: '%H:%M:%S.%L',
                        second: '%H:%M:%S',
                        minute: '%H:%M',
                        hour: '%H:%M',
                        day: '%m-%d',
                        week: '%m-%d',
                        month: '%Y-%m',
                        year: '%Y'
                    }
                },
                tooltip: {
                    dateTimeLabelFormats: {
                        millisecond: '%H:%M:%S.%L',
                        second: '%H:%M:%S',
                        minute: '%H:%M',
                        hour: '%H:%M',
                        day: '%Y-%m-%d',
                        week: '%m-%d',
                        month: '%Y-%m',
                        year: '%Y'
                    }
                },
                yAxis: {
                    title: {
                        text: '价格 (￥)'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    area: {
                        fillColor: {
                            linearGradient: {
                                x1: 0,
                                y1: 0,
                                x2: 0,
                                y2: 1
                            },
                            stops: [
                                [0, Highcharts.getOptions().colors[0]],
                                [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                            ]
                        },
                        marker: {
                            radius: 2
                        },
                        lineWidth: 1,
                        states: {
                            hover: {
                                lineWidth: 1
                            }
                        },
                        threshold: null
                    }
                },
                series: [{
                    type: 'area',
                    name: '销售价格',
                    data: salesPriceData
                }]
            });
            $('#purchase-price-chart').highcharts({
                chart: {
                    zoomType: 'x'
                },
                title: {
                    text: '历史采购价格'
                },
                subtitle: {
                    text: document.ontouchstart === undefined ?
                            '鼠标拖动可以进行缩放' : '手势操作进行缩放'
                },
                xAxis: {
                    type: 'datetime',
                    dateTimeLabelFormats: {
                        millisecond: '%H:%M:%S.%L',
                        second: '%H:%M:%S',
                        minute: '%H:%M',
                        hour: '%H:%M',
                        day: '%m-%d',
                        week: '%m-%d',
                        month: '%Y-%m',
                        year: '%Y'
                    }
                },
                tooltip: {
                    dateTimeLabelFormats: {
                        millisecond: '%H:%M:%S.%L',
                        second: '%H:%M:%S',
                        minute: '%H:%M',
                        hour: '%H:%M',
                        day: '%Y-%m-%d',
                        week: '%m-%d',
                        month: '%Y-%m',
                        year: '%Y'
                    }
                },
                yAxis: {
                    title: {
                        text: '价格 (￥)'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    area: {
                        fillColor: {
                            linearGradient: {
                                x1: 0,
                                y1: 0,
                                x2: 0,
                                y2: 1
                            },
                            stops: [
                                [0, Highcharts.getOptions().colors[0]],
                                [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                            ]
                        },
                        marker: {
                            radius: 2
                        },
                        lineWidth: 1,
                        states: {
                            hover: {
                                lineWidth: 1
                            }
                        },
                        threshold: null
                    }
                },
                series: [{
                    type: 'area',
                    name: '采购价格',
                    data: purchasePriceData
                }]
            });
        });
    </script>
@stop