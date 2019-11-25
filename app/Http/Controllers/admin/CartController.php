<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CartModel;
use Illuminate\Http\Request;
use App\Models\AdminModel;
class CartController extends Controller
{
    public function save(Request $request){
        if ($request->method()=="POST"){
            $name=$request->input("name");
            $desc=$request->input('desc');
            if (empty($name)){
                $arr=['code'=>2,"error_message"=>"The name cannot be empty"];
            }else{
                $num=CartModel::where("c_name",$name)->count();
                if ($num>0){
                    $arr=["code"=>2,"error_message"=>"Name not entered"];
                }else{
                    $data['c_name']=$name;
                    $data['c_desc']=$desc;
                    $data['admin_id']=session("all")['admin_id'];
                    $res=CartModel::create($data);
                    if ($res){
                        $arr=["code"=>1,"error_message"=>"successfully added"];
                    }else{
                        $arr=["code"=>2,"error_message"=>"add information failed"];
                    }
                    echo json_encode($arr);
                }
            }
        }else{
            return view("admin.cart.save");
        }
    }

    public function show(Request $request){
        $data=CartModel::join("admin","admin.admin_id","=","news_classify.admin_id")->paginate(2);
        $admin_info=AdminModel::all()->toArray();
        return view("admin.cart.show",['data'=>$data,"admin_info"=>$admin_info]);
    }

    public function delete(Request $request){
        $id=$request->input("id");
        $res=CartModel::destroy("c_id",$id);
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
            $where[]=['news_classify.c_name',"like","%".$query['title']."%"];
        }
        if (!empty($query['c_id'])){
            $where[]=['news_classify.admin_id',"=",$query['admin_id']];
        }
        $info=CartModel::join("admin","admin.admin_id","=","news_classify.admin_id")->where($where)->paginate(2);
        return view("admin.link.table",['data'=>$info]);
    }

    public function edit(Request $request){
        if ($request->method()=="POST"){
            $data=$request->all();
            $res=CartModel::where("c_id",$data['c_id'])->update($data);
            if ($res>=0){
                $arr=["code"=>1,"error_message"=>"successfully update"];
            }else{
                $arr=["code"=>2,"error_message"=>"update information failed"];
            }
            echo json_encode($arr,true);
        }else{
            $id=$request->input("id");
            $cart_info=CartModel::where("c_id",$id)->first()->toArray();
            return view("admin.cart.edit",['cart_info'=>$cart_info]);
        }
    }
}
