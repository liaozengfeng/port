<?php
namespace App\Tools;
use Illuminate\Support\Facades\Cache;
class Wechat{
	/**
	 * 回复文本消息
	 */
	public static function Responsetext($msg,$xml_arr){


	 		 echo "<xml><ToUserName><![CDATA[".$xml_arr['FromUserName']."]]></ToUserName>
                        <FromUserName><![CDATA[".$xml_arr['ToUserName']."]]></FromUserName>
                        <CreateTime>".time()."</CreateTime>
                        <MsgType><![CDATA[text]]></MsgType>
                        <Content><![CDATA[".$msg."]]></Content>
                    </xml>";die;
                }

    /**
     * access_token
     */
    public static function access_token(){

    	// $access_token = Cache::get("access_token");
    	// if(empty($access_token)){
    		//缓存里面没有东西，写入缓存
         	 $re = file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.env('WECHAT_APPID').'&secret='.env('WECHAT_SECRET'));
            $result = json_decode($re,true);
            $access_token = $result["access_token"];
            //储存两个小时
            Cache::put("access_token",$access_token,7200);
    	// }
    	// dd($access_token);
         return $access_token;
    }

    /**
     * 获取用户的基本信息
     */
   public static function getUserInfo($FromUserName)
   {
        $access_token = Self::access_token();
        $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".Wechat::access_token()."&openid=".$FromUserName."&lang=zh_CN";
        $data = file_get_contents($url);
        $data =json_decode($data,1);
        // dd($data);
        return $data;
   }

   /**
    * 回复图片信息
    */
   public static function ResponseImg($media_id,$xml_arr)
   {
        echo "<xml>
                      <ToUserName><![CDATA[".$xml_arr['FromUserName']."]]></ToUserName>
                      <FromUserName><![CDATA[".$xml_arr['ToUserName']."]]></FromUserName>
                      <CreateTime>".time()."</CreateTime>
                      <MsgType><![CDATA[image]]></MsgType> 
                      <Image>
                        <MediaId><![CDATA[".$media_id."]]></MediaId>
                      </Image>
                </xml>";die;
   }

   /**
    * 天气
    */
   
   public static function getWeather($city)
    {
         $url = "http://api.k780.com/?app=weather.future&weaid={$con}&appkey=46444&sign=21c96326d39422120d37510530a74c30&format=json";
            //请求方式  git
        $data = file_get_contents($url);
        //解码  转为数组
        // dd($data);exit;
                $data =json_decode($data,1);
                // dd($data);
                $msg = "";
                foreach ($data['result'] as $key => $value) {
                    // dd($value);exit;
                    $msg .= "今天是：{$value['days']} {$value['week']} 城市：{$value['citynm']} 度数：{$value['temperature']} 天气: {$value['weather']} 风向：{$value['wind']} 风量：{$value['winp']} 最高气温: {$value['temp_high']}℃ 最低气温: {$value['temp_low']}℃";
        }
            return $msg;
    }


    /**
     * 图片
     */
}