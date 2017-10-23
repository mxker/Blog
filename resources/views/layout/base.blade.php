@section('top')
<!doctype html>
<html class="no-js" lang="">

<head>

    <meta charset="utf-8">
    <meta name="description" content="Flat, Clean, Responsive, admin template built with bootstrap 3">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

    <title>Blog | 管理平台</title>

    <script type="text/javascript">
        //<![CDATA[
        try {
            if (!window.CloudFlare) {
                var CloudFlare = [{
                    verbose: 0,
                    p: 0,
                    byc: 0,
                    owlid: "cf",
                    bag2: 1,
                    mirage2: 0,
                    oracle: 0,
                    paths: {
                        cloudflare: "/cdn-cgi/nexp/dok2v=1613a3a185/"
                    },
                    atok: "1668c19642567e08c574f5d9458345a2",
                    petok: "e4e94cfc1072d2d03c603fe77e0efa5fb7a4df22-1419101785-1800",
                    zone: "nyasha.me",
                    rocket: "0",
                    apps: {
                        "ga_key": {
                            "ua": "UA-50530436-1",
                            "ga_bs": "2"
                        }
                    }
                }];
                CloudFlare.push({
                    "apps": {
                        "ape": "19b3fea142b69d216dd520a176e9db26"
                    }
                });
                ! function(a, b) {
                    a = document.createElement("script"), b = document.getElementsByTagName("script")[0], a.async = !0, a.src = "/js/cloudflare.min.js", b.parentNode.insertBefore(a, b)
                }()
            }
        } catch (e) {};
        //]]>
    </script>
    <link rel="stylesheet" href="/vendor/offline/theme.css">
    <link rel="stylesheet" href="/vendor/pace/theme.css">


    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/animate.min.css">

    <link rel="stylesheet" href="/css/panel.css">

    <link rel="stylesheet" href="/css/skins/palette.1.css" id="skin">
    {{--<link rel="stylesheet" href="/css/fonts/style.1.css" id="font">--}}
    <link rel="stylesheet" href="/css/main.css">


    <!--[if lt IE 9]>
        <script src="/js/html5shiv.js"></script>
        <script src="/js/respond.min.js"></script>
    <![endif]-->

    <script src="/vendor/modernizr.js"></script>
    <script type="text/javascript">
        /* <![CDATA[ */
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-50530436-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();

        (function(b) {
            (function(a) {
                "__CF" in b && "DJS" in b.__CF ? b.__CF.DJS.push(a) : "addEventListener" in b ? b.addEventListener("load", a, !1) : b.attachEvent("onload", a)
            })(function() {
                "FB" in b && "Event" in FB && "subscribe" in FB.Event && (FB.Event.subscribe("edge.create", function(a) {
                    _gaq.push(["_trackSocial", "facebook", "like", a])
                }), FB.Event.subscribe("edge.remove", function(a) {
                    _gaq.push(["_trackSocial", "facebook", "unlike", a])
                }), FB.Event.subscribe("message.send", function(a) {
                    _gaq.push(["_trackSocial", "facebook", "send", a])
                }));
                "twttr" in b && "events" in twttr && "bind" in twttr.events && twttr.events.bind("tweet", function(a) {
                    if (a) {
                        var b;
                        if (a.target && a.target.nodeName == "IFRAME") a: {
                            if (a = a.target.src) {
                                a = a.split("#")[0].match(/[^?=&]+=([^&]*)?/g);
                                b = 0;
                                for (var c; c = a[b]; ++b)
                                    if (c.indexOf("url") === 0) {
                                        b = unescape(c.split("=")[1]);
                                        break a
                                    }
                            }
                            b = void 0
                        }
                        _gaq.push(["_trackSocial", "twitter", "tweet", b])
                    }
                })
            })
        })(window);
        /* ]]> */
    </script>
</head>
@show

<body>
    {{--系统设置--}}
    <div class="ob_options hidden-xs">
        <div class="options">
            <h6>COLOR SKINS</h6>
            <div class="options-container color_skins">
                <a href="/css/skins/palette.1.css" class="css_orange cs_color cs_1"></a>
                <a href="/css/skins/palette.2.css" class="css_orange cs_color cs_2"></a>
                <a href="/css/skins/palette.3.css" class="css_orange cs_color cs_3"></a>
                <a href="/css/skins/palette.4.css" class="css_orange cs_color cs_4"></a>
                <a href="/css/skins/palette.5.css" class="css_orange cs_color cs_5"></a>
                <a href="/css/skins/palette.6.css" class="css_orange cs_color cs_6"></a>
                <a href="/css/skins/palette.7.css" class="css_orange cs_color cs_7"></a>
                <a href="/css/skins/palette.8.css" class="css_orange cs_color cs_8"></a>
                <a href="/css/skins/palette.9.css" class="css_orange cs_color cs_9"></a>
                <a href="/css/skins/palette.10.css" class="css_orange cs_color cs_10"></a>
            </div>
            <h6>FONT OPTIONS</h6>
            <div class="options-container font_options">
                <select class="input-sm">
                    <option value="/css/fonts/style.1.css">Open Sans</option>
                    <option value="/css/fonts/style.2.css">Helvetica Neue</option>
                    <option value="/css/fonts/style.3.css">Montserrat &amp; Open Sans</option>
                </select>
            </div>
            <h6>LAYOUT VARIATIONS</h6>
            <div class="options-container layout_options">
                <select class="input-sm">
                    <option value="boxed.html">Boxed</option>
                    <option value="horizontal.html">Horizontal menu</option>
                    <option value="horizontal_boxed.html">Horizontal Boxed</option>
                    <option value="small-sidebar.html">Small sidebar</option>
                    <option value="right-sidebar.html">Right sidebar</option>
                    <option value="right-sidebar-collapsible.html">Right Collapsed</option>
                    <option value="both.html">Mixed Menus</option>
                    <option value="collapsible.html">Collapsible</option>
                    <option value="app.html">App</option>
                    <option value="footer.html">With footer</option>
                </select>
            </div><small class="ucase">This Panel is for demo purposes only</small>
        </div>
        <div class="ob_toggle bg-color"><span class="fa fa-cog"></span>
        </div>
    </div>

    <div class="app boxed box-shadow" style="width: 100%;">
        {{--头部个人信息--}}
        <header class="header header-fixed navbar">
            <div class="brand">
                <a href="javascript:;" class="fa fa-bars off-left visible-xs" data-toggle="off-canvas" data-move="ltr"></a>
                <a href="index.html" class="navbar-brand text-white">
                    <i class="fa fa-stop mg-r-sm"></i>
                    <span class="heading-font">Blog | <b>管理平台</b></span>
                </a>
            </div>
            <form class="navbar-form navbar-left hidden-xs" role="search">
                <div class="form-group">
                    <button class="btn no-border no-margin bg-none no-pd-l" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                    <input type="text" class="form-control no-border no-padding search" placeholder="Search Workspace">
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right off-right">
                <li class="hidden-xs">
                    <a href="javascript:;">@yield('email')</a>
                </li>
                <li class="notifications dropdown hidden-xs">
                    <a href="javascript:;" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                        <div class="badge badge-top bg-danger animated flash">3</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animated slideInRight">
                        <div class="panel bg-white no-border no-margin">
                            <div class="panel-heading no-radius">
                                <small>
                                    <b>Notifications</b>
                                </small>
                                <small class="pull-right">
                                    <a href="javascript:;" class="mg-r-xs">mark as read</a>&#8226;
                                    <a href="javascript:;" class="fa fa-cog mg-l-xs"></a>
                                </small>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="javascript:;">
                                        <span class="pull-left mg-t-xs mg-r-md">
                                            <img src="/img/face4.jpg" class="avatar avatar-sm img-circle" alt="">
                                        </span>
                                        <div class="m-body show pd-t-xs">
                                            <span>Dean Winchester</span>
                                            <span>Posted on to your wall</span>
                                            <small>2 mins ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="javascript:;">
                                        <span class="pull-left mg-t-xs mg-r-md">
<span class="fa-stack fa-lg">
<i class="fa fa-circle fa-stack-2x text-warning"></i>
<i class="fa fa-download fa-stack-1x fa-inverse"></i>
</span>
                                        </span>
                                        <div class="m-body show pd-t-xs">
                                            <span>145 MB download in progress.</span>
                                            <div class="progress progress-xs mg-t-xs mg-b-xs">
                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                </div>
                                            </div>
                                            <small>Started 23 mins ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="javascript:;">
                                        <span class="pull-left mg-t-xs mg-r-md">
<img src="/img/face3.jpg" class="avatar avatar-sm img-circle" alt="">
</span>
                                        <div class="m-body show pd-t-xs">
                                            <span>Application</span>
                                            <span>Where is my workspace widget</span>
                                            <small>5 days ago</small>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="panel-footer no-border">
                                <a href="javascript:;">See all notifications</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="quickmenu">
                    <a href="javascript:;" data-toggle="dropdown">
                        <img src="/img/avatar.jpg" class="avatar pull-left img-circle" alt="user" title="user">
                        <i class="caret mg-l-xs hidden-xs no-margin"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right mg-r-xs">
                        <li>
                            <a href="javascript:;">
                                <div class="pd-t-sm">
                                    @yield('name')
                                    <br>
                                    <small class="text-muted">4.2 MB of 51.25 GB used</small>
                                </div>
                                <div class="progress progress-xs no-radius no-margin mg-b-sm">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">Settings</a>
                        </li>
                        <li>
                            <a href="javascript:;">Upgrade</a>
                        </li>
                        <li>
                            <a href="javascript:;">Notifications
                                <div class="badge bg-danger pull-right">3</div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">Help ?</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="/backend/logout">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>

        <section class="layout">

            <aside class="sidebar canvas-left">

                <nav class="main-navigation">
                    <ul>
                        <li>
                            <a href="/">
                                <i class="fa fa-coffee"></i>
                                <span>框架结构</span>
                            </a>
                        </li>
                        <li class="dropdown show-on-hover">
                            <a href="javascript:;" data-toggle="dropdown">
                                <i class="fa fa-ellipsis-h"></i>
                                <span>用户管理</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="buttons.html">
                                        <span>基本信息</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="forms.html">
                                        <span>用户列表</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown show-on-hover active">
                            <a href="javascript:;" data-toggle="dropdown">
                                <i class="fa fa-tasks"></i>
                                <span>分类管理</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="active">
                                    <a href="/backend/category/create">
                                        <span>添加分类</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/backend/category">
                                        <span>分类列表</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="mail.html">
                                <div class="badge bg-none pull-right">8</div>
                                <i class="fa fa-envelope"></i>
                                <span>文章管理</span>
                            </a>
                        </li>
                        <li class="dropdown show-on-hover">
                            <a href="javascript:;" data-toggle="dropdown">
                                <i class="fa fa-file"></i>
                                <span>评论管理</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="tasks.html">
                                        <span>Tasks</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown show-on-hover">
                            <a href="javascript:;" data-toggle="dropdown">
                                <i class="fa fa-gift"></i>
                                <span>关于我们</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="pricing.html">
                                        <span>Pricing Tables</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="系统信息">
                                <i class="fa fa-info"></i>
                                <span>Change log</span>
                            </a>
                        </li>
                    </ul>
                </nav>


                <footer>
                    <div class="about-app pd-md animated pulse">
                        <a href="javascript:;">
                            <img src="/img/about.png" alt="">
                        </a>
                        <span>
                            <b>Blog</b>&#32;is a responsive admin template powered by bootstrap 3.
                            <a href="javascript:;">
                            <b>Find out more</b>
                            </a>
                        </span>
                    </div>
                    <div class="footer-toolbar pull-left">
                        <a href="javascript:;" class="pull-left help">
                            <i class="fa fa-question-circle"></i>
                        </a>
                        <a href="javascript:;" class="toggle-sidebar pull-right hidden-xs">
                            <i class="fa fa-angle-left"></i>
                        </a>
                    </div>
                </footer>

            </aside>


            <section class="main-content">

                <div class="content-wrap no-padding">
                    {{-- 继承后插入的内容 --}}
                    @yield('content')
                </div>

            </section>

        </section>
    </div>

    <script src="/vendor/jquery-1.11.1.min.js"></script>
    <script src="/bootstrap/js/bootstrap.js"></script>
    <script src="/vendor/jquery.easing.min.js"></script>
    <script src="/vendor/jquery.placeholder.js"></script>
    <script src="/vendor/fastclick.js"></script>


    <script src="/vendor/offline/offline.min.js"></script>
    <script src="/vendor/pace/pace.min.js"></script>


    <script src="/js/off-canvas.js"></script>
    <script src="/js/main.js"></script>

    <script src="/js/panel.js"></script>

    // 引入弹层框
    <script src="{{ asset('/org/layer/layer.js') }}"></script>
</body>

</html>