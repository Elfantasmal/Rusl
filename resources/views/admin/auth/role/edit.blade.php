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
                编辑角色
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li><a href="{{route('roles.index')}}">角色管理</a></li>
                <li class="active">编辑角色</li>
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
                        <form method="POST" action="{{route('roles.update', $role->id)}}">
                            {{method_field('PUT')}}
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label>名称</label>
                                    <input type="text" class="form-control" placeholder=""
                                           name="name" value="{{$role->name}}">
                                </div>
                                <div class="form-group">
                                    <label>别名</label>
                                    <input type="text" class="form-control" placeholder=""
                                           name="display_name" value="{{$role->display_name}}">
                                </div>
                                <div class="form-group">
                                    <label>简介</label>
                                    <textarea class="form-control" rows="3" placeholder=""
                                              name="description">{{$role->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>权限</label>
                                    <select class="form-control  select2" multiple="multiple" name="permissions[]"
                                            style="width: 100%">
                                        <option value=""></option>
                                        @foreach($permissions as $permission)
                                            <option value="{{$permission->id}}" {{in_array($permission->id,$role->perms->pluck('id')->toArray())? 'selected' : ''}}>
                                                {{$permission->display_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
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