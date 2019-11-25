<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\AdvertisingModel;
use App\Models\HistoryModel;
use App\Models\LinkModel;
use App\Models\NavigationModel;
use App\Models\NewsModel;
use Illuminate\Http\Request;
use App\Models\CartModel;

class WeatherController extends Controller
{
    public function list(Request $request){
        $nav_info=IndexController::nav();
        $link_info=IndexController::link();
        $adv_info=IndexController::adv();
        $cart_info=CartModel::get()->toArray();
        return view("index.weather.index",['nav_info'=>$nav_info,"link_info"=>$link_info,"adv_info"=>$adv_info,"cart_info"=>$cart_info]);
    }


    //查询天气
    public function getWeather(Request $request)
    {
        //根据城市去查询该城市的天气
        $city = $request->input('city');
            $url = "http://api.k780.com/?app=weather.future&weaid=$city&appkey=46444&sign=21c96326d39422120d37510530a74c30&format=json";
            $weatherData = $curl = curl_init($url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
        $result = curl_exec($curl);
        curl_close($curl);
        $result=json_decode($result,true);
        return $result;

    }
}
