@extends('layouts.layouts')
@section('title')
    Link
@endsection
@section('content')
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Project home page</div>


        <div class="row">

            <div class="col-lg-6">
                <div class="input-group">
                    <select class="form-control" id='admin_id'>
                        <option>--请选择--</option>

                        @foreach($admin_info as $v)
                            <option value="{{ $v['admin_id'] }}">{{ $v['a_name'] }}</option>
                        @endforeach
                    </select>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="input-group">
                    <input type="text" class="form-control" id="title" placeholder="Name people search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" id="search" type="button"> Search </button>
                  </span>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->

        <div id="show">
            <!-- Table -->
            <table class="table">
                <tr>
                    <td>link ID</td>
                    <td>link names</td>
                    <td>admin</td>
                    <td>operation</td>
                </tr>
                @foreach($data as $v)
                    <tr>
                        <td>{{ $v['l_id'] }}</td>
                        <td><a href="{{ $v['l_url'] }}">{{ $v['l_name'] }}</a></td>
                        <td>{{ $v['a_name'] }}</td>
                        <td><a href="javascript:;" class="del" l_id="{{ $v['l_id'] }}">delete</a></td>
                    </tr>
                @endforeach
            </table>
            {{ $data->links() }}
        </div>
    </div>
    <script>
        $(function () {
            $(document).on("click",".del",function () {
                var id=$(this).attr("l_id");
                $.ajax({
                    method:"POST",
                    url:"/admin/link/delete",
                    data:{id:id},
                    dataType: "json",
                    success:function (res) {
                        if (res==1){
                            location.href="/admin/link/show";
                        }else{
                            alert(res);
                        }
                    }
                })
            })

            $(document).on("click","#search",function () {
                var data={};
                data.title=$("#title").val();
                data.admin_id=$("#admin_id").val();
                $.ajax({
                    method:"POST",
                    url:"/admin/link/search",
                    data:data,
                    success:function (res) {
                        $("#show").empty();
                        $("#show").html(res);
                    }
                })
            })
        })
    </script>
@endsection
