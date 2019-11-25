@extends('layouts.layouts')
@section('title')
    Navigation
@endsection
@section('content')
    <form class="form-horizontal" role="form" action="javascript:;">
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="The name of the navigation......">
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">Link</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="link" placeholder="navigation link......">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" id="sub" class="btn btn-default">Append</button>
            </div>
        </div>
    </form>
    <script>
        $(function () {
            $(document).on("click","#sub",function () {
                var data={};
                data.n_name=$("#name").val();
                data.n_url=$("#link").val();
                $.ajax({
                    method:"POST",
                    url:"/admin/navigation/save",
                    data:data,
                    dataType: "json",
                    success:function (res) {
                        if (res.code!=1){
                            alert(res.error_message);
                        }else{
                            alert(res.error_message);
                            location.href="/admin/navigation/save";
                        }
                    }
                })
            })
        })
    </script>
@endsection
