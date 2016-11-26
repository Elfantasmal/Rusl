@extends('layouts.dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                采购订单列表
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li><a href="{{route('purchase_orders.index')}}">订单管理</a></li>
                <li class="active">采购订单列表</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">采购订单列表</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row form-inline">
                                <div class="col-md-6">
                                    <div class="margin">
                                        <a href="{{route('purchase_orders.create')}}">
                                            <button type="button" class="btn btn-flat btn-info ">
                                                创建
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <form action="#" method="get">
                                        <div class="input-group pull-right margin">
                                            <input type="text" class="form-control">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-info btn-flat">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <th class="col-md-2">客户</th>
                                        <th class="col-md-2">总计</th>
                                        <th class="col-md-2">配送时间</th>
                                        <th class="col-md-2">创建时间</th>
                                        <th class="col-md-2">更新时间</th>
                                        <th class="col-md-2">操作</th>
                                    </tr>
                                    @foreach($purchase_orders as $purchase_order)
                                        <tr>
                                            <td>{{$purchase_order->id}}</td>
                                            <td>{{$purchase_order->supplier->company_name}}</td>
                                            <td>{{$purchase_order->total}}</td>
                                            <td>{{$purchase_order->delivered_at}}</td>
                                            <td>{{$purchase_order->created_at}}</td>
                                            <td>{{$purchase_order->updated_at}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{url('/purchase_orders/'.$purchase_order->id)}}">
                                                        <button type="button" class="btn btn-info ">
                                                            <i class="fa fa-book"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{url('/purchase_orders/'.$purchase_order->id.'/edit')}}">
                                                        <button type="button" class="btn btn-info ">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            {{ $purchase_orders->links() }}
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
@stop
