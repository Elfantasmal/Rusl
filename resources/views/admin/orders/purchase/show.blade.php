@extends('layouts.dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                采购订单详情
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/index')}}"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li><a href="{{url('/purchase_orders')}}">订单管理</a></li>
                <li class="active">采购订单详情</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="invoice">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> Rusl
                        <small class="pull-right">创建时间: {{$purchase_order->created_at}}</small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    供应商:
                    <address>
                        <strong>{{$purchase_order->supplier->company_name}}</strong><br>
                        {{$purchase_order->supplier->company_phone}}<br>
                        {{$purchase_order->supplier->contact_name}}<br>
                        {{$purchase_order->supplier->mobile_phone}}<br>
                        {{$purchase_order->supplier->email}}
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <br>
                    <b>订单号:</b> {{ 'PO'.str_pad($purchase_order->id,4,'0',STR_PAD_LEFT) }}<br>
                    <b>配送日期:</b> {{$purchase_order->delivered_at}}<br>
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
                        @foreach($purchase_order->orderDetails as $detail)
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
                                <td>￥{{$purchase_order->total}}</td>
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