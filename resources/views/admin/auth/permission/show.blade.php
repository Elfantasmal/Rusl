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
            <div class="row">
                <div class="col-md-12">
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.section -->
    </div>
@stop