@extends('layouts.dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                库存盘点
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li><a href="#">仓库管理</a></li>
                <li class="active">库存盘点</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">库存盘点</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row form-inline">
                                <div class="col-md-6">
                                    <div class="margin">
                                        <a href="{{route('stocks.create')}}">
                                            <button type="button" class="btn btn-flat btn-info ">
                                                创建
                                            </button>
                                        </a>
                                        <a href="{{route('stock_in.create')}}">
                                            <button type="button" class="btn btn-flat btn-info ">
                                                商品入库
                                            </button>
                                        </a>
                                        <a href="{{route('stock_out.create')}}">
                                            <button type="button" class="btn btn-flat btn-info ">
                                                商品出库
                                            </button>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group pull-right margin">
                                        <input id="keyword" type="text" class="form-control">
                                        <span class="input-group-btn">
                                            <button id="search-btn" type="button" class="btn btn-info btn-flat">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <tbody>
                                    <tr>
                                        <th class="col-md-2">商品</th>
                                        <th class="col-md-2">现有库存数量</th>
                                        <th class="col-md-2">预警数量</th>
                                        <th class="col-md-2">创建时间</th>
                                        <th class="col-md-2">更新时间</th>
                                        <th class="col-md-2">操作</th>
                                    </tr>
                                    @foreach($stocks as $stock)
                                        <tr>
                                            <td>{{$stock->commodity->name}}</td>
                                            <td>{{$stock->stock}}</td>
                                            <td>{{$stock->stock_alert}}</td>
                                            <td>{{$stock->created_at}}</td>
                                            <td>{{$stock->updated_at}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{route('stocks.show', $stock->id)}}">
                                                        <button type="button" class="btn btn-info ">
                                                            <i class="fa fa-book"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{route('stocks.edit', $stock->id)}}">
                                                        <button type="button" class="btn btn-info ">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            {{ $stocks->links() }}
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.section -->
    </div>
    <!-- /.content-wrapper -->
@stop
@section('script')
    <script>
        $(function () {
            $('#search-btn').on('click', function (event) {
                var keyword = $('#keyword').val();
                if (keyword != '') {
                    location.href = '{{url('/stocks/search')}}' + '/' + keyword;
                } else {
                }
            })
        });
    </script>
@stop