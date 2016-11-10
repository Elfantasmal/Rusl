@extends('layouts.dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                403
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/index')}}"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li class="active">403错误</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="error-page">
                <h2 class="headline text-blue"> 404</h2>

                <div class="error-content">
                    <h3><i class="fa fa-warning text-blue"></i> 非法访问</h3>
                    <p>
                        对不起，您无权访问该页面。
                        与此同时你可以 <a href="{{url('/index')}}">返回概览</a> 进行其他操作。
                    </p>
                </div>
                <!-- /.error-content -->
            </div>
            <!-- /.error-page -->
        </section>
        <!-- /.content -->
    </div>
@stop