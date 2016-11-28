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
                创建商品
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li><a href="{{route('commodities.index')}}">商品管理</a></li>
                <li class="active">创建商品</li>
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
                        <form method="POST" action="{{url('/commodities/')}}">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input id="name" name="name" type="text" class="form-control"
                                           placeholder="名称">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-jpy"></i></span>
                                    <input id="sales-price" name="sales_price" type="number" class="form-control"
                                           placeholder="销售价格">
                                    <span class="input-group-addon">.00</span>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-jpy"></i></span>
                                    <input id="purchase-price" name="purchase_price" type="number" class="form-control"
                                           placeholder="采购价格">
                                    <span class="input-group-addon">.00</span>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-cube"></i></span>
                                    <input id="unit" name="unit"  class="form-control"
                                           placeholder="单位">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-fax"></i></span>
                                    <select class="form-control  select2" name="supplier_id" style="width: 100%">
                                        @foreach($supplier_list as $id => $name)
                                            <option value="{{$id}}">
                                                {{$name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /input-group -->
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
    <script src="{{asset('/vendor/adminlte/plugins/select2/select2.full.js')}}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();

        });
    </script>
@stop
