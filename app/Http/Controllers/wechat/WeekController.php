<?php

namespace App\Http\Controllers\wechat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tools\Wechat;
use App\Models\SuggestModel;

class WeekController extends Controller
{
    //
    public function index(Request $request)
    {
    	$echostr = $request->input("echostr");
    	$info = file_get_contents("php://input");
        file_put_contents("1.txt",$info);
        //处理xml格式数据，将xml格式数据转换成对象
        $xml_obj = simplexml_load_string($info,'SimpleXMLElement',LIBXML_NOCDATA);
        // dd($xml_obj);
        $xml_arr = (array)$xml_obj;
        $FromUserName = $xml_arr["FromUserName"];
        $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".Wechat::access_token()."&openid=".$FromUserName."&lang=zh_CN";
        $data = file_get_contents($url);
        $data =json_decode($data,1);
        // var_dump($data);die;
        	//关注自动回复
        	 if($xml_arr["MsgType"] == "event" && $xml_arr["Event"] == "subscribe"){
            // echo 1;die;
            $nickname = $data["nickname"];
            // dd($nickname);
            $sex = $data["sex"];
            // dd($sex);
            if($sex==1)
            {
            	$sex = "帅哥";
            }else{
            	$sex = "美女";
            }
            $msg = "欢迎".$nickname."".$sex."回来";
            Wechat::Responsetext($msg,$xml_arr);
        }



        if($xml_arr["MsgType"] == "text")
        {
        	$content = $xml_arr["Content"];
        	if($content=="1")
        	{
        		$msg = "你好";
        		Wechat::Responsetext($msg,$xml_arr);
        	}elseif(mb_stripos($content,"建议+")!== false)
        	{
        		$con=ltrim($content,"建议+");
    			// dd($con);
        		if(empty($con)){
                    $con = "请继续努力";
                }
                	
                	SuggestModel::create(['suggest'=>$con]);
                 Wechat::Responsetext("感谢您的建议",$xml_arr);
        	}

        }
    }

    public function test()
    {
    	$cons = "建议+优化服务器";
    	$con=ltrim($cons,"建议+");
    	dd($con);
    }
}
