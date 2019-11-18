<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;

class LoginController extends Controller
{
    //
    //登录页面
    public function login()
    {
    	return view("login/login");
    }

    //执行登录
    public function do_login(Request $request)
    {
    	$all = $request->all();
        // dd($all);
    	$info = UserModel::where("username",$all["username"])->first();
    	// dd($info);
    	if($all["username"]!=$info["username"])
    	{
    		echo '<script>alert("The username already exists"); location.href="/login/login"</script>';
    	}else{
    		if(md5($all["pwd"])!=$info["pwd"])
    		{
    			echo '<script>alert("Incorrect password,Re-enter Password"); location.href="/login/login"</script>';
    		}else{
                $request->session()->put('all', $all);
    			echo '<script>alert("Login was successful!!!"); location.href="/admin/index"</script>';
    		}
    	}
    }

        //注销登录
         public function logout(Request $request){
            //退出登录
            session(['all'=>null]);
            //跳转到登录页面
            echo '<script>alert("Exit the success!!!"); location.href="/login/login"</script>';
        }

         //取出session中的数值
           public function acquire()
           {
                $value = session('all');
                // dd($value);
                $name = $value["username"];
                dd($name);
               
           }
    
}
