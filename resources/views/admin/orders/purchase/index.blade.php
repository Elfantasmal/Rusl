@extends('layouts.dashboard')
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('/vendor/adminlte/plugins/select2/select2.min.css')}}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{asset('/vendor/adminlte/plugins/datepicker/datepicker3.css')}}">
    <style>
        input {
            text-align: center;
        }
    </style>
@stop
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                创建采购订单
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/index')}}"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li><a href="{{url('/purchase_orders')}}">订单管理</a></li>
                <li class="active">创建采购订单</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <select class="form-control select2" name="suppliers"
                    style="width: 100%;">
            </select>
        </section>
        <!-- /.section -->
    </div>
@stop
@section('script')
    <!-- Select2 -->
    <script src="{{asset('/vendor/adminlte/plugins/select2/select2.full.js')}}"></script>
    <script src="{{asset('/vendor/adminlte/plugins/select2/i18n/zh-CN.js')}}"></script>
    <script>
        $(function () {
            var data = [
                {
                    "id": 2,
                    "text": "七喜科技有限公司"
                },
                {
                    "id": 3,
                    "text": "九方科技有限公司"
                },
            ];

            $.ajax({
                url: '{{route('test')}}'
            }).done(function (data) {
                $(".select2").select2({
                    data: data,
                    placeholder: '请选择一个客户',
                    allowClear: true,
                    language: "zh-CN",
                    initSelection: function (element, callback) {
                        var data = [{id: element.val(), text: element.val()}];
                        callback({id: element.val(), text: element.val()});//这里初始化
                    },
                });
            });

        })

    </script>
@stop