<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\LinkModel;
use Illuminate\Http\Request;
use App\Models\PermissionModel;
use App\Models\AdminModel;
class LinksController extends Controller
{
    public function save(Request $request){
        if ($request->method()=="POST"){
            $name=$request->input("name");
            $url=$request->input("url");
            if (empty($name)||empty($url)){
                $arr=['code'=>2,"error_message"=>"The data required"];
            }else{
                $num=LinkModel::where("l_name",$name)->count();
                if ($num>0){
                    $arr=["code"=>2,"error_message"=>"data duplication"];
                }else{
                    $data['l_name']=$name;
                    $data['l_url']=$url;
                    $data['admin_id']=session("all")['admin_id'];
                    $res=LinkModel::create($data);
                    if ($res){
                        $arr=["code"=>1,"error_message"=>"successfully added"];
                    }else{
                        $arr=["code"=>2,"error_message"=>"add information failed"];
                    }
                }
            }
        }else{
            return view("admin.link.save");
        }
    }

    public function show(Request $request){
        $data=LinkModel::join("admin","admin.admin_id","=","link.admin_id")->paginate(2);
        $admin_info=AdminModel::all()->toArray();
        return view("admin.link.show",["data"=>$data,"admin_info"=>$admin_info]);
    }
    public function delete(Request $request){
        $id=$request->input("id");
        $res=LinkModel::destroy("l_id",$id);
        if ($res){
            echo 1;exit;
        }else{
            echo "fail to delete";
        }
    }


    public function search(Request $request){
        $query=$request->all();
        $where=[];
        if (!empty($query['title'])){
            $where[]=['link.l_name',"like","%".$query['title']."%"];
        }
        if (!empty($query['c_id'])){
            $where[]=['link.admin_id',"=",$query['admin_id']];
        }
        $info=LinkModel::join("admin","admin.admin_id","=","link.admin_id")->where($where)->paginate(2);
        return view("admin.link.table",['data'=>$info]);
    }
}
