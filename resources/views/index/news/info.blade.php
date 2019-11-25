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
                <div class="position">当前位置：<a href="/index/cart/list?id={{ $news_info['c_id'] }}" title="网站首页">{{ $news_info['c_name'] }}</a> &gt; <a href='javascript:;' >{{ $news_info['n_name'] }}</a></div>
                <span>{{ $news_info['c_name'] }}</span>
            </h3>
            <div class="clear"></div>

            <div class="active" id="shownews">
                <h1 class="title">{{ $news_info['n_name'] }}</h1>
                <div class="editor"><div>
                        <div>
                        &nbsp; &nbsp; &nbsp;{{ $news_info['n_desc'] }}
                        </div>
                        <div>
                    &nbsp;  </div>
                        <ol>
                            <li>
                                <img src="{{ $news_info['n_img'] }}" alt="" width="600px">
                            </li>
                            @if(!empty($news_info['n_music']))
                                <li>
                                    <audio src="{{ $news_info['n_music'] }}" controls="controls" style="width:500px;height: 50px"></audio>
                                </li>
                            @endif
                            <li>
                                <span style="font-size:13px;"><strong>{{ $news_info['n_connect'] }}</strong><span style="font-size:12px;">，</span></span><br />
                            </li>
                        </ol>
                        <div id="metinfo_additional">

                        </div>
                    </div><div class="clear">

                    </div>
                </div>
                <div class="met_hits">
                    <div class='metjiathis'>
                        <div class="jiathis_style">
                            <span class="jiathis_txt">分享到：</span>
                            <a class="jiathis_button_icons_1">暂不支持分享</a>
                        </div>
                        <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1346378669840136" charset="utf-8"></script>
                    </div>
                    点击次数：{{ $news_info['page_view'] }}
                    <span>
                        <script language='javascript' src='../include/hits.php?type=news&id=10'></script>
                    </span>&nbsp;&nbsp;更新时间：{{ $news_info['add_time'] }}
                    <a href="javascript:self.close()">关闭</a></div>
                <div class="met_page">本文作者:{{ $news_info['a_name'] }} <a href='javascript:;' id="asc">本站无客服</a></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <script>
        
    </script>
@endsection