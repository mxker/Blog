<!DOCTYPE HTML>
<html>
<head>
    <title>骑在大象背上的人生</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    {{--<!--[if lte IE 8]><script src="{{ asset('blog/assets/js/ie/html5shiv.js') }}"></script><![endif]-->--}}
    <link rel="stylesheet" href="{{ asset('blog/assets/css/main.css') }}" />
    {{--<!--[if lte IE 9]><link rel="stylesheet" href="blog/assets/css/ie9.css" /><![endif]-->--}}
    {{--<!--[if lte IE 8]><link rel="stylesheet" href="blog/assets/css/ie8.css" /><![endif]-->--}}
</head>
<body>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header">
        <h1><a href="{{ url('/') }}">骑在大象背上的人生</a></h1>
        <nav class="links">
            <ul>
                <li><a href="{{ url('/') }}">首页</a></li>
                <li><a href="{{ url('/') }}">博客</a></li>
                <li><a href="{{ url('/') }}">关于我</a></li>
            </ul>
        </nav>
        <nav class="main">
            <ul>
                <li class="search">
                    <a class="fa-search" href="#search">Search</a>
                    <form id="search" method="get" action="#">
                        <input type="text" name="query" placeholder="Search" />
                    </form>
                </li>
                <li class="menu">
                    <a class="fa-bars" href="#menu">Menu</a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Menu -->
    <section id="menu">

        <!-- Search -->
        <section>
            <form class="search" method="get" action="#">
                <input type="text" name="query" placeholder="Search" />
            </form>
        </section>

        <!-- Links -->
        <section>
            <ul class="links">
                <li>
                    <a href="#">
                        <h3>Lorem ipsum</h3>
                        <p>Feugiat tempus veroeros dolor</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <h3>Dolor sit amet</h3>
                        <p>Sed vitae justo condimentum</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <h3>Feugiat veroeros</h3>
                        <p>Phasellus sed ultricies mi congue</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <h3>Etiam sed consequat</h3>
                        <p>Porta lectus amet ultricies</p>
                    </a>
                </li>
            </ul>
        </section>

        <!-- Actions -->
        <section>
            <ul class="actions vertical">
                <li><a href="#" class="button big fit">Log In</a></li>
            </ul>
        </section>

    </section>

    @yield('content')

</div>

<!-- Scripts -->
<script src="{{ asset('blog/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('blog/assets/js/skel.min.js') }}"></script>
<script src="{{ asset('blog/assets/js/util.js') }}"></script>
{{--<!--[if lte IE 8]><script src="blog/assets/js/ie/respond.min.js"></script><![endif]-->--}}
<script src="{{ asset('blog/assets/js/main.js') }}"></script>

</body>
</html>