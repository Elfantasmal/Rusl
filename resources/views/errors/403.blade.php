<!DOCTYPE html>
<html>
<head>
    <title>Rusl 403</title>

    <link href="https://fonts.gmirror.org/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato', 'PingFang SC', 'Verdana', 'Helvetica Neue', 'Microsoft Yahei', 'Hiragino Sans GB', 'Microsoft Sans Serif', 'WenQuanYi Micro Hei', 'sans-serif';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 160px;
            margin-bottom: 40px;
        }

        .info {
            font-size: 72px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">403</div>
        <div class="info">抱歉！你无权访问该系统，请联系管理员授予权限。</div>
        <div><a href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                登出
            </a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                  style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>
</body>
</html>
