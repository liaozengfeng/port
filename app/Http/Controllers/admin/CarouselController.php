<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SlideshowModel;
use Illuminate\Http\Request;
use App\Models\PermissionModel;

class CarouselController extends Controller
{
    public function save(Request $request){
        if ($request->method()=="POST"){
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
            $data['s_img']="/".$filePath;
            $data['admin_id']=session("all")['admin_id'];
            $res=SlideshowModel::create($data);
            if ($res){
                echo $filePath;
            }else{
                echo "失败";
            }

        }else{
            return view("admin.carousel.save");
        }
    }

    public function show(Request $request){
        $data=SlideshowModel::join("admin","admin.admin_id","=","slideshow.admin_id")->paginate(2);
        return view("admin.carousel.show",['data'=>$data]);
    }
    public function delete(Request $request){
        $id=$request->input("id");
        $res=SlideshowModel::destroy("s_id",$id);
        if ($res){
            echo 1;exit;
        }else{
            echo "fail to delete";
        }
    }
}
