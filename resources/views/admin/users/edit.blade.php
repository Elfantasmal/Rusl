@extends('layouts.dashboard')
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('/vendor/adminlte/plugins/select2/select2.min.css')}}">
@stop
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                编辑用户
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li><a href="{{ route('users.index') }}">用户管理</a></li>
                <li class="active">编辑用户</li>
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
                        <form method="POST" action="{{ route('users.update', $user->id) }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input id="name" name="name" type="text" class="form-control"
                                           value="{{$user->name}}"
                                           placeholder="公司名称">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input id="email" name="email" type="email" class="form-control"
                                           value="{{$user->email}}"
                                           placeholder="邮箱">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>角色</label>
                                    <select class="form-control  select2" multiple="multiple" name="roles[]"
                                            style="width: 100%">
                                        <option value=""></option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}" {{in_array($role->id,$user->roles->pluck('id')->toArray())? 'selected' : ''}}>
                                                {{$role->display_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="button" class="btn btn-danger " data-toggle="modal"
                                        data-target="#deleteModal">
                                    删除
                                </button>
                                <button type="submit" class="btn btn-info pull-right">提交</button>
                            </div>
                        </form>
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
@section('script')
    <script src="{{asset('/vendor/adminlte/plugins/select2/select2.full.js')}}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2({
                placeholder: '请选择权限',
                allowClear: true
            });

        });
    </script>
@stop