@extends('layouts.layouts')
@section('title')
    Permission
@endsection
@section('content')
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Project home page</div>

        <!-- Table -->
        <table class="table">
           <tr>
               <td>level ID</td>
               <td>Level names</td>
           </tr>
            @foreach($data as $v)
                <tr>
                    <td>{{$v['p_id']}}</td>
                    <td>{{$v['p_name']}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
