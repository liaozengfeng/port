@extends('layouts.layouts')

@section('title', 'Show')
@section('content')
	<table class="table table-striped table-bordered table-hover">
	  <tr>
	  	<td>Username</td>
	  	<td>UserRight</td>
	  	<td>Operation</td>
	  </tr>
	  @foreach($all as $v)
	  <tr>
	  	<td>{{$v->username}}</td>
	  	<td>{{$v->authority}}</td>
	  	<td>
			<button type="button" class="btn btn-success"><a href="" class="text-decoration:none">Compile</a></button>
	  		||<button type="button" class="btn btn-danger"><a href="Del?id=<?php echo $v->id?>" class="text-decoration:none">Delete</a></button>
	  	</td>
	  	@endforeach
	  </tr>
	</table>
@endsection