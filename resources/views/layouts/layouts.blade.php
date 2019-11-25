<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <base href="/ladmin/">
    <title>@yield('title')</title>

    <meta name="keywords" content="">
    <meta name="description" content="">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=4.1.0" rel="stylesheet">
</head>
<script src=" {{asset('ladmin/js/jquery.min.js')}}"></script>
<script src=" {{asset('ladmin/js/bootstrap.min.js')}}"></script>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
<div id="wrapper">
    <!--左侧导航开始-->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="nav-close"><i class="fa fa-times-circle"></i>
        </div>
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="/admin/index">
                                <span class="clear">
                                    <span class="block m-t-xs" style="font-size:20px;">
                                        <i class="fa fa-area-chart"></i>
                                        <strong class="font-bold">Welcome</strong>
                                    </span>
                                </span>
                        </a>
                    </div>
                    <div class="logo-element">Ladmin
                    </div>
                </li>
                <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                    <span class="ng-scope">classify</span>
                </li>
                <li>
                    <a class="J_menuItem" href="/admin/permission/index">
                        <i class="fa fa-home"></i>
                        <span class="nav-label">Permission</span>
                    </a>
                </li>
                    {{--导航栏--}}
                    <li>
                        <a href="javascript:;">
                            <i class="fa fa fa-bar-chart-o"></i>
                            <span class="nav-label">Navigation</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="/admin/navigation/save">Navigation to add</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="/admin/navigation/show">The navigation display</a>
                            </li>
                        </ul>
                    </li>
                    {{--轮播图--}}
                    <li>
                        <a href="javascript:;">
                            <i class="fa fa fa-bar-chart-o"></i>
                            <span class="nav-label">Carousel</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="/admin/carousel/save">By adding</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="/admin/carousel/show">By showing</a>
                            </li>
                        </ul>
                    </li>

                    {{--分类--}}
                    <li>
                        <a href="javascript:;">
                            <i class="fa fa fa-bar-chart-o"></i>
                            <span class="nav-label">classify</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="/admin/cart/save">Classification of add</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="/admin/cart/show">Classification display</a>
                            </li>
                        </ul>
                    </li>

                    {{--管理员--}}
                    <li>
                    <a href="javascript:;">
                        <i class="fa fa fa-bar-chart-o"></i>
                        <span class="nav-label">Admin</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a class="J_menuItem" href="/admin/index">Administrator display</a>
                        </li>
                    </ul>
                </li>

                {{--新闻--}}
                <li>
                    <a href="javascript:;">
                        <i class="fa fa fa-bar-chart-o"></i>
                        <span class="nav-label">News</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a class="J_menuItem" href="/admin/news/save">The news added</a>
                        </li>
                        <li>
                            <a class="J_menuItem" href="/admin/news/show">News show</a>
                        </li>
                    </ul>
                </li>

                    {{--友链--}}
                    <li>
                        <a href="javascript:;">
                            <i class="fa fa fa-bar-chart-o"></i>
                            <span class="nav-label">Links</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="/admin/link/save">Add friends chain</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="/admin/link/show">Friend chain show</a>
                            </li>
                        </ul>
                    </li>

                    {{--广告--}}
                    <li>
                        <a href="javascript:;">
                            <i class="fa fa fa-bar-chart-o"></i>
                            <span class="nav-label">Advertising</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="/admin/advertising/save">Advertising add</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="/admin/advertising/show">Display advertising</a>
                            </li>
                        </ul>
                    </li>
            </ul>
        </div>
    </nav>
    <!--左侧导航结束-->
    <!--右侧部分开始-->
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-info " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                        <div class="form-group">
                            <input type="text" placeholder="I am the master of my project" class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
                    <a class="navbar-brand" href="/index/index">Front desk</a>
                    <ul class="navbar-nav ">
                        @if(empty(session('all')))
                            <a class="navbar-brand" href="/login/login">Log in</a>
                        @else
                            <li class="nav-item dropdown" style="list-style-type: none;">
                                <a class="navbar-brand" href="javascript:;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ session('all')['a_name'] }} <span class="caret"></span>
                                </a>
                                <a class="navbar-brand" href="/login/login_out" aria-haspopup="true" aria-expanded="false" v-pre>
                                    logout
                                </a>
                            </li>
                        @endif

                    </ul>
                </nav>
            </nav>
        </div>
        @yield('content')
    </div>
<!--右侧部分结束-->
</div>

<!-- 全局js -->
{{--<script src="js/jquery.min.js?v=2.1.4"></script>--}}
<script src="js/bootstrap.min.js?v=3.3.6"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="js/plugins/layer/layer.min.js"></script>

<!-- 自定义js -->
<script src="js/hAdmin.js?v=4.1.0"></script>
{{--<script type="text/javascript" src="js/index.js"></script>--}}

<!-- 第三方插件 -->
{{--<script src="js/plugins/pace/pace.min.js"></script>--}}
<div style="text-align:center;">
</div>
</body>

</html>

















