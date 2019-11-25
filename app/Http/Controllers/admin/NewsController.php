<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CartModel;
use App\Models\NewsModel;
use Illuminate\Http\Request;
use App\Models\PermissionModel;

class NewsController extends Controller
{
    public function save(Request $request){
        if ($request->method()=="POST"){
            $data=$request->all();
            if (empty($data['n_name'])||empty($data['n_desc'])||empty($data['n_connect'])||empty($data['c_id'])){
                $arr=['code'=>2,"error_message"=>"Data cannot be empty"];
            }else {
                unset($data['top-search']);
                $data['admin_id'] = session("all")['admin_id'];
                $data['add_time'] = time();
                $res = NewsModel::create($data);
                if ($res){
                    $arr=["code"=>1,"error_message"=>"successfully added"];
                }else{
                    $arr=["code"=>2,"error_message"=>"addition failed"];
                }
            }
            echo json_encode($arr);
        }else{
            $cart_info=CartModel::all()->toArray();
            return view("admin.news.save",['cart_info'=>$cart_info]);
        }
    }
    public function save_file(){
        $arrinfo=$_FILES['Filedata'];
        $tmpname=$arrinfo['tmp_name'];
        $realname=$arrinfo['name'];
        $ext=explode(".",$realname)[1];
        $basename=md5(uniqid()).".".$ext;
        $daseDir=date("Y/m/d/",time());
        if (!is_dir($daseDir)){
            mkdir($daseDir,0,777);
        }
        $filePath=$daseDir.$basename;
//        echo $filePath;exit;

        move_uploaded_file($tmpname,$filePath);
        echo $filePath;
    }

    public function show(Request $request){
        $info=NewsModel::join("news_classify","news_classify.c_id","=","news.c_id")->join("admin","admin.admin_id","=","news.admin_id")->paginate(2);
        $cart_info = CartModel::all()->toArray();
        return view("admin.news.show", ['data' => $info, 'cart_info' => $cart_info]);
    }

    public function search(Request $request){
        $query=$request->all();
        $where=[];
        if (!empty($query['title'])){
            $where[]=['news.n_name',"like","%".$query['title']."%"];
        }
        if (!empty($query['c_id'])){
            $where[]=['news.c_id',"=",$query['c_id']];
        }
        $info=NewsModel::join("news_classify","news_classify.c_id","=","news.c_id")->join("admin","admin.admin_id","=","news.admin_id")->where($where)->paginate(2);
        return view("admin.news.table",['data'=>$info]);
    }

    public function delete(Request $request){
        $id=$request->input("id");
        $res=NewsModel::destroy("n_id",$id);
        if ($res){
            echo 1;
        }else{
            echo "fail to delete";
        }
    }

    public function edit(Request $request){
        $id=$request->input("id");
        $news_info=NewsModel::join("news_classify","news.c_id","=","news_classify.c_id")->where("n_id",$id)->first()->toArray();
        $cart_info=CartModel::all()->toArray();
        return view("admin.news.edit",['cart_info'=>$cart_info,"news_info"=>$news_info]);
    }

    public function update(Request $request){
        $data=$request->all();
        if (empty($data['n_name'])||empty($data['n_desc'])||empty($data['n_connect'])||empty($data['c_id'])){
            $arr=['code'=>2,"error_message"=>"Data cannot be empty"];
        }else {
            unset($data['top-search']);
            $data['admin_id'] = session("all")['admin_id'];
            $data['add_time'] = time();
            $res = NewsModel::where("n_id",$data['n_id ,,,,,嘎嘎嘎嘎嘎过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过过'])->update($data);
            if ($res){
                $arr=["code"=>1,"error_message"=>"successfully added"];
            }else{
                $arr=["code"=>2,"error_message"=>"addition failed"];
            }
        }
        echo json_encode($arr);
    }
}
