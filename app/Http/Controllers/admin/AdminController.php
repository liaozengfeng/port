<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\UserModel;
use App\Tools\Wechat;
use App\Tools\Curl;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{
    //
    public function index()
    {
    	return view("admin/index");
    }

    public function index_v1()
    {
        return view("admin/index_v1");
    }
    

            //register
    public function register()
    {
        return view("admin/register");
    }

    //执行
    public function do_register(Request $request)
    {
        $all = $request->all();
        // dd($all);
        $all["pwd"] = md5($all["pwd"]);
        $all["confirmpwd"] = md5($all["confirmpwd"]);
        $info = UserModel::where("username",$all["username"])->first();
        // dd($info);
        if($all["username"]==$info["username"])
        {
            echo '<script>alert("This user name already exists"); location.href="/admin/register"</script>';
        }else
        {   
            if($all["confirmpwd"]!=$all["pwd"]) 
            {
            
                echo '<script>alert("The two passwords did not match"); location.href="/admin/register"</script>';
            }else
            {
                $data = UserModel::create($all);
                // dd($data);
                if($data)
                {
                    echo '<script>alert("successfully added "); location.href="/admin/show"</script>';
                }else
                {
                    echo '<script>alert("The network is busy,Please try again later"); location.href="/admin/register"</script>';
                }
            }
        }
    } 

    //管理员展示 
    public function show(Request $request)
    {
        $all = UserModel::all();
        $data = [
            '0'=>"Super Admin",
            "1"=>"Admin"
        ];
        $arr = [];
        foreach($all as $v)
        {
            $v["authority"] = $data[$v["authority"]];
            // dd($v);
            $arr[] = $v;
        }
        // dd($all);
        return view("admin/show",["all"=>$arr]);
        
    }

    //管理员删除
    public function Del(Request $requset)
    {   
        $id = $_GET["id"];
        // dd($id);
        // 判断登录的值，如果登录的账号状态为超级管理员，则可以进行删除和修改，如果不是 则给出"您还没有权限"的提示。
        $value = session('all');
        $res = UserModel::where('username',$value['username'])->first();
        // dd($res);
        if($res["authority"]==0){
            //删除条件
            $res = UserModel::where("id",$id)->delete();
            echo '<script>alert("Successfully Delete"); location.href="/admin/show"</script>';
        }else{
            echo '<script>alert("Permission Denied"); location.href="/admin/show"</script>';
        }
        
        
    }


    //主页展示
    public function Home()
    {
        return view("admin/home");
    }

    //查询天气
    public function getWeather(Request $request)
    {
        //根据城市去查询该城市的天气
        $city = $request->input('city');
        //使用框架自带的缓存
        $weatherData = Cache::get('weatherData_'.$city);//拼接上城市，比如北京天气
        if(empty($weatherData)){
            $url = "http://api.k780.com/?app=weather.future&weaid=$city&appkey=46444&sign=21c96326d39422120d37510530a74c30&format=json";
        $weatherData = Curl::Get($url);
        $weatherData = json_decode($weatherData,1);
        // dd($weatherData);
        Cache::put("weatherData",$weatherData);
        }
        
       return $weatherData;
        
    }


}
