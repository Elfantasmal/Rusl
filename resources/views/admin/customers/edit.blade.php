@extends('layouts.dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                编辑客户
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/index"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li><a href="#">客户管理</a></li>
                <li class="active">编辑客户</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">编辑</h3>
                        </div>
                        <form method="POST" action="{{url('/customers/'.$id)}}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input id="company_name" name="company_name" type="text" class="form-control"
                                           value="{{$customer->company_name}}"
                                           placeholder="公司名称">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input id="company_phone" name="company_phone" type="text" class="form-control"
                                           value="{{$customer->company_phone}}"
                                           placeholder="联系电话">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                                    <input id="contact_name" name="contact_name" type="text" class="form-control"
                                           value="{{$customer->contact_name}}"
                                           placeholder="联系人姓名">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                    <input id="mobile_phone" name="mobile_phone" type="text" class="form-control"
                                           value="{{$customer->mobile_phone}}"
                                           placeholder="联系人电话">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input id="email" name="email" type="email" class="form-control"
                                           value="{{$customer->email}}"
                                           placeholder="邮箱">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-truck"></i></span>
                                    <input id="address" name="address" type="text" class="form-control"
                                           value="{{$customer->address}}"
                                           placeholder="地址">
                                </div>
                            <!--
                                <br>
                                <div class="form-group">
                                    <textarea id="description" name="description" class="form-control"
                                              placeholder="公司简介" rows="5">{{$customer->description}}</textarea>
                                </div>
                                -->
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
