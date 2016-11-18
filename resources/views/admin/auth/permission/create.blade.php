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
                <li class="active">创建权限</li>
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
                        <form method="POST" action="{{route('permissions.store')}}">
                            {{ csrf_field() }}
                            <div class="box-body">
                                    <div class="form-group">
                                        <label>名称</label>
                                        <input type="text" class="form-control" placeholder="" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label>别名</label>
                                        <input type="text" class="form-control" placeholder="" name="display_name">
                                    </div>
                                    <div class="form-group">
                                        <label>简介</label>
                                        <textarea class="form-control" rows="3" placeholder=""
                                                  name="description"></textarea>
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
