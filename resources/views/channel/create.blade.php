@extends('layouts.layouts')

@section('title', 'Register')
@section('content')
	<form action="do_create" method="post">
		@csrf
		  <div class="form-group">
		    <label for="exampleInputEmail1">渠道名称</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="渠道名称" name="channel_name">
		  </div>

		  <div class="form-group">
		    <label for="exampleInputEmail1">渠道标识</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="渠道标识" name="channel_status">
		  </div>
		  <button type="submit" class="btn btn-default">提交</button>
</form>
@endsection