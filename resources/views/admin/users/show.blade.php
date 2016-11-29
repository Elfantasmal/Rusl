@extends('layouts.dashboard')
@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                个人信息
                <small>控制面板</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/index"><i class="fa fa-dashboard"></i> 概览</a></li>
                <li><a href="#">用户管理</a></li>
                <li class="active">个人信息</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle"
                                 src="{{asset('/vendor/adminlte/dist/img/avatar4.png')}}" alt="User profile picture">

                            <h3 class="profile-username text-center">{{$user->name}}</h3>

                            <p class="text-muted text-center">
                                @if(!empty($user->roles->toArray()))
                                    {{ $user->roles[0]['display_name'] }}
                                @endif
                            </p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>邮箱</b> <a class="pull-right">{{$user->email}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>创建于</b> <a class="pull-right">{{$user->created_at}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>更新于</b> <a class="pull-right">{{$user->updated_at}}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                @if(Auth::user()->id == $user->id)
                    <div class="col-md-9">
                        <div class="nav-tabs-custom">

                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#settings" data-toggle="tab" aria-expanded="true">设置</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="settings">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">姓名</label>

                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputName"
                                                       placeholder="请输入您的姓名">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-2 control-label">邮箱</label>

                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail"
                                                       placeholder="请输入您的邮箱">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputExperience" class="col-sm-2 control-label">密码</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputExperience"
                                                       placeholder="密码">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputSkills" class="col-sm-2 control-label">确认密码</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputSkills"
                                                       placeholder="确认密码">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">提交</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->

                    </div>
                    <!-- /.col -->
                @endif
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@stop