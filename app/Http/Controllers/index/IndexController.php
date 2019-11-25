<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\AdvertisingModel;
use App\Models\LinkModel;
use App\Models\NavigationModel;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    static public function nav(){
        $nav_info=NavigationModel::join("admin","admin.admin_id","=","navigation.admin_id")->get()->toArray();
        return $nav_info;
    }
    static public function link(){
        $link=LinkModel::join("admin","admin.admin_id","=","link.admin_id")->get()->toArray();
        return $link;
    }
    static public function adv(){
        $adc=AdvertisingModel::orderBy("a_id","desc")->get()->toArray();
        return $adc;
    }
}
