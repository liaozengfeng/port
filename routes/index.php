<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//首页
Route::any('/index/index','index\HomeController@index');
//详情页
Route::any('/index/news/info','index\NewsController@info');
//分类 新闻
Route::any('/index/cart/list','index\CartController@list');
//今日新闻
Route::any('/index/news/list','index\TodayController@list');
//天气
Route::any('/index/weather/list','index\WeatherController@list');
Route::any('/index/weather/getWeather','index\WeatherController@getWeather');

//团队介绍
Route::any('/index/home','index\DeveloperController@home');

Route::group(['middleware'=>['Login']],function(){
    Route::any('/index/user/index','index\UserController@index');

});
