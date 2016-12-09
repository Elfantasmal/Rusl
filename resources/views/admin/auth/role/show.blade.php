@extends('layouts.dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                角色详情
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li><a href="{{route('roles.index')}}">角色管理</a></li>
                <li class="active">角色详情</li>
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
                            <strong><i>@</i> 角色名称</strong>
                            <p class="text-muted">{{$role->name}}</p>
                            <hr>
                            <strong><i>@</i> 角色别名</strong>
                            <p class="text-muted">{{$role->display_name}}</p>
                            <hr>
                            <strong><i class="fa fa-file-text-o margin-r-5"></i> 角色简介</strong>
                            <p class="text-muted">{{$role->description}}</p>
                            <hr>
                            <strong><i class="fa fa-calendar-o margin-r-5"></i> 创建时间</strong>
                            <p class="text-muted">{{$role->created_at}}</p>
                            <hr>
                            <strong><i class="fa fa-calendar-plus-o margin-r-5"></i> 更新时间</strong>
                            <p class="text-muted">{{$role->updated_at}}</p>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">角色所属用户</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive ">
                                <table class="table table-bordered text-center">
                                    <tbody>
                                    <tr>
                                        <th class="col-md-2">用户姓名</th>
                                    </tr>
                                    @foreach($users as $user)
                                        <tr>
                                            <td><a href="{{ route('users.edit', $user->id) }}">
                                                    {{$user->name}}
                                                </a>
                                            </td>
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
                            <h3 class="box-title">权限列表</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive ">
                                <table class="table table-bordered text-center">
                                    <tbody>
                                    <tr>
                                        <th class="col-md-2">权限别名</th>
                                        <th class="col-md-2">创建时间</th>
                                        <th class="col-md-2">更新时间</th>
                                    </tr>
                                    @foreach($role->perms as $permission)
                                        <tr>
                                            <td><a href="{{ route('purchase_orders.show', $permission->id) }}">
                                                    {{$permission->display_name}}
                                                </a>
                                            </td>
                                            <td>{{$permission->created_at}}</td>
                                            <td>{{$permission->updated_at}}</td>
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
@stop