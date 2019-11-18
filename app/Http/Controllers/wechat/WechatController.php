<?php

namespace App\Http\Controllers\wechat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tools\Wechat;
use App\Models\MediaModel;
use App\Models\ChannelModel;
use App\Models\WechatUserModel;
use App\Tools\Curl;
class WechatController extends Controller
{

        /**
         * 定义一个数组
         * @param  Request $request [description]
         * @return [type]           [description]
         */
        
        public $studentArr = [
            '秦时明月',
            '镜花水月',
        ];

   
    public function index(Request $request){

        // echo 1;die;
        $echostr = $request->input("echostr");
        // echo $echostr;die;
        $info = file_get_contents("php://input");
        file_put_contents("1.txt",$info);
        //处理xml格式数据，将xml格式数据转换成对象
        $xml_obj = simplexml_load_string($info,'SimpleXMLElement',LIBXML_NOCDATA);
        // dd($xml_obj);
        $xml_arr = (array)$xml_obj;
         $FromUserName = $xml_arr["FromUserName"];
        // dd($FromUserName);
        // 获取用户的基本信息
          
          // dd($data);
        if($xml_arr["MsgType"] == "event" && $xml_arr["Event"] == "subscribe"){
            // echo 1;die;
            // 获取数据库
            $channel_status = $xml_arr["EventKey"];
            // dd($channel_status);
            if(!empty($channel_status)){ 
                $channel_status = ltrim($channel_status,'qrscene_');
                // dd($channel_status);
                    //关注添加用户基本信息入库
                
                ChannelModel::where(['channel_status'=>$channel_status])->increment('people');
            }else{
                 $channel_status = 1;
            }
            $data = Wechat::getUserInfo($FromUserName);
            // dd($data);
            $res = WechatUserModel::create([
                    'openid'=>$data["openid"],
                    'nickname'=>$data["nickname"],
                    'sex'=>$data["sex"],
                    'city'=>$data["city"],
                    'channel_status'=>$channel_status
                  ]); 
                  // dd($res);
            $nickname = $data["nickname"];
            $msg = "欢迎".$nickname."回来";
            Wechat::Responsetext($msg,$xml_arr);
        }
        //用户取关：
        if($xml_arr["MsgType"] == "event" && $xml_arr["Event"] == "unsubscribe"){
                $userInfo = WechatUserModel::where(['openid'=>$xml_arr["FromUserName"]])->first();
                $channel_status = $userInfo["channel_status"];
                ChannelModel::where(['channel_status'=>$channel_status])->decrement('people');
        }
       

        //如果用户发送别的名称
        if($xml_arr["MsgType"] == "text"){
                //获取用户发送的内容
            $content = $xml_arr["Content"];
            if($content == "最喜欢的"){
                $msg = implode(",",$this->studentArr);
                Wechat::Responsetext($msg,$xml_arr);
            }elseif($content =="随机一个"){
                $n = array_rand($this->studentArr);
                $msg = $this->studentArr[$n];
                 Wechat::Responsetext($msg,$xml_arr);

            }elseif(mb_stripos($content,"天气")!== false){
                    //调用天气接口
                    //截取到城市
                    //chop相当于Rtrim
                $city=chop($content,"天气");
                // dd($con);
                // 如果用户输入的是天气 没有给出城市  我们则默认给添加一个城市
                if(empty($city)){
                    $city = "沈阳";
                }
                //调用接口   来获取天气信息
                $url = "http://api.k780.com/?app=weather.future&weaid=$city&appkey=46444&sign=21c96326d39422120d37510530a74c30&format=json";
                $weatherData = Curl::Get($url);
                $weatherData = json_decode($weatherData,1);
                // dd($weatherData);
                // 打印出来的是对维数组 然后  我们进行foreach循环取值
                $msg = "";
                foreach ($weatherData['result'] as $key => $value) {
                        // dd($value);
                        $msg .= "{$value['days']} {$value['week']} 城市：{$value['citynm']} 度数：{$value['temperature']} 天气: {$value['weather']} 风向：{$value['wind']} 风量：{$value['winp']} 最高气温: {$value['temp_high']}℃ 最低气温: {$value['temp_low']}℃"."\r\n";
                }
                 Wechat::Responsetext($msg,$xml_arr);


            }
        }elseif($xml_arr["MsgType"]=="image")
        {
             $mediaData = MediaModel::inRandomOrder()->first();
             $media_id = $mediaData['wechat_media_id'];
              Wechat::ResponseImg($media_id,$xml_arr);
        }
       
    }

    
}