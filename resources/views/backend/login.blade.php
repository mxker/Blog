<!Doctype html>
<html class="signin no-js" lang="">

<head>

    <meta charset="utf-8">
    <meta name="description" content="Flat, Clean, Responsive, admin template built with bootstrap 3">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

    <title>Blog | 管理平台</title>
    <link rel="stylesheet" href="/vendor/offline/theme.css">
    <link rel="stylesheet" href="/vendor/pace/theme.css">


    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/animate.min.css">


    <link rel="stylesheet" href="/css/skins/palette.1.css" id="skin">
{{--    <link rel="stylesheet" href="/css/fonts/style.1.css" id="font">--}}
    <link rel="stylesheet" href="/css/main.css">


    <!--[if lt IE 9]>
        <script src="/js/html5shiv.js"></script>
        <script src="/js/respond.min.js"></script>
    <![endif]-->

    {{--<script src="/vendor/modernizr.js"></script>--}}
</head>

<body class="bg-color center-wrapper">
    <div class="center-content">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <h3 style="color: red;"></h3>
                @if (session('message'))
                    <div class="alert alert-danger">
                        <ul>
{{--                            @foreach ($errors->all() as $error)--}}
{{--                                <li>{{ $error }}</li>--}}
                                <li>{{ session('message') }}</li>
{{--                            @endforeach--}}
                        </ul>
                    </div>
                @endif
                <section class="panel panel-default">
                    <header class="panel-heading">登录</header>
                    <div class="bg-white user pd-md">
                        <h6><strong>Welcome.</strong>Sign in to get started!</h6>
                        <form role="form" action="{{ url('backend/login/check') }}" method="post">
                            <input name="username" type="text" class="form-control mg-b-sm" placeholder="Username" autofocus>
                            <input name="password" type="password" class="form-control" placeholder="Password">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div style="margin-top: 10px;">
                                {!! \Germey\Geetest\Geetest::render() !!}
                            </div>
                            <label class="checkbox pull-left">
                                <input type="checkbox" value="remember-me">记住密码
                            </label>
                            <div class="text-right mg-b-sm mg-t-sm">
                                <a href="javascript:;">忘记密码?</a>
                            </div>
                            <button class="btn btn-info btn-block" type="submit">登录</button>
                        </form>
                        {{--<p class="center-block mg-t mg-b text-center">OR</p>--}}
                        {{--<p>--}}
                            {{--<a class="btn btn-primary btn-block mg-b-sm">--}}
                                {{--<i class="fa fa-facebook mg-r-md pull-left pd-l-md pd-r-md pd-t-xs"></i>Login with Facebook--}}
                            {{--</a>--}}
                            {{--<a class="btn btn-info btn-block">--}}
                                {{--<i class="fa fa-twitter mg-r-md pull-left pd-l-md pd-r-md pd-t-xs"></i>Login with Twitter--}}
                            {{--</a>--}}
                        {{--</p>--}}
                        <p class="center-block mg-t mg-b text-right">Dont have and account?
                            <a href="{{ url('backend/register') }}">Sign up.</a>
                        </p>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

</html>