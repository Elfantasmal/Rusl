@extends('layouts.dashboard')
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('/vendor/adminlte/plugins/select2/select2.min.css')}}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{asset('/vendor/adminlte/plugins/datepicker/datepicker3.css')}}">
@stop
@section('style')
    td input {
    text-align: center;
    }
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
                                            <th class="col-md-3 text-center">商品名称</th>
                                            <th class="col-md-2 text-center">数量</th>
                                            <th class="col-md-2 text-center">单价</th>
                                            <th class="col-md-2 text-center">单位</th>
                                            <th class="col-md-2 text-center">小计</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button id="add" type="button" class="btn btn-info btn-flat"><i
                                                            class="fa fa-plus"></i></button>
                                                <button id="remove" type="button" class="btn btn-danger btn-flat"><i
                                                            class="fa fa-minus"></i></button>
                                            </td>
                                            <td class="commodity">
                                                <input type="hidden" value="" name="commodity[]">
                                                <input class="form-control" required>
                                            </td>
                                            <td>
                                                <input id="quantity" class="form-control" type="number"
                                                       name="quantity[]" min="1" required>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td id="subtotal"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="box-body clearfix">
                                        <blockquote>
                                            <input id="total" type="hidden" name="total" value="">
                                            <p id="total">￥0.00</p>
                                            <small>总计</small>
                                        </blockquote>
                                    </div>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="datepicker" name="date"
                                               placeholder="送货时间">

                                    </div>
                                    <!-- /.input group -->
                                    <br>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-truck"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="address" name="address"
                                               placeholder="送货地址">

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
            <div class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">商品列表</h4>
                        </div>
                        <div class="modal-body">
                            <select class="form-control select2-commodity"
                                    style="width: 100%;">
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">关闭</button>
                            <button id="confirm" type="button" class="btn btn-primary">确认</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
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
            //Date picker
            $('#datepicker').datepicker({
                language: 'zh-CN',
                autoclose: true
            });

            //Initialize Select2 List Data
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

            var CommodityData = [
                {
                    id: '',
                    text: ''
                },
                    @foreach($commodity_list as $id => $name)
                {
                    id: '{{$id}}',
                    text: '{{$name}}'
                },
                @endforeach
            ];

            //Initialize Select2 Elements
            var $CustomerSelect2 = $(".select2-customer").select2({
                data: customerData,
                placeholder: '请选择一个客户',
                allowClear: true
            });

            var customerUrl = '{{url('/customers')}}';
            $CustomerSelect2.on('select2:select', function (evt) {
                if ($CustomerSelect2.select2('data')[0].id !== '' && $CustomerSelect2.select2('data')[0].text !== '') {
                    $.getJSON(customerUrl + '/' + $CustomerSelect2.select2('data')[0].id + '/address', function (data) {
                        $('#address').val(data['address']);
                    })
                }
            });

            var $commoditySelect2 = $(".select2-commodity").select2({
                data: CommodityData,
                placeholder: '请选择一个商品',
                allowClear: true
            });

            var commodityId;
            var commodityName;
            $commoditySelect2.on('select2:select', function (evt) {
                commodityId = $commoditySelect2.select2('data')[0].id;
                commodityName = $commoditySelect2.select2('data')[0].text;

            });


            var index = 1;
            var $body = $('body');

            //button event binding
            $body.on('click', '#add', function () {
                index += 1;
                $('#body').append(
                        '<tr>' +
                        '    <td>' +
                        '        <button id="add" type="button" class="btn btn-info btn-flat"><i' +
                        '                    class="fa fa-plus"></i></button>' +
                        '        <button id="remove" type="button" class="btn btn-danger btn-flat"><i' +
                        '                    class="fa fa-minus"></i></button>' +
                        '    </td>' +
                        '    <td class="commodity">' +
                        '        <input type="hidden" value="" name="commodity[]">' +
                        '        <input class="form-control" required>' +
                        '    </td>' +
                        '    <td><input id="quantity" class="form-control" type="number" name="quantity[]" min="1" required></td>' +
                        '    <td></td>' +
                        '    <td></td>' +
                        '    <td id="subtotal"></td>' +
                        '</tr>'
                );
            });

            $body.on('click', '#remove', function () {
                if (index === 1) {
                    return;
                }
                index -= 1;
                $(this).parent().parent().remove();
            });

            var total = 0;
            $body.on('change', '#quantity', function () {
                var quantity = $(this).val();
                var price = $(this).parent().next().html();
                $(this).parent().nextAll('td:eq(2)').html(quantity * price);
                total = 0;
                $('td#subtotal').each(function () {
                    var subtotal = parseFloat($(this).html());
                    total += subtotal ? subtotal : 0;
                });
                $('input#total').val(total);
                $('p#total').html('￥' + total);
            });

            var commodityUrl = '{{url('/commodities')}}';

            $body.on('click', '#confirm', function () {
                $modal.modal('toggle');
                if ($commoditySelect2.select2('data')[0].id !== '' && $commoditySelect2.select2('data')[0].text !== '') {
                    $context.children('input:nth-child(1)').val(commodityId);
                    $context.children('input:nth-child(2)').val(commodityName);
                    $.getJSON(commodityUrl + '/' + commodityId + '/info', function (data) {
                        $context.next().next().html(data['sales_price']);
                        $context.next().next().next().html(data['unit']);
                    })
                }
            });

            var $context;
            var $modal = $('.modal');

            $body.on('click', '.commodity', function () {
                $context = $(this);
                $modal.modal();
            });

            $modal.on('hidden.bs.modal', function () {
                $commoditySelect2.val(null).trigger("change");
            });
        });
    </script>
@stop