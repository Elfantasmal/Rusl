@extends('layouts.dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                创建权限
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li><a href="{{route('permissions.index')}}">权限管理</a></li>
                <li class="active">权限详情</li>
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
                            <strong><i>@</i> 权限名称</strong>
                            <p class="text-muted">{{$permission->name}}</p>
                            <hr>
                            <strong><i>@</i> 权限别名</strong>
                            <p class="text-muted">{{$permission->display_name}}</p>
                            <hr>
                            <strong><i class="fa fa-file-text-o margin-r-5"></i> 权限简介</strong>
                            <p class="text-muted">{{$permission->description}}</p>
                            <hr>
                            <strong><i class="fa fa-calendar-o margin-r-5"></i> 创建时间</strong>
                            <p class="text-muted">{{$permission->created_at}}</p>
                            <hr>
                            <strong><i class="fa fa-calendar-plus-o margin-r-5"></i> 更新时间</strong>
                            <p class="text-muted">{{$permission->updated_at}}</p>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">权限所属角色</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive ">
                                <table class="table table-bordered text-center">
                                    <tbody>
                                    <tr>
                                        <th class="col-md-2">角色名称</th>
                                    </tr>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td><a href="{{ route('roles.edit', $role->id) }}">
                                                    {{$role->display_name}}
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
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.section -->
    </div>
@stop