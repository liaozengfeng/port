<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PermissionModel;

class PermissionController extends Controller
{
    public function index()
    {
        $info=PermissionModel::all()->toArray();
        return view("admin/permission/index",['data'=>$info]);
    }

}
