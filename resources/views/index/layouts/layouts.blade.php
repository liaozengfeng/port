<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <base href="/index/">
    <title>@yield('title')</title>
    <meta name="description" content="网站描述，一般显示在搜索引擎搜索结果中的描述文字，用于介绍网站，吸引浏览者点击。" />
    <meta name="keywords" content="网站关键词" />
    <meta name="generator" content="MetInfo 5.1.7" />
    <link href="favicon.ico" rel="shortcut icon" />
    <link rel="stylesheet" type="text/css" href="css/metinfo.css" />
    <script src="js/jQuery1.7.2.js" type="text/javascript"></script>
    <script src="js/ch.js" type="text/javascript"></script>

</head>
<body>
<header>
    <div class="inner">
        <div class="top-logo">
            <a href="index.html" title="网站名称" id="web_logo"><img src="img/logo.png" alt="网站名称" title="网站名称" style="margin:20px 0px 0px 0px;" /></a>

        </div>

        <nav>
            <ul class="list-none">
                <?php
                 $num=count($nav_info);
                $num=ceil(100/$num)."%";
                ?>
                @foreach($nav_info as $k=>$v)
                    <?php $id="nav_".(1+$k)?>
                    <li id="{{ $id }}" style='width: 20%;' class='hover-none nav'><a href='{{ $v['n_url'] }}' class='nav'><span>{{ $v['n_name'] }}</span></a></li>
                @endforeach

            </ul>
        </nav>
    </div>
</header>




<div class="index inner">


    
    @yield('content')



    <div class="clear p-line"></div>

    <div class="index-product style-2">
        <h3 class='title myCorner' data-corner='top 5px'>
            <span></span>
            <div class="flip"><p id="trigger"></p> <a class="prev" id="car_prev" href="javascript:void(0);"></a> <a class="next" id="car_next" href="javascript:void(0);"></a></div>
            <a href=""  class="more"></a>
        </h3>
        <div class="active clear">
            <div class="profld" id="indexcar" data-listnum="5">
                <ol class='list-none metlist'>
                    @foreach($adv_info as $v)
                        <li class='list'>
                            <a href='{{ $v['a_src'] }}'  class='img'>
                                <img src='{{ $v['a_img'] }}'  width='160' height='130' />
                            </a>
                            <h3 style='width:160px;'>
                                <a href='#' >示例产品八</a>
                            </h3>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>

    <div class="clear"></div>
    <div class="index-links">
        <div class="active clear">
            <div class="img"><ul class='list-none'>
                </ul>
            </div>
            <div class="txt"><ul class='list-none'>
                    @foreach($link_info as $v)
                        <li><a href='{{ $v['l_url'] }}' target='_blank' title='{{ $v['l_url'] }}'>{{ $v['l_name'] }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>

</div>

<footer data-module="10001" data-classnow="10001">
    <div class="inner">
        <div class="foot-nav">
            @foreach($link_info as $v)
                 <a href='{{ $v['l_url'] }}'  title='{{ $v['l_name'] }}'>{{ $v['l_name'] }}</a>
            @endforeach
        </div>
        <div class="foot-text">
            <p>我的网站 版权所有 2008-2012 湘ICP备88888</p>
            <p>电话：0731-12345678 12345678  QQ:88888888 999999  Email:metinfo@metinfo.cn</p>
        </div>
    </div>
</footer>
<script src="js/fun.inc.js" type="text/javascript"></script>
<div style="text-align:center;">
    <p>来源：More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
</div>
</body>
</html>