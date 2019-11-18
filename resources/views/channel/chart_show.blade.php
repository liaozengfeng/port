@extends('layouts.layouts')
@section('title', 'Register')
@section('content')
<body>
    <!-- 图表容器 DOM -->
    <div id="container" style="width: 600px;height:400px;"></div>
    <!-- 引入 highcharts.js -->
    <script src="http://cdn.highcharts.com.cn/highcharts/highcharts.js"></script>
    <script>
        // 图表配置
        var options = {
            chart: {
                type: 'bar'                          //指定图表的类型，默认是折线图（line）
            },
            title: {
                text: 'Each channel focuses on quantitative analysis'                 // 标题
            },
            xAxis: {
                categories: [<?php echo $nameStr?>]   // x 轴分类
            },
            yAxis: {
                title: {
                    text: 'Concern Number'                // y 轴标题
                }
            },
            series: [{                              // 数据列
                name: 'Generalize Concern',                        // 数据列名
                data: [<?php echo $numStr?>]                     // 数据
            }]
        };
        // 图表初始化函数
        var chart = Highcharts.chart('container', options);
    </script>
</body>
@endsection