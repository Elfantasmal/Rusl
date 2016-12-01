@extends('layouts.dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                商品入库
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li><a href="#">仓库管理</a></li>
                <li class="active">商品入库</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">商品入库</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row form-inline">
                                <div class="col-md-6">
                                    <div class="margin">
                                        <a href="{{route('stock_in.create')}}">
                                            <button type="button" class="btn btn-flat btn-info ">
                                                创建
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
                                        <th class="col-md-2">入库数量</th>
                                        <th class="col-md-3">入库类型</th>
                                        <th class="col-md-3">入库时间</th>
                                        <th class="col-md-2">创建时间</th>
                                    </tr>
                                    @foreach($stock_ins as $stock_in)
                                        <tr>
                                            <td>{{$stock_in->commodity->name}}</td>
                                            <td>{{$stock_in->in_quantity}}</td>
                                            <td>{{$stock_in->in_type}}</td>
                                            <td>{{$stock_in->in_at}}</td>
                                            <td>{{$stock_in->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            {{ $stock_ins->links() }}
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.section -->
    </div>
@stop
@section('script')
    <script>
        $(function () {
            $('#search-btn').on('click', function (event) {
                var keyword = $('#keyword').val();
                if (keyword != '') {
                    location.href = '{{url('/stock_in/search')}}' + '/' + keyword;
                } else {
                }
            })
        });
    </script>
@stop