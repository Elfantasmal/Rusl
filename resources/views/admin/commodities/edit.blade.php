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
                编辑商品
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/index')}}"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li><a href="{{url('/commodities')}}">商品管理</a></li>
                <li class="active">编辑商品</li>
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
                        <form method="POST" action="{{url('/commodities/'.$commodity->id)}}">
                            <div class="box-body">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input id="name" name="name" type="text" class="form-control"
                                           placeholder="名称" value="{{$commodity->name}}">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-jpy"></i></span>
                                    <input id="sales-price" name="sales_price" type="number" class="form-control"
                                           placeholder="销售价格" value="{{$commodity->sales_price}}">
                                    <span class="input-group-addon">.00</span>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-jpy"></i></span>
                                    <input id="purchase-price" name="purchase_price" type="number" class="form-control"
                                           placeholder="采购价格" value="{{$commodity->purchase_price}}">
                                    <span class="input-group-addon">.00</span>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-cube"></i></span>
                                    <input id="unit" name="unit" class="form-control"
                                           placeholder="单位" value="{{$commodity->unit}}">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-fax"></i></span>
                                    <select class="form-control  select2" name="supplier_id" style="width: 100%">
                                        <option value=""></option>
                                        @foreach($suppliers as $id => $name)
                                            <option value="{{$id}}" {{$id === $commodity->supplier_id ? 'selected' : ''}}>
                                                {{$name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /form-group -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="button" class="btn btn-danger " data-toggle="modal"
                                        data-target="#deleteModal">
                                    删除
                                </button>
                                <button type="submit" class="btn btn-primary pull-right">提交</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div id="deleteModal" class="modal fade modal-danger">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">删除</h4>
                        </div>
                        <div class="modal-body">
                            <p>确定要删除该商品？</p>
                        </div>
                        <div class="modal-footer">
                            <form method="POST" action="{{route('commodities.destroy',$commodity->id)}}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">关闭</button>
                                <button type="submit" class="btn btn-outline">确定</button>
                            </form>
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
    <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2({
                language: "zh-CN",
                placeholder: '请选择一个供应商',
                allowClear: true
            });
        });
    </script>
@stop
