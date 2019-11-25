<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\CartModel;
use App\Models\HistoryModel;
use App\Models\NewsModel;
use App\Models\SlideshowModel;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function info(Request $request){
        $redis=new \Redis();
        $redis->connect("127.0.0.1");
        if (empty($redis->get($request->getRequestUri()))) {
            ob_start();
            $nav_info=IndexController::nav();
            $link_info=IndexController::link();
            $adv_info=IndexController::adv();
            $sli_info=SlideshowModel::all()->toArray();
            $cart_info=CartModel::get()->toArray();
            $n_id=$request->input("id");
            $news_info=NewsModel::join("news_classify","news.c_id","=","news_classify.c_id")->join("admin","admin.admin_id","=","news.admin_id")->where("n_id",$n_id)->first()->toArray();
            $page_view=$news_info['page_view']+1;
            NewsModel::where("n_id",$n_id)->update(['page_view'=>$page_view]);
            if(!empty(session("all"))){
                $data['n_id']=$n_id;
                $data['admin_id']=session("all")['admin_id'];
                $data['h_addtime']=time();
                $res=HistoryModel::create($data);
            }
            echo view("index.news.info",['nav_info'=>$nav_info,"link_info"=>$link_info,"adv_info"=>$adv_info,"sli_info"=>$sli_info,"cart_info"=>$cart_info,"news_info"=>$news_info]);
            $content=ob_get_contents();
            $redis->set($request->getRequestUri(),$content,60*60*2);
        }else{
            echo $redis->get($request->getRequestUri());
        }
    }
}
