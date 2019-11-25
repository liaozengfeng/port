<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminModel;
use App\Models\AdvertisingModel;
use Illuminate\Http\Request;

class AdvertisingController extends Controller
{
    public function save(Request $request){
        if($request->method()=="POST"){
            $data=$request->all();
            if (empty($data['a_name']||empty($data['a_src']))){
                $arr=['code'=>2,"error_message"=>"Data cannot be empty"];
            }else{
                unset($data['top-search']);
                $data['admin_id']=session("all")['admin_id'];
                $res=AdvertisingModel::create($data);
                if ($res){
                    $arr=["code"=>1,"error_message"=>"successfully added"];
                }else{
                    $arr=["code"=>2,"error_message"=>"addition failed"];
                }
                echo json_encode($arr,true);
            }
        }else{
            return view("admin.advertising.save");
        }
    }

    public function save_file(Request $request){
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
        move_uploaded_file($tmpname,$filePath);
        echo $filePath;
    }

    public function show(){
        $adve_info=AdvertisingModel::join("admin","admin.admin_id","=","advertising.admin_id")->paginate(2);
        return view("admin.advertising.show",['adve_info'=>$adve_info]);
    }


    public function delete(Request $request){
        $id=$request->input("id");
        $res=AdvertisingModel::destroy("a_id",$id);
        if ($res){
            echo 1;exit;
        }else{
            echo "fail to delete";
        }
    }
}
