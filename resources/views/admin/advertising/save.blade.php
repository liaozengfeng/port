@extends('layouts.layouts')
@section('title')
    Navigation
@endsection
@section('content')
    <script src="/ladmin/js/jquery.uploadify.js"></script>
    <link rel="stylesheet" href="/ladmin/css/uploadify.css">
    <form action="javascript:;">
        <div class="form-group">
            <label for="exampleInputEmail1">News</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name='a_name' placeholder="title...">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">News</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name='a_src' placeholder="src...">
        </div>
        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" id="uploadify">
            <p class="help-block">Carousel photo.</p>
        </div>
        <input type="hidden" class="file" name="a_img">
        <button type="button" class="btn btn-default">Save</button>
    </form>
    <script>
        $(function () {
            $(document).on("click",".btn",function () {
                var data=$("form").serialize();
                $.ajax({
                    method:"POST",
                    url:"/admin/advertising/save",
                    data:data,
                    dataType: "json",
                    success:function (res) {
                        if (res.code!=1){
                            alert(res.error_message);
                        }else{
                            alert(res.error_message);
                            location.href="/admin/advertising/save";
                        }
                    }
                })
            })
            $("#uploadify").uploadify({
                "swf":'/ladmin/swf/uploadify.swf',   //固定 引入swf文件
                'uploader':'/admin/advertising/save_file',     //后台地址
                "onUploadSuccess":function (file,data,msg) {
                    $(".file").val("/"+data);
                }
            });

        })
    </script>
@endsection
