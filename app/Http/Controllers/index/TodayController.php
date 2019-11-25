<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\AdvertisingModel;
use App\Models\LinkModel;
use App\Models\NavigationModel;
use Illuminate\Http\Request;
use App\Models\CartModel;
class TodayController extends Controller
{
    public function list(Request $request)
    {
        $redis=new \Redis();
        $redis->connect("127.0.0.1");
        if (empty($redis->get($request->getRequestUri()))) {
            ob_start();
            if (empty($request->input("seache"))){
                $nav_info = IndexController::nav();
                $link_info = IndexController::link();
                $adv_info = IndexController::adv();
                $cart_info = CartModel::get()->toArray();
                echo view("index.today.index", ['nav_info' => $nav_info, "link_info" => $link_info, "adv_info" => $adv_info, "cart_info" => $cart_info]);
            }else{
                 $seache=$request->input("seache");
                 $url="http://api.avatardata.cn/ActNews/Query?key=844c595663c8488e86b3f600dcfa12e2&keyword=$seache";
                $curl = curl_init($url);
                curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
                curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
                curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
                $result = curl_exec($curl);
                curl_close($curl);
                $result=json_decode($result,true);
                if (!empty($result["result"])) {
                    echo view("index.today.list", ["news_info" => $result['result']]);
                }
            }
            $content=ob_get_contents();
            $redis->set($request->getRequestUri(),$content,60*60*2);
        }else{
            echo $redis->get($request->getRequestUri());
        }

    }
    
}
