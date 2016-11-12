@extends('layouts.dashboard')
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('/vendor/adminlte/plugins/select2/select2.min.css')}}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{asset('/vendor/adminlte/plugins/datepicker/datepicker3.css')}}">
@stop
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                创建销售订单
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/index')}}"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li><a href="{{url('/sales_orders')}}">订单管理</a></li>
                <li class="active">创建销售订单</li>
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
                        <form method="POST" action="{{url('/sales_orders')}}">
                            {{ csrf_field() }}


                            <div class="box-body">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">客户名称:</span>
                                        <select class="form-control select2-customer" style="width: 100%;">

                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>

                                <div class="col-md-12">
                                    <br>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="datepicker" name="date"
                                               placeholder="送货时间">
                                    </div>
                                    <!-- /.input group -->
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
    <!-- Select2 -->
    <script src="{{asset('/vendor/adminlte/plugins/select2/select2.full.js')}}"></script>
    <!-- bootstrap datepicker -->
    <script src="{{asset('/vendor/adminlte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('/vendor/adminlte/plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js')}}"
            charset="UTF-8"></script>
    <script>
        var customerData = [
            {
                id: '',
                text: ''
            },
                @foreach($customer_list as $id => $name)
            {
                id: '{{$id}}',
                text: '{{$name}}'
            },
            @endforeach
        ];

        $(function () {
            //Initialize Select2 Elements
            $(".select2-customer").select2({
                data: customerData,
                placeholder: '请选择一个客户',
                allowClear: true
            });
        });

        //Date picker
        $('#datepicker').datepicker({
            language: 'zh-CN',
            autoclose: true
        });

    </script>
@stop