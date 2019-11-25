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
            @foreach($adve_info as $v)
                <tr>
                    <td>{{ $v['a_id'] }}</td>
                    <td><a href="{{ $v['a_src'] }}"><img src="{{ $v['a_img'] }}" width="100"></a></td>
                    <td>{{ $v['a_name'] }}</td>
                    <td><a href="javascript:;" class="del" a_id="{{ $v['a_id'] }}">delete</a></td>
                </tr>
            @endforeach
        </table>
        {{ $adve_info->links() }}
    </div>
    <script>
        $(function () {
            $(document).on("click",".del",function () {
                var id=$(this).attr("a_id");
                $.ajax({
                    method:"POST",
                    url:"/admin/advertising/delete",
                    data:{id:id},
                    dataType: "json",
                    success:function (res) {
                        if (res==1){
                            location.href="/admin/advertising/show";
                        }else{
                            alert(res);
                        }
                    }
                })
            })
        })
    </script>
@endsection
