@extends('layouts.layouts')
@section('title')
    Navigation
@endsection
@section('content')
    <script src="/ladmin/js/jquery.uploadify.js"></script>
    <link rel="stylesheet" href="/ladmin/css/uploadify.css">
    <form action="javascript:;">
        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" id="uploadify">
            <p class="help-block">Carousel photo.</p>
        </div>
        <input type="hidden" class="file" name="n_img">
        <button type="button" class="btn btn-default">Save</button>
    </form>
    <script>
        $(function () {
            $(document).on("click",".btn",function () {
                location.href='/admin/carousel/save';
            })
            $("#uploadify").uploadify({
                "swf":'/ladmin/swf/uploadify.swf',   //固定 引入swf文件
                'uploader':'/admin/carousel/save',     //后台地址
                "onUploadSuccess":function (file,data,msg) {
                    $(".file").val("/"+data);
                }
            });

        })
    </script>
@endsection
