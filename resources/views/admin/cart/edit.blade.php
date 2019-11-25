@extends('layouts.layouts')
@section('title')
    Cart
@endsection
@section('content')
    <form class="form-horizontal" role="form" action="javascript:;">
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="firstname" value="{{ $cart_info['c_name'] }}">
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">Desc</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="lastname" value="{{ $cart_info['c_desc'] }}">
            </div>
        </div>
        <input type="hidden" value="{{ $cart_info['c_id'] }}" id="c_id">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Update</button>
            </div>
        </div>
    </form>
    <script>
        $(function () {
            $(document).on("click",".btn",function () {
                var data={};
                data.c_name=$("#firstname").val();
                data.c_desc=$("#lastname").val();
                data.c_id=$("#c_id").val();
                $.ajax({
                    method:"POST",
                    url:"/admin/cart/edit",
                    data:data,
                    dataType: "json",
                    success:function (res) {
                        if (res.code!=1){
                            alert(res.error_message);
                        }else{
                            alert(res.error_message);
                            location.href="/admin/cart/show";
                        }
                    }
                })
            })
        })
    </script>
@endsection
