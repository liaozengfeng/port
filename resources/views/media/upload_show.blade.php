@extends('layouts.layouts')

@section('title', 'Register')
@section('content')
  <table class="table table-striped table-bordered table-hover table-condensed">
        <tr>
          <td>编号</td>
          <td>素材名称</td>
          <td>素材格式</td>
          <td>素材展示</td>
          <td>微信服务器ID</td>
          <td>添加时间</td>
          <td>过期时间</td>
        </tr>
        @foreach ($all as $k => $v)
          <tr>
            <td>{{$v->media_id}}</td>
            <td>{{$v->media_name}}</td>
            <td>{{$v->media_format}}</td>
            <td>
              @if($v['media_format'] == "image")
                        <img src="{{env('UPLOAD_URL')}}/{{$v['media_url']}}" alt="" width="100px">
                    @elseif($v['media_format'] == "voice")
                        <audio src="{{env('UPLOAD_URL')}}/{{$v['media_url']}}" controls="controls"></audio>
                    @elseif($v['media_format'] == "video")
                        <video src="{{env('UPLOAD_URL')}}/{{$v['media_url']}}" controls="controls"  width="100px" ></video>
              @endif
            </td>
            <td>{{$v->wechat_media_id}}</td>
            <td>{{$v->created_at}}</td>
            <td>{{date("Y-m-d H:i:s",$v->stale_at)}}</td>
          </tr>
        @endforeach
</table>
 {{ $all->links() }}

@endsection