<?php

namespace App\Http\Controllers\confession;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfessionController extends Controller
{
    //
    public function Menu(){
    	$url = " https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".Wechat::access_token();
    	
    }
}
