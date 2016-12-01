@extends('layouts.dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                供应商列表
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/index')}}"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li><a href="{{url('/suppliers')}}">供应商管理</a></li>
                <li class="active">供应商列表</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">供应商列表</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row form-inline">
                                <div class="col-md-6">
                                    <div class="margin">
                                        <a href="{{route('suppliers.create')}}">
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
                            <div class="table-responsive ">
                                <table class="table table-bordered text-center">
                                    <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <th class="col-md-2">公司名称</th>
                                        <th class="col-md-1">联系电话</th>
                                        <th class="col-md-2">负责人</th>
                                        <th class="col-md-1">负责人电话</th>
                                        <th class="col-md-1">邮箱</th>
                                        <th class="col-md-2">地址</th>
                                        <th class="col-md-1">创建时间</th>
                                        <th class="col-md-1">更新时间</th>
                                        <th class="col-md-1">操作</th>
                                    </tr>
                                    @foreach($suppliers as $supplier)
                                        <tr>
                                            <td>{{$supplier->id}}</td>
                                            <td>{{$supplier->company_name}}</td>
                                            <td>{{$supplier->company_phone}}</td>
                                            <td>{{$supplier->contact_name}}</td>
                                            <td>{{$supplier->mobile_phone}}</td>
                                            <td>{{$supplier->email}}</td>
                                            <td>{{$supplier->address}}</td>
                                            <td>{{$supplier->created_at}}</td>
                                            <td>{{$supplier->updated_at}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{url('suppliers/'.$supplier->id)}}">
                                                        <button type="button" class="btn btn-info ">
                                                            <i class="fa fa-book"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{url('suppliers/'.$supplier->id.'/edit')}}">
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
                            {{ $suppliers->links() }}
                        </div>
                    </div>
                    <!-- /.box -->
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
                    location.href = '{{url('/suppliers/search')}}' + '/' + keyword;
                } else {
                }
            })
        });
    </script>
@stop