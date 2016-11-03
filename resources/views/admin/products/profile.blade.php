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
                <li><a href="{{url('/products')}}">商品管理</a></li>
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
                            <p class="text-muted">{{$product->name}}</p>
                            <hr>
                            <strong><i class="fa fa-jpy margin-r-5"> 价格</i></strong>
                            <p class="text-muted">{{$product->price}} 元</p>
                            <hr>
                            <strong><i>@</i> 所属供应商</strong>
                            <p class="text-muted">{{$product->supplier->company_name}}</p>
                            <hr>
                            <strong><i class="fa fa-calendar-o margin-r-5"></i> 创建时间</strong>
                            <p class="text-muted">{{$product->created_at}}</p>
                            <hr>
                            <strong><i class="fa fa-calendar-plus-o margin-r-5"></i> 更新时间</strong>
                            <p class="text-muted">{{$product->updated_at}}</p>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.section -->
    </div>
    <!-- /.content-wrapper -->
@stop
