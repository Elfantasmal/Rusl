@extends('layouts.dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                销售订单详情
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/index')}}"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li><a href="{{url('/sales_orders')}}">订单管理</a></li>
                <li class="active">销售订单详情</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="invoice">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> Rusl
                        <small class="pull-right">创建时间: {{$sales_order->created_at}}</small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    客户:
                    <address>
                        <strong>{{$sales_order->customer->company_name}}</strong><br>
                        {{$sales_order->customer->company_phone}}<br>
                        {{$sales_order->customer->contact_name}}<br>
                        {{$sales_order->customer->mobile_phone}}<br>
                        {{$sales_order->customer->email}}
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <br>
                    <b>订单号:</b> {{ 'SO'.str_pad($sales_order->id,4,'0',STR_PAD_LEFT) }}<br>
                    <b>配送日期:</b> {{$sales_order->delivered_at}}<br>
                    <b>配送地址:</b> {{$sales_order->address}}<br>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>数量</th>
                            <th>商品</th>
                            <th>单位</th>
                            <th>小计</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sales_order->orderDetails as $detail)
                            <tr>
                                <td>{{$detail->quantity}}</td>
                                <td>{{$detail->commodity->name}}</td>
                                <td>{{$detail->commodity->unit}}</td>
                                <td>￥{{$detail->subtotal}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>总计:</th>
                                <td>￥{{$sales_order->total}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>
@stop