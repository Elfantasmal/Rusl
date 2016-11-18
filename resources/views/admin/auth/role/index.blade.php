@extends('layouts.dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                角色列表
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li><a href="{{route('roles.index')}}">角色管理</a></li>
                <li class="active">角色列表</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">角色列表</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row form-inline">
                                <div class="col-md-6">
                                    <div class="margin">
                                        <a href="{{route('roles.create')}}">
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
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <th>名称</th>
                                        <th>别名</th>
                                        <th>简介</th>
                                        <th>创建时间</th>
                                        <th>更新时间</th>
                                        <th>操作</th>
                                    </tr>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{$role->id}}</td>
                                            <td>{{$role->name}}</td>
                                            <td>{{$role->display_name}}</td>
                                            <td>{{$role->description}}</td>
                                            <td>{{$role->created_at}}</td>
                                            <td>{{$role->updated_at}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{route('roles.show', $role->id)}}">
                                                        <button type="button" class="btn btn-info ">
                                                            <i class="fa fa-book"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{route('roles.edit', $role->id)}}">
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
                            {{ $roles->links() }}
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