<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminModel;
use App\Models\NavigationModel;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function save(Request $request){
        if ($request->method()=="POST"){
            $data=$request->all();
            if (empty($data['n_name'])){
                $arr=['code'=>2,"error_message"=>"The name cannot be empty"];
            }else if(empty($data["n_url"])){
                $arr=['code'=>2,"error_message"=>"Route not filled in"];
            }else{
                $num=NavigationModel::where("n_name",$data['n_name'])->count();
                if ($num<=0){
                    $data['admin_id']=session("all")['admin_id'];
                    $res=NavigationModel::create($data);
                    if ($res){
                        $arr=["code"=>1,"error_message"=>"successfully added"];
                    }else{
                        $arr=["code"=>2,"error_message"=>"addition failed"];
                    }
                }else{
                    $arr=["code"=>2,"error_message"=>"Grouping already exists"];
                }
            }
            echo json_encode($arr);
        }else{
            return view("admin.navigation.save");
        }
    }

    public function show(Request $request){
        $info=NavigationModel::join("admin","admin.admin_id","=","navigation.admin_id")->paginate(2);
        $data=AdminModel::all()->toArray();
        return view("admin.navigation.show",["data"=>$info,"admin_info"=>$data]);
    }
    public function delete(Request $request){
        $id=$request->input("id");
        $res=NavigationModel::destroy("n_id",$id);
        if ($res){
            echo 1;
        }else{
            echo "fail to delete";
        }
    }


    public function search(Request $request){
        $query=$request->all();
        $where=[];
        if (!empty($query['title'])){
            $where[]=['navigation.n_name',"like","%".$query['title']."%"];
        }
        if (!empty($query['c_id'])){
            $where[]=['navigation.admin_id',"=",$query['admin_id']];
        }
        $info=NavigationModel::join("admin","admin.admin_id","=","navigation.admin_id")->where($where)->paginate(2);
        return view("admin.navigation.table",['data'=>$info]);
    }
}
