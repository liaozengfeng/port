@extends('layouts.layouts')

@section('title', 'Register')
@section('content')
		<h4>一周天气展示</h4>
		城市：<input type="text" name="city">
		<input type="button" value="搜索" id="search">(输入内容可以是拼音或者是汉字)
		 <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
		<script src="https://code.highcharts.com.cn/highcharts/highcharts.js"></script>
        <script src="https://code.highcharts.com.cn/highcharts/highcharts-more.js"></script>
        <script src="https://code.highcharts.com.cn/highcharts/modules/exporting.js"></script>
        <script src="https://img.hcharts.cn/highcharts-plugins/highcharts-zh_CN.js"></script>
		<script type="text/javascript">
			//默认城市
				$.ajax({
					url:"{{url('admin/getWeather')}}",//请求的地址
					type:"GET",//请求的方式
					data:{city:"沈阳"},//参数
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
				var city = $("[name='city']").val();
				// alert(city);
				if(city==""){
					alert("请输入正确格式");return;
				}
				//向后台发送AJAX请求
				$.ajax({
					url:"{{url('admin/getWeather')}}",//请求的地址
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
@endsection