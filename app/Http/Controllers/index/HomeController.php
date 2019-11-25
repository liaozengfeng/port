<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\CartModel;
use App\Models\NewsModel;
use App\Models\SlideshowModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $redis=new \Redis();
        $redis->connect("127.0.0.1");
        if (empty($redis->get($request->getRequestUri()))) {
            ob_start();
            $nav_info = IndexController::nav();
            $link_info = IndexController::link();
            $adv_info = IndexController::adv();
            $sli_info = SlideshowModel::all()->toArray();
            $cart_info = CartModel::get()->toArray();
            $news_info = [];
            foreach ($cart_info as $k => $v) {
                $news_info[$v['c_name']]['c_id'] = $v['c_id'];
                if ($v['c_name'] == "网易新歌") {
                    $news_info[$v['c_name']]['son'] = NewsModel::join("admin", "admin.admin_id", "=", "news.admin_id")->orderBy("add_time", "desc")->where("c_id", $v['c_id'])->paginate(2);
                } else if ($v['c_name'] == "娱乐新闻") {
                    $news_info[$v['c_name']]['son'] = NewsModel::join("admin", "admin.admin_id", "=", "news.admin_id")->where("c_id", $v['c_id'])->paginate(3);
                } else {
                    $news_info[$v['c_name']]['son'] = NewsModel::join("admin", "admin.admin_id", "=", "news.admin_id")->where("c_id", $v['c_id'])->paginate(10);
                }
            }
            $news_info['最新新闻']['son'] = NewsModel::orderBy("add_time", "desc")->paginate(10);
            $index_index=['nav_info' => $nav_info, "link_info" => $link_info, "adv_info" => $adv_info, "sli_info" => $sli_info, "news_info" => $news_info];
            echo view("index.index.index",$index_index);
            $content=ob_get_contents();
            $redis->set($request->getRequestUri(),$content,60*60*2);
        }else{
            echo $redis->get($request->getRequestUri());
        }
    }
}

