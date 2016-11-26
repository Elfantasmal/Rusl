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
                创建入库记录
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li><a href="#">仓库管理</a></li>
                <li class="active">创建入库记录</li>
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
                        <form method="POST" action="{{route('stock_in.store')}}">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="col-md-12">
                                    <br>
                                    <table class="table table-bordered text-center">
                                        <tbody id="body">
                                        <tr>
                                            <th class="col-md-1"></th>
                                            <th class="col-md-3 text-center">商品名称</th>
                                            <th class="col-md-2 text-center">入库数量</th>
                                            <th class="col-md-2 text-center">入库类型</th>
                                            <th class="col-md-2 text-center">入库时间</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button id="add" type="button" class="btn btn-info btn-flat"><i
                                                            class="fa fa-plus"></i></button>
                                                <button id="remove" type="button" class="btn btn-danger btn-flat"><i
                                                            class="fa fa-minus"></i></button>
                                            </td>
                                            <td class="commodity">
                                                <input type="hidden" value="" name="commodities[]">
                                                <input class="form-control" required>
                                            </td>
                                            <td>
                                                <input id="quantity" class="form-control" name="quantities[]" min="1"
                                                       type="number" required>
                                            </td>
                                            <td class="type">
                                                <input class="form-control" required name="in_type[]">
                                            </td>
                                            <td class="date">
                                                <input class="form-control" required name="in_at[]">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
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
            <div class="modal fade" id="commodity-modal">
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
                            <button id="commodity-confirm" type="button" class="btn btn-primary">确认</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <div class="modal fade" id="type-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">出库类型</h4>
                        </div>
                        <div class="modal-body">
                            <select class="form-control select2-type"
                                    style="width: 100%;">
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">关闭</button>
                            <button id="type-confirm" type="button" class="btn btn-primary">确认</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <div class="modal fade" id="date-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">出库日期</h4>
                        </div>
                        <div class="modal-body">
                            <input id="datepicker" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">关闭</button>
                            <button id="date-confirm" type="button" class="btn btn-primary">确认</button>
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
    <script src="{{asset('/vendor/adminlte/plugins/select2/i18n/zh-CN.js')}}"></script>
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


            //Initialize Select2 Elements

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

            var $commoditySelect2 = $(".select2-commodity").select2({
                language: "zh-CN",
                data: CommodityData,
                placeholder: '请选择一个商品',
                allowClear: true
            });

            var typeData = [
                {
                    id: '',
                    text: ''
                },
                {
                    id: 1,
                    text: '采购入库'
                },
                {
                    id: 2,
                    text: '销售退货'
                }
            ];
            var $typeSelect2 = $(".select2-type").select2({
                language: "zh-CN",
                data: typeData,
                placeholder: '请选择入库类型',
                allowClear: true
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
                        '        <input type="hidden" value="" name="commodities[]">' +
                        '        <input class="form-control" required>' +
                        '    </td>' +
                        '    <td>' +
                        '        <input id="quantity" class="form-control" name="quantities[]" min="1"' +
                        '               type="number" required>' +
                        '    </td>' +
                        '    <td class="type">' +
                        '        <input class="form-control" required name="in_type[]">' +
                        '    </td>' +
                        '    <td class="date">' +
                        '        <input class="form-control" required name="in_at[]">' +
                        '    </td>' +
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

            var $context;
            var $commodityModal = $('#commodity-modal');
            var $typeModal = $('#type-modal');
            var $dateModal = $('#date-modal');


            $body.on('click', '.commodity', function () {
                $context = $(this);
                $commodityModal.modal();
            });

            $commodityModal.on('hidden.bs.modal', function () {
                $commoditySelect2.val(null).trigger("change");
            });

            $body.on('click', '#commodity-confirm', function () {
                $commodityModal.modal('toggle');
                if ($commoditySelect2.select2('data')[0].id !== '' && $commoditySelect2.select2('data')[0].text !== '') {
                    $context.children('input:nth-child(1)').val($commoditySelect2.select2('data')[0].id);
                    $context.children('input:nth-child(2)').val($commoditySelect2.select2('data')[0].text);
                }
            });

            $body.on('click', '.type', function () {
                $context = $(this);
                $typeModal.modal();
            });

            $typeModal.on('hidden.bs.modal', function () {
                $typeSelect2.val(null).trigger("change");
            });

            $body.on('click', '#type-confirm', function () {
                $typeModal.modal('toggle');
                if ($typeSelect2.select2('data')[0].id !== '' && $typeSelect2.select2('data')[0].text !== '') {
                    $context.children('input:nth-child(1)').val($typeSelect2.select2('data')[0].text);
                }
            });

            $body.on('click', '.date', function () {
                $context = $(this);
                $('.datepicker').datepicker('update', '2011-03-05');
                $dateModal.modal();
            });

            $dateModal.on('hidden.bs.modal', function () {
                $('#datepicker').datepicker('update', '');
            });

            $body.on('click', '#date-confirm', function () {
                $dateModal.modal('toggle');
                $context.children('input:nth-child(1)').val($('#datepicker').val());
            });
        });
    </script>
@stop