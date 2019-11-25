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
                <td>carousel ID</td>
                <td>carousel img</td>
                <td>admin</td>
                <td>operation</td>
            </tr>
            @foreach($data as $v)
                <tr>
                    <td>{{ $v['s_id'] }}</td>
                    <td><img src="{{ $v['s_img'] }}" width="100"></td>
                    <td>{{ $v['a_name'] }}</td>
                    <td><a href="javascript:;" class="del" s_id="{{ $v['s_id'] }}">delete</a></td>
                </tr>
            @endforeach
        </table>
        {{ $data->links() }}
    </div>
    <script>
        $(function () {
            $(document).on("click",".del",function () {
                var id=$(this).attr("s_id");
                $.ajax({
                    method:"POST",
                    url:"/admin/carousel/delete",
                    data:{id:id},
                    dataType: "json",
                    success:function (res) {
                        if (res==1){
                            location.href="/admin/carousel/show";
                        }else{
                            alert(res);
                        }
                    }
                })
            })
        })
    </script>
@endsection
