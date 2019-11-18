@extends('layouts.layouts')

@section('title', 'Register')
@section('content')
	<table class="table table-striped table-bordered table-hover table-condensed">
		  <tr>
		  	<td>渠道编号</td>
		  	<td>渠道名称</td>
		  	<td>渠道标识</td>
		  	<td>二维码图片</td>
		  	<td>关注人数</td>
		  	<td>添加时间</td>
		  	<td>操作</td>
		  </tr>
		  @foreach($all as $v)
			<tr>
				<td>{{$v->id}}</td>
				<td>{{$v->channel_name}}</td>
				<td>{{$v->channel_status}}</td>
				<td><img src="https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket={{$v['ticket']}}" alt="" width="75px"></td>
				<td>{{$v->people}}</td>
				<td>{{$v->create_at}}</td>
				<td>
					<a href="">删除</a>
					<a href="">修改</a>
				</td>
			</tr>
		  @endforeach
	</table>
@endsection