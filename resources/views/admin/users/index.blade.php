@extends('layouts.dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                用户列表
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li><a href="{{ route('users.index') }}">用户管理</a></li>
                <li class="active">用户列表</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">用户列表</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row form-inline">
                                <div class="col-md-6 pull-right">
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
                                        <th>ID</th>
                                        <th class="col-md-1">姓名</th>
                                        <th class="col-md-3">邮箱</th>
                                        <th class="col-md-3">创建时间</th>
                                        <th class="col-md-3">更新时间</th>
                                        <th class="col-md-2">操作</th>
                                    </tr>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->created_at}}</td>
                                            <td>{{$user->updated_at}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('users.show', $user->id) }}">
                                                        <button type="button" class="btn btn-info ">
                                                            <i class="fa fa-book"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('users.edit' ,$user->id) }}">
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
                            {{ $users->links() }}
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
    <!-- /.content-wrapper -->
@stop
@section('script')
    <script>
        $(function () {
            $('#search-btn').on('click', function (event) {
                var keyword = $('#keyword').val();
                if (keyword != '') {
                    location.href = '{{url('/users/search')}}' + '/' + keyword;
                } else {
                }
            })
        });
    </script>
@stop