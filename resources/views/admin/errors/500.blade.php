@extends('layouts.dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <ol class="breadcrumb">
                <li><a href="{{url('/index')}}"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li class="active">500错误</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="error-page">
                <h2 class="headline text-red"> 500</h2>

                <div class="error-content">
                    <h3><i class="fa fa-warning text-red"></i> 抱歉! 服务器内部错误.</h3>
                    <p>
                        您查找的资源存在问题，无法显示
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