@extends('layouts.dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                客户详情
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/index')}}"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li><a href="{{url('/customers')}}">客户管理</a></li>
                <li class="active">客户详情</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">详情</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <strong><i>@</i> 公司名称</strong>
                            <p class="text-muted">{{$customer->company_name}}</p>
                            <hr>
                            <strong><i class="fa fa-phone margin-r-5"></i> 联系电话</strong>
                            <p class="text-muted">{{$customer->company_phone}}</p>
                            <hr>
                            <strong><i class="fa fa-user-circle margin-r-5"></i> 联系人姓名</strong>
                            <p class="text-muted">{{$customer->contact_name}}</p>
                            <hr>
                            <strong><i class="fa fa-mobile margin-r-5"></i> 联系人电话</strong>
                            <p class="text-muted">{{$customer->mobile_phone}}</p>
                            <hr>
                            <strong><i class="fa fa fa-envelope margin-r-5"> 邮箱</i></strong>
                            <p class="text-muted">{{$customer->email}}</p>
                            <hr>
                            <strong><i class="fa fa-map-marker margin-r-5"></i> 地址</strong>
                            <p class="text-muted">{{$customer->address}}</p>
                            <hr>
                            <strong><i class="fa fa-file-text-o margin-r-5"></i> 公司简介</strong>
                            <p class="text-muted">{{$customer->description}}</p>
                            <hr>
                            <strong><i class="fa fa-calendar-o margin-r-5"></i> 创建时间</strong>
                            <p class="text-muted">{{$customer->created_at}}</p>
                            <hr>
                            <strong><i class="fa fa-calendar-plus-o margin-r-5"></i> 更新时间</strong>
                            <p class="text-muted">{{$customer->updated_at}}</p>
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