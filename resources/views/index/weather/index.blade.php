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
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="sb_box">
    <h4>一周天气展示</h4>
        <div class="active" id="shownews">
            <h1 class="title">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <input type="text" class="form-control"  id="city" placeholder="拼音或者是汉字...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" id="search" type="button">Go!</button>
                            </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </h1>
        </div>
    </div>

    <div id="container" style="min-width: 260px; height: 350px; margin: 0 auto"></div>
    <script src="https://code.highcharts.com.cn/highcharts/highcharts.js"></script>
    <script src="https://code.highcharts.com.cn/highcharts/highcharts-more.js"></script>
    <script src="https://code.highcharts.com.cn/highcharts/modules/exporting.js"></script>
    <script src="https://img.hcharts.cn/highcharts-plugins/highcharts-zh_CN.js"></script>
    <script type="text/javascript">



    //默认城市
    $.ajax({
    url:"/index/weather/getWeather",//请求的地址
    type:"GET",//请求的方式
    data:{city:"北京"},//参数
    dataType:"json",
    success:function(res){
    //视图展示
    // console.log(res.result);return;
    getweather(res.result);
    }
    });


    $("#search").on("click",function(){
    // alert(8520);
    //获取输入的城市名称
    var city = $("#city").val();
    // alert(city);
    if(city==""){
    alert("请输入正确格式");return;
    }
    //向后台发送AJAX请求
    $.ajax({
    url:"/index/weather/getWeather",//请求的地址
    type:"GET",//请求的方式
    data:{city:city},//参数
    dataType:"json",
    success:function(res){
    //视图展示
    // console.log(res.result);return;
    getweather(res.result);
    }
    });
    })
    // 封装方法  展示天气视图
    function getweather(weatherData)
    {
    var dayArr = [];
    var temperature = [];

    $.each(weatherData,function(k,v){
    dayArr.push(v['days']);
    temperature.push([parseInt(v['temp_low']),parseInt(v['temp_high'])]);//打印出来有符号 所以 我们就去强制转换成整数
    });

    // console.log(dayArr);return;


    var chart = Highcharts.chart('container', {
    chart: {
    type: 'columnrange', // columnrange 依赖 highcharts-more.js
    inverted: true
    },
    title: {
    text: '一周天气预报'
    },
    subtitle: {
    text: weatherData[0]['citynm']
    },
    xAxis: {
    categories: dayArr
    },
    yAxis: {
    title: {
    text: '温度 ( °C )'
    }
    },
    tooltip: {
    valueSuffix: '°C'
    },
    plotOptions: {
    columnrange: {
    dataLabels: {
    enabled: true,
    formatter: function () {
    return this.y + '°C';
    }
    }
    }
    },
    legend: {
    enabled: false
    },
    series: [{
    name: '温度',
    data: temperature
    }]
    });
    }
    </script>
    <script>

    </script>

@endsection