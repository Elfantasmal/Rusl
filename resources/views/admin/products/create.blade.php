@extends('layouts.dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                创建商品
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/index')}}"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li><a href="{{url('/products')}}">商品管理</a></li>
                <li class="active">创建商品</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">创建</h3>
                        </div>
                        <form method="POST" action="{{url('/products/')}}">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input id="name" name="name" type="text" class="form-control"
                                           placeholder="名称">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-jpy"></i></span>
                                    <input id="price" name="price" type="number" class="form-control"
                                           placeholder="价格">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-fax"></i></span>
                                    <input id="company_name" type="text" class="form-control"
                                           placeholder="所属供应商">
                                </div>
                                <!-- /input-group -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right">提交</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.section -->
    </div>
@stop