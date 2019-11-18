@extends('layouts.layouts')

@section('title', 'Register')
@section('content')
	<form action="do_upload" method="post" enctype="multipart/form-data">
		@csrf
		  <div class="form-group">
		    <label for="exampleInputEmail1">素材名称</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="素材名称" name="media_name">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">素材格式</label>
		    <select class="form-control" name="media_format">
		    	  <option>请选择...</option>
				  <option value="image">图片</option>
				  <option value="video">视频</option>
				  <option value="voice">语音</option>
			</select>
		  </div>

		  <div class="form-group">
		    <label for="exampleInputPassword1">素材类型</label>
		    <select class="form-control" name="media_type">
		    	  <option>请选择...</option>
				  <option value="0">临时</option>
				  <option value="1">永久</option>
			</select>
		  </div>

		  <div class="form-group">
		    <label for="exampleInputFile">素材上传</label>
		    <input type="file" name="file" id="exampleInputFile">
		  </div>
		  <button type="submit" class="btn btn-default">提交</button>
</form>
@endsection