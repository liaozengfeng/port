<?php

namespace App\Http\Controllers\wechat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tools\Wechat;
use App\Tools\Curl;


class TestController extends Controller
{
    //
    public function qrcode()
    {
        $access_token = Wechat::access_token();
        $url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=$access_token";
        $data = '{"expire_seconds": 604800, "action_name": "QR_SCENE", "action_info": {"scene": {"scene_id": ditie}}}';
        $res = Curl::Post($url,$data);
        $res = json_decode($res,1);
        dd($res);
    }


    public function menu()
    {
        $access_token = Wechat::access_token();
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=$access_token";
        $data = [
             "button"=>[
             [  
                  "type"=>"click",
                  "name"=>"今日歌曲",
                  "key"=>"V1001_TODAY_MUSIC"
              ],
              [
                   "name"=>"菜单",
                   "sub_button"=>[
                   [    
                       "type"=>"view",
                       "name"=>"来听歌吧",
                       "url"=>"https://music.163.com/"
                    ],
                    [
                       "type"=>"click",
                       "name"=>"赞一下我们",
                       "key"=>"V1001_GOOD"
                    ]]
               ]]
         ];
         $res = json_encode($data,JSON_UNESCAPED_UNICODE);
        $res = Curl::Post($url,$res);
        dd($res);
    }
}
