@extends('index.layouts.layouts')
@section('title')
    Navigation
@endsection
@section('content')
    <div class="inner met_flash">
        <link href='css/css.css' rel='stylesheet' type='text/css' />
        <script src='js/jquery.bxSlider.min.js'></script>
        <div class='flash flash6' style='width:980px; height:245px;'>
            <ul id='slider6' class='list-none'>
                @foreach($sli_info as $v)
                    <li><a href='#' target='_blank' ><img src='{{ $v['s_img'] }}'width='980' height='245'></a></li>
                @endforeach
            </ul>
        </div>
        <script type='text/javascript'>$(document).ready(function(){ $('#slider6').bxSlider({ mode:'vertical',autoHover:true,auto:true,pager: true,pause: 5000,controls:false});});</script></div>

    <div class="aboutus style-1">
        <h3 class="title">
            <span class='myCorner' data-corner='top 5px'><a href="/index/cart/list?id={{ $news_info['网易新歌']['c_id'] }}">网易新歌</a></span>
            <a href="" class="more" title="链接关键词"></a>
        </h3>
        <div class="active editor clear contour-1">
            @foreach($news_info['网易新歌']['son'] as $v)
            <div>
                <img src="{{ $v['n_img'] }}" alt="" style="margin: 8px; width: 196px; float: left; height: 209px; ">
            </div>
            <div style="padding-top:10px;">
                <span style="font-size:14px;"><strong>{{ $v['n_name'] }}</strong></span>
                <br>
                <audio src="{{ $v['n_music'] }}" controls="controls" style="width:300px;height: 20px"></audio>
            </div>
            <div>{{ $v['n_desc'] }}</div>
            <div>
                <span style="font-size:14px;"><strong>{{ $v['n_connect'] }}</strong></span>
                <br>
            </div>
            <div class="clear">

            </div>
            @endforeach
        </div>
    </div>

    <div class="case style-2">
        <h3 class='title myCorner' data-corner='top 5px'><a href="/index/cart/list?id={{ $news_info['娱乐新闻']['c_id'] }}" title="链接关键词" class="more">娱乐新闻</a></h3>
        <div class="active dl-jqrun contour-1">
            @foreach($news_info['娱乐新闻']['son'] as $v)
                <dl class="ind">
                <dt><a href="/index/news/info?id={{ $v['n_id'] }}" target='_self'><img src="{{ $v['n_img'] }}" alt="图片关键词" title="图片关键词" style="width:120px; height:110px;" /></a></dt>
                <dd>
                    <h4><a href="/index/news/info?id={{ $v['n_id'] }}" target='_self' title="示例案例六">{{ $v['n_name'] }}</a></h4>
                    <p class="desc" title="{{ $v['n_desc'] }}">{{ $v['n_desc'] }}</p>
                </dd>
            </dl>
            @endforeach
            <div class="clear"></div>
        </div>
    </div>
    <div class="clear"></div>

    <div class="index-news style-1">
        <h3 class="title">
            <span class='myCorner' data-corner='top 5px'>最新新闻</span>
            <a href="" class="more" title="链接关键词"></a>
        </h3>
        <div class="active clear listel contour-2">
            <ol class='list-none metlist'>
                @foreach($news_info['最新新闻']['son'] as $v)
                    <li class='list top'><span class='time'>{{ date("m/d H:i",$v['add_time']) }}</span><a href='/index/news/info?id={{ $v['n_id'] }}' >{{ $v['n_name'] }}</a></li>
                @endforeach
                <li class='list '><span class='time'>2012-07-16</span><a href='javascript:;' >新手使用MetInfo建站步骤</a></li>
                <li class='list '><span class='time'>2012-07-16</span><a href='javascript:;' >企业网站应该多长时间备份一次？</a></li>

            </ol>
        </div>
    </div>

    <div class="index-news style-1">
        <h3 class="title"><span class='myCorner' data-corner='top 5px'><a href="/index/cart/list?id={{ $news_info['公司新闻']['c_id'] }}">公司新闻</a></span><a href="" class="more" title="链接关键词"></a></h3>
        <div class="active clear listel contour-2"><ol class='list-none metlist'>
                @foreach($news_info['公司新闻']['son'] as $v)
                    <li class='list top'><span class='time'>{{ date("m/d H:i",$v['add_time']) }}</span><a href='/index/news/info?id={{ $v['n_id'] }}' >{{ $v['n_name'] }}</a></li>
                @endforeach
                <li class='list '><span class='time'>2012-07-16</span><a href='javascript:;' >新手使用MetInfo建站步骤</a></li>
                <li class='list '><span class='time'>2012-07-16</span><a href='javascript:;' >企业网站应该多长时间备份一次？</a></li>
                <li class='list '><span class='time'>2012-07-16</span><a href='javascript:;' >如何充分发挥MetInfo的SEO功能</a></li>
                <li class='list '><span class='time'>2012-07-16</span><a href='javascript:;' >什么是伪静态？伪静态有何作用?</a></li>
                <li class='list '><span class='time'>2012-07-16</span><a href='javascript:;' >企业用网站进行网络宣传的优势</a></li>
                <li class='list '><span class='time'>2012-07-16</span><a href='javascript:;'>MetInfo企业建站系统有何优势？</a></li>
                <li class='list '><span class='time'>2012-07-16</span><a href='javascript:;'>商业版和免费版在系统功能上有区别吗？</a></li>
                <li class='list '><span class='time'>2012-07-16</span><a href='javascript:;' >为什么企业要建多国语言网站？</a></li>
                <li class='list '><span class='time'>2012-07-16</span><a href='javascript:;'>如何获取MetInfo网站管理系统商业授权？</a></li>
            </ol></div>
    </div>
    <div class="index-conts style-2">
        <h3 class='title myCorner' data-corner='top 5px'>

            <a href="" title="链接关键词" class="more"></a><a href="/index/cart/list?id={{ $news_info['行业资讯']['c_id'] }}">行业资讯</a>
        </h3>
        <div class="active clear listel contour-2">
            <ol class='list-none metlist'>
                @foreach($news_info['行业资讯']['son'] as $v)
                    <li class='list top'><span class='time'>{{ date("m/d H:i",$v['add_time']) }}</span><a href='/index/news/info?id={{ $v['n_id'] }}' >{{ $v['n_name'] }}</a></li>
                @endforeach
                <li class='list top'><span class='time'>2012-07-16</span><a href='javascript:;' >PHP技术支持</a></li>
                <li class='list '><span class='time'>2012-07-16</span><a href='javascript:;' >网络销售</a></li>
                <li class='list '><span class='time'>2012-07-16</span><a href='javascript:;' >网页UI设计师</a></li>
                <li class='list '><span class='time'>2012-07-16</span><a href='javascript:;' >Web前端开发人员</a></li>
                <li class='list '><span class='time'>2012-07-16</span><a href='javascript:;'>电子商务专员</a></li>
            </ol>
        </div>
    </div>
@endsection



