<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - Login</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="{{asset('ladmin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href=" {{asset('ladmin/css/font-awesome.css')}}" rel="stylesheet">

    <link href=" {{asset('ladmin/css/animate.css')}}" rel="stylesheet">
    <link href=" {{asset('ladmin/css/style.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">L</h1>

            </div>
            <h3>login / <a href="/login/register">Register</a></h3>

            <form class="m-t" role="form" action="javascript:;">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="username" required="" id="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="password" required="" id="pwd">
                </div>
                <div class="form-group" id="error" style="display: none;">

                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            </form>
        </div>
    </div>
    <!-- 全局js -->
    <script src=" {{asset('ladmin/js/jquery.min.js')}}"></script>
    <script src=" {{asset('ladmin/js/bootstrap.min.js')}}"></script>

    
    

</body>

</html>
<script>
    $(function () {
        $(document).on("click",".btn",function () {
            var data={};
            data.name=$("#username").val();
            data.pwd=$("#pwd").val();
            $.ajax({
                method:"POST",
                url:"/login/login",
                data:data,
                dataType: "json",
                success:function (res) {
                    if(res.code==40017){
                        alert(res.res);
                        $("#error").css("display","block");
                        $("#error").text(res.error_message);
                    }else{
                        alert(res.res);
                        location.href='/admin/permission/index';
                    }
                }
            })
        })
    })
</script>