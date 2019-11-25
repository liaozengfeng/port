<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use App\Models\AdminModel;
use App\Models\JurisdictionModel;
use App\Models\PermissionModel;
use App\Models\RelationModel;
use Illuminate\Http\Request;
use \Db;
class LoginController extends Controller
{
    //
    //登录页面
    public function login(Request $request)
    {
        if($request->method()=="POST"){
            $redis=new \Redis();
            $redis->connect("127.0.0.1");
            $pwd=base64_encode($request->input("pwd"));
            $name=$request->input("name");
            $num=AdminModel::where(['a_name'=>$name,"a_pwd"=>$pwd])->count();
            $nums=empty($redis->get($name))?0:$redis->get($name);
            if ($nums<=3){
                if ($num!=1){
                    $redis->set($name,$nums+1,60*60*2);
                    echo json_encode(["code"=>40017,"res"=>"Logon failed","error_message"=>"Wrong account or password"]);
                }else{
                    $info=AdminModel::join("relation","admin.admin_id","=","relation.admin_id")->where(['a_name'=>$name,"a_pwd"=>$pwd])->first()->toArray();
                    $request->session()->put('all', $info);
                    echo json_encode(["code"=>40001,"res"=>"login successfully "]);
                }
            }else{
                echo json_encode(['code'=>40017,'res'=>"Logon failed","error_message"=>"Too many errors"]);
            }
        }else {
            return view("login/login");
        }
    }

    //注销登录
     public function login_out(Request $request){
        //退出登录
        session(['all'=>null]);
        //跳转到登录页面
        echo '<script>alert("Exit the success!!!"); location.href="/login/login"</script>';
    }


   public function register(Request $request){
        if ($request->method()=="POST"){
            $pwd=$request->input("pwd");
            $pwd_do=$request->input("pwd_do");
            $name=$request->input("name");
            $email=$request->input("email");
            $desc=$request->input("desc");
            if ($pwd!=$pwd_do){
                echo json_encode(["code"=>40017,"res"=>"registration failed","error_message"=>"Inconsistent password"]);exit;
            }else{
                $num=AdminModel::where("a_name",$name)->count();
                if ($num>0){
                    echo json_encode(["code"=>40017,"res"=>"registration failed","error_message"=>"User already exists"]);
                }else{
                    $data['a_name']=$name;
                    $data['a_desc']=$desc;
                    $data['a_email']=$email;
                    $data['a_pwd']=base64_encode($pwd);
                    $res=\DB::table("admin")->insertGetId($data);
                    $p_id=PermissionModel::orderBy("p_id","desc")->first(['p_id'])->toArray();
                    $resl=RelationModel::create(['admin_id'=>$res,"p_id"=>$p_id['p_id']]);
                    if (empty($resl)){
                        echo json_encode(["code"=>40017,"res"=>"registration failed","error_message"=>"Wrong account or password"]);
                    }else{
                        $data['admin_id']=$res;
                        $request->session()->put('all', $data);
                        echo json_encode(["code"=>40001,"res"=>"registration successfully"]);
                    }
                }
            }
        }else{
            return view("login.register");
        }
   }


}
