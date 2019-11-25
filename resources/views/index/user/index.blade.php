@extends('index.layouts.layouts')
@section('title')
    news info
@endsection
@section('content')
    <div class="inner met_flash">
        <div class="flash">
            <a href='#' target='_blank' title='企业网站管理系统'><img src='/images/aabbcc.png' width='980' alt='企业网站管理系统' height='90'></a>
        </div>
    </div>
    <div class="sidebar inner">
        <div class="sb_nav">

            <h3 class='title myCorner' data-corner='top 5px'>个人新闻</h3>
            <div class="active" id="sidebar" data-csnow="2" data-class3="0" data-jsok="2">
                <div>
                    个人信息</div>
                <div>
                    邮 &nbsp;箱：{{ $user_info['a_email'] }}</div>
                <div>
                    用 户 名：{{ $user_info['a_name'] }}</div>
                <div>
                    个人介绍：{{ $user_info['a_desc'] }}</div>
                <div class="clear">
                    <a href="/admin/permission/index">发布新闻</a>
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
                <div class="clear"></div>
            </div>
        </div>
        <div class="sb_box">
            <h3 class="title">
                浏览历史
            </h3>
            <div class="clear"></div>

            <div class="active" id="newslist">
                <ul class='list-none metlist'>
                    @foreach($news_info as $v)
                        <li class='list top'><span>{{ date("m/d H:i",$v['add_time']) }}</span><a href='/index/news/info?id={{ $v['n_id'] }}' title='如何选择网站关键词?' target='_self'>{{ $v['n_name'] }}</a><img class='listhot' src='img/hot.gif' alt='图片关键词' /></li>
                    @endforeach
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