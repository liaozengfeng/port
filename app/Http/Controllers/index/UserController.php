<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\AdvertisingModel;
use App\Models\HistoryModel;
use App\Models\LinkModel;
use App\Models\NavigationModel;
use App\Models\NewsModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        $redis=new \Redis();
        $redis->connect("127.0.0.1");
        if (empty($redis->get($request->getRequestUri()))) {
            ob_start();
            $nav_info=IndexController::nav();
            $link_info=IndexController::link();
            $adv_info=IndexController::adv();
            $user_info=session("all");
            $nid_info=HistoryModel::where("admin_id",$user_info['admin_id'])->get(['n_id'])->toArray();
            $news_info=[];
            $n_id=[];
            foreach($nid_info as $k=>$v){
                $n_id[]=$v['n_id'];
            }
            $news_info=NewsModel::whereIn("n_id",$n_id)->paginate(8);
            echo view("index.user.index",["link_info"=>$link_info,"adv_info"=>$adv_info,"nav_info"=>$nav_info,'news_info'=>$news_info,"user_info"=>$user_info]);
            $content=ob_get_contents();
            $redis->set($request->getRequestUri(),$content,60*60*2);
        }else{
            echo $redis->get($request->getRequestUri());
        }
    }
}
