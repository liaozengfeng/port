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
               <td>User ID</td>
               <td>User name</td>
               <td>User email</td>
               <td>User desc</td>
               <td>User level</td>

           </tr>
            @foreach($data as $v)
                <tr a_id="{{ $v['admin_id'] }}">
                    <td>{{$v['admin_id']}}</td>
                    <td>{{$v['a_name']}}</td>
                    <td>{{$v['a_email']}}</td>
                    <td>{{$v['a_desc']}}</td>
                    <td>
                        <select class="p_id">
                            @foreach($pemission as $va)
                                @if($va['p_id']==$v['p_id'])
                                    <option value="{{ $va['p_id'] }}" selected>{{$va['p_name']}}</option>
                                @else
                                    <option value="{{ $va['p_id'] }}">{{$va['p_name']}}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $data->links() }}
    </div>
    <script>
        $(function () {
            $(document).on("change",".p_id",function () {
                var data={};
                data.p_id=$(this).val();
                data.admin_id=$(this).parents("tr").attr("a_id");
                $.ajax({
                    method:"POST",
                    url:"/admin/update",
                    data:data,
                    dataType: "json",
                    success:function (res) {

                    }
                })
            })
        })
    </script>
@endsection
