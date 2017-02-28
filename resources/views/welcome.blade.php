<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rusl</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('favicon.ico')}}"/>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', 'PingFang SC', 'Verdana', 'Helvetica Neue', 'Microsoft Yahei', 'Hiragino Sans GB', 'Microsoft Sans Serif', 'WenQuanYi Micro Hei', 'sans-serif';
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .subtitle {
            font-size: 40px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Buddhism
            </div>
            <div class="subtitle m-b-md">
                基于lavaral的后台管理系统
            </div>

            <div class="links m-b-md">
                <a href="{{ url('/login') }}">登录</a>
                <a href="{{ url('/register') }}">注册</a>
                <a href="{{ url('https://github.com/gnailiylin/Rusl') }}">GitHub</a>
            </div>
        </div>
    </div>
<script type="text/javascript" size="90" alpha="0.6" zindex="1"
        src="{{asset('/vendor/adminlte/plugins/ribbon/ribbon.js')}}"></script>
</body>
</html>
