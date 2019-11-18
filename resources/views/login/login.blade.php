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
            <h3>Your most like Mr.Liu</h3>

            <form class="m-t" role="form" action="do_login" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="username" required="" name="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="password" required="" name="pwd">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>


                <p class="text-muted text-center"> <a href="login.html#"><small>Forget the password？</small></a>
                </p>

            </form>
        </div>
    </div>

    <!-- 全局js -->
    <script src=" {{asset('ladmin/js/jquery.min.js')}}"></script>
    <script src=" {{asset('ladmin/js/bootstrap.min.js')}}"></script>

    
    

</body>

</html>
