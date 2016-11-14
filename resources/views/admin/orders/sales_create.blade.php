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
                                        <select class="form-control select2-customer" name="customer"
                                                style="width: 100%;">
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>

                                <div class="col-md-12">
                                    <br>
                                    <table class="table table-bordered text-center">
                                        <tbody id="body">
                                        <tr>
                                            <th class="col-md-1"></th>
                                            <th class="col-md-3">商品名称</th>
                                            <th class="col-md-2">数量</th>
                                            <th class="col-md-2">单价</th>
                                            <th class="col-md-2">单位</th>
                                            <th class="col-md-2">小计</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button id="add" type="button" class="btn btn-default btn-flat"><i
                                                            class="fa fa-plus"></i></button>
                                                <button id="remove" type="button" class="btn btn-default btn-flat"><i
                                                            class="fa fa-minus"></i></button>
                                            </td>
                                            <td><select required class="form-control select2-product"
                                                        style="width: 100%;" name="product[]"></select>
                                            </td>
                                            <td><input required class="form-control" type="number" name="quantity[]">
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
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
        $(function () {
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

            var productData = [
                {
                    id: '',
                    text: ''
                },
                    @foreach($product_list as $id => $name)
                {
                    id: '{{$id}}',
                    text: '{{$name}}'
                },
                @endforeach
            ];

            var index = 1;
            //Initialize Select2 Elements
            $(".select2-customer").select2({
                data: customerData,
                placeholder: '请选择一个客户',
                allowClear: true
            });
            $(".select2-product").select2({
                data: productData,
                placeholder: '请选择一个商品',
                allowClear: true
            });

            $('select').on('select2:select', function (evt) {
                console.log('select event triggered')
            });
            //Date picker
            $('#datepicker').datepicker({
                language: 'zh-CN',
                autoclose: true
            });

            //button event binding
            $('body').delegate('#add', 'click', function () {
                index += 1;
                $('#body').append(
                        '<tr>' +
                        '    <td>' +
                        '        <button id="add" type="button" class="btn btn-default btn-flat"><i' +
                        '                    class="fa fa-plus"></i></button>' +
                        '        <button id="remove" type="button" class="btn btn-default btn-flat"><i' +
                        '                    class="fa fa-minus"></i></button>' +
                        '    </td>' +
                        '    <td><select class="form-control select2-product"' +
                        '                style="width: 100%;" name="product[]"></select>' +
                        '    </td>' +
                        '    <td><input class="form-control" type="number" name="quantity[]"></td>' +
                        '    <td></td>' +
                        '    <td></td>' +
                        '    <td></td>' +
                        '</tr>'
                );
                $(".select2-product").select2({
                    data: productData,
                    placeholder: '请选择一个商品',
                    allowClear: true
                });
            });

            $('body').delegate('#remove', 'click', function () {
                if (index === 1) {
                    return;
                }
                index -= 1;
                $(this).parent().parent().remove();
            })
        });
    </script>
@stop