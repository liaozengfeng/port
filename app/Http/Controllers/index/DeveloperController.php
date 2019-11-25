<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\CartModel;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function home(Request $request){
        $redis=new \Redis();
        $redis->connect("127.0.0.1");
        if (empty($redis->get($request->getRequestUri()))) {
            ob_start();
            $nav_info=IndexController::nav();
            $link_info=IndexController::link();
            $adv_info=IndexController::adv();
            $cart_info=CartModel::get()->toArray();
            echo view("index.developer.index",["link_info"=>$link_info,"cart_info"=>$cart_info,"adv_info"=>$adv_info,"nav_info"=>$nav_info]);
            $content=ob_get_contents();
            $redis->set($request->getRequestUri(),$content,60*60*2);
        }else{
            echo $redis->get($request->getRequestUri());
        }
    }
}
