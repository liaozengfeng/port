@extends('index.layouts.layouts')
@section('title')
    news info
@endsection
@section('content')
    <div class="inner met_flash">
        <div class="flash">
            <a href='#' target='_blank' title='企业网站管理系统'><img src='img/1342430358.jpg' width='980' alt='企业网站管理系统' height='90'></a>
        </div>
    </div>
    <div class="sidebar inner">
        <div class="sb_nav">

            <h3 class='title myCorner' data-corner='top 5px'>个人新闻</h3>
            <div class="active" id="sidebar" data-csnow="2" data-class3="0" data-jsok="2">
                @foreach($cart_info as $v)
                     <dl class="list-none navnow"><dt id='part2_4'><a href='/index/cart/list?id={{ $v['c_id'] }}'  title='{{ $v['c_name'] }}' class="zm"><span>{{ $v['c_name'] }}</span></a></dt></dl>
                @endforeach
                <div class="clear">
                </div>
            </div>

            <h3 class='title line myCorner' data-corner='top 5px'>平台介绍</h3>
            <div class="active editor"><div>
                    <strong>私人项目</strong>不接受评论,不接受反驳,不接受意见!!</div>
                <div>
                    开心有限公司</div>
                <div>
                    电 &nbsp;话：一三九白酒啤酒葡萄酒</div>
                <div>
                    邮 &nbsp;编：A_ZC</div>
                <div>
                    Email：困难户,欢迎各位大佬资助</div>
                <div>
                    网 &nbsp;址：http://post_program.com</div>
                <div class="clear"></div></div>
        </div>
        <div class="sb_box">
            <h3 class="title">
                <div class="position">当前位置：<a href="javascript:;" title="{{ $news_info[0]['c_name'] }}">{{ $news_info[0]['c_name'] }}</a> &gt;</div>
                <span>{{ $news_info[0]['c_name'] }}</span>
            </h3>
            <div class="clear"></div>

            <div class="active" id="newslist">
                <ul class='list-none metlist'>
                    @foreach($news_info as $v)
                        <li class='list top'><span>{{ $v['add_time'] }}</span><a href='/index/news/info?id={{ $v['n_id'] }}' title='如何选择网站关键词?' target='_self'>{{ $v['n_name'] }}</a><img class='listhot' src='img/hot.gif' alt='图片关键词' /></li>
                    @endforeach
                    <li class='list '><span>[2012-07-16]</span><a href='javascript:;' title='新手使用MetInfo建站步骤' target='_self'>新手使用MetInfo建站步骤</a><img class='listhot' src='img/hot.gif' alt='图片关键词' /></li>
                    <li class='list '><span>[2012-07-16]</span><a href='javascript:;' title='企业网站应该多长时间备份一次？' target='_self'>企业网站应该多长时间备份一次？</a><img class='listhot' src='img/hot.gif' alt='图片关键词' /></li>
                    <li class='list '><span>[2012-07-16]</span><a href='javascript:;' title='如何充分发挥MetInfo的SEO功能' target='_self'>如何充分发挥MetInfo的SEO功能</a><img class='listhot' src='img/hot.gif' alt='图片关键词' /></li>
                    <li class='list '><span>[2012-07-16]</span><a href='javascript:;' title='什么是伪静态？伪静态有何作用?' target='_self'>什么是伪静态？伪静态有何作用?</a><img class='listhot' src='img/hot.gif' alt='图片关键词' /></li>
                    <li class='list '><span>[2012-07-16]</span><a href='javascript:;' title='企业用网站进行网络宣传的优势' target='_self'>企业用网站进行网络宣传的优势</a><img class='listhot' src='img/hot.gif' alt='图片关键词' /></li>

                </ul>
                <div id="flip">
                    {{ $news_info->links() }}
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <script>
        
    </script>
@endsection