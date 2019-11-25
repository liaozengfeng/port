<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminModel;
use App\Models\PermissionModel;
use App\Models\RelationModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $info=AdminModel::join("relation","admin.admin_id","=","relation.admin_id")->join("permission","relation.p_id","=","permission.p_id")->paginate(2);
        $pemission=PermissionModel::all()->toArray();
    	return view("admin/user/index",['data'=>$info,"pemission"=>$pemission]);
    }

    public function update(Request $request){
        $data['p_id']=$request->input("p_id");
        $data['admin_id']=$request->input("admin_id");
        $res=RelationModel::where("admin_id",$data['admin_id'])->update($data);
        if ($res){
            echo "1";
        }else{
            echo "be defeated";
        }
    }
}
