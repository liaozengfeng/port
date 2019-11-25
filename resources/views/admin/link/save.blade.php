@extends('layouts.layouts')
@section('title')
    Link
@endsection
@section('content')
    <form class="form-horizontal" role="form">
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="firstname" placeholder="Friend the name of the chain......">
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">Link</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="lastname" placeholder="Friends of the chain......">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Append</button>
            </div>
        </div>
    </form>
    <script>
        $(function () {
            $(document).on("click",".btn",function () {
                var data={};
                data.name=$("#firstname").val();
                data.url=$("#lastname").val();
                $.ajax({
                    method:"POST",
                    url:"/admin/link/save",
                    data:data,
                    dataType: "json",
                    success:function (res) {
                        if (res.code!=1){
                            alert(res.error_message);
                        }else{
                            alert(res.error_message);
                            location.href="/admin/link/save";
                        }
                    }
                })
            })
        })
    </script>
@endsection
