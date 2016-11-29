@extends('layouts.dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                库存盘点
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li><a href="#">仓库管理</a></li>
                <li class="active">库存详情</li>
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
                            <strong><i class="fa fa-barcode margin-r-5"></i> 商品名称</strong>
                            <p class="text-muted">{{$stock->commodity->name}}</p>
                            <hr>
                            <strong><i class="fa fa-cube margin-r-5"></i> 现有库存数量</strong>
                            <p class="text-muted">{{$stock->stock}}</p>
                            <hr>
                            <strong><i class="fa fa-fa-bell-o margin-r-5"></i> 预警数量</strong>
                            <p class="text-muted">{{$stock->stock_alert}}</p>
                            <hr>
                            <strong><i class="fa fa-calendar-o margin-r-5"></i> 创建时间</strong>
                            <p class="text-muted">{{$stock->created_at}}</p>
                            <hr>
                            <strong><i class="fa fa-calendar-plus-o margin-r-5"></i> 更新时间</strong>
                            <p class="text-muted">{{$stock->updated_at}}</p>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">过往入库记录</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive ">
                                <table class="table table-bordered text-center">
                                    <tbody>
                                    <tr>
                                        <th class="col-md-2">入库数量</th>
                                        <th class="col-md-3">入库类型</th>
                                        <th class="col-md-3">入库时间</th>
                                        <th class="col-md-2">创建时间</th>
                                    </tr>
                                    @foreach($recently_stock_ins as $stock_in)
                                        <tr>
                                            <td>{{$stock_in->in_quantity}}</td>
                                            <td>{{$stock_in->in_type}}</td>
                                            <td>{{$stock_in->in_at}}</td>
                                            <td>{{$stock_in->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">过往出库记录</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive ">
                                <table class="table table-bordered text-center">
                                    <tbody>
                                    <tr>
                                        <th class="col-md-2">出库数量</th>
                                        <th class="col-md-3">出库类型</th>
                                        <th class="col-md-3">入库时间</th>
                                        <th class="col-md-2">记录时间</th>
                                    </tr>
                                    @foreach($recently_stock_outs as $stock_out)
                                        <tr>
                                            <td>{{$stock_out->out_quantity}}</td>
                                            <td>{{$stock_out->out_type}}</td>
                                            <th>{{$stock_out->out_at}}</th>
                                            <td>{{$stock_out->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.section -->
    </div>
    <!-- /.content-wrapper -->
@stop