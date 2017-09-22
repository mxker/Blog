<!doctype html>
<html class="signup no-js" lang="">

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
    <link rel="stylesheet" href="/css/fonts/style.1.css" id="font">
    <link rel="stylesheet" href="/css/main.css">


    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->

    <script src="vendor/modernizr.js"></script>
</head>

<body class="bg-color center-wrapper">
    <div class="center-content">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <h3 style="color: red;">{{ session('message') }}</h3>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <section class="panel panel-default">
                    <header class="panel-heading">注册</header>
                    <div class="bg-white pd-md">
                        <h6><strong>Create</strong>your account.</h6>
                        <form role="form" action="/backend/register" method="post">
                            <input name="username" type="text" class="form-control mg-b-sm" placeholder="Choose a username" autofocus>
                            <input name="email" type="text" class="form-control mg-b-sm" placeholder="Email address">
                            <input name="password" type="password" class="form-control mg-b-sm" placeholder="Password">
                            <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm password">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <label class="checkbox pull-left ">
                                <input type="checkbox" value="remember-me">I accept
                                <a href="javascript:;">Cameo's</a>terms and conditions
                            </label>
                            <button class="btn btn-primary btn-block" type="submit">注册</button>
                            <p class="center-block mg-t mg-b text-center">Already have an account?</p>
                            <a class="btn btn-primary btn-block mg-b-sm" href="/backend/login">登录</a>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

</html>