@extends('layouts.dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                客户列表
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/index')}}"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li><a href="{{url('/customers')}}">客户管理</a></li>
                <li class="active">客户列表</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">客户列表</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <th>公司名称</th>
                                        <th>联系电话</th>
                                        <th>负责人</th>
                                        <th>负责人电话</th>
                                        <th>邮箱</th>
                                        <th>地址</th>
                                        <th>创建时间</th>
                                        <th>更新时间</th>
                                        <th>操作</th>
                                    </tr>
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td>{{$customer->id}}</td>
                                            <td>{{$customer->company_name}}</td>
                                            <td>{{$customer->company_phone}}</td>
                                            <td>{{$customer->contact_name}}</td>
                                            <td>{{$customer->mobile_phone}}</td>
                                            <td>{{$customer->email}}</td>
                                            <td>{{$customer->address}}</td>
                                            <td>{{$customer->created_at}}</td>
                                            <td>{{$customer->updated_at}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{route('customers.show',[$customer->id])}}">
                                                        <button type="button" class="btn btn-info ">
                                                            <i class="fa fa-book"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{route('customers.edit',[$customer->id])}}">
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
                            {{ $customers->links() }}
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