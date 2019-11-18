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

Route::get('/', function () {
    return view('welcome');
});
// ---------------------------------------------------------------------wechat--------------------------------------
Route::any('/wechat/index','wechat\WechatController@index');
Route::any('/wechat/test','wechat\WechatController@test');

Route::any('/week/index','wechat\WeekController@index');
Route::any('/test/qrcode','wechat\TestController@qrcode');
Route::any('/test/menu','wechat\TestController@menu');


Route::any('/week/test','wechat\WeekController@test');





//--------------------------------------------------------------------Backstage project Management（后台项目管理）

//--------------------------------------------------------------------Login
Route::any('/login/login','login\LoginController@login');
//--执行
Route::any('/login/do_login','login\LoginController@do_login');
Route::any('/login/acquire','login\LoginController@acquire');
//Route::group(['middleware'=>['Login']],function(){
     //Admin_index
		Route::any('/admin/index','admin\AdminController@index');
		Route::any('/admin/index_v1','admin\AdminController@index_v1');

		//logout
		Route::any('/login/logout','login\LoginController@logout');
		
		//Register
		Route::any('/admin/register','admin\AdminController@register');
			//执行
		Route::any('/admin/do_register','admin\AdminController@do_register');
		//show
		Route::any('/admin/show','admin\AdminController@show');
			//Delete
		Route::any('/admin/Del','admin\AdminController@Del');

		//------------------------------AdminHome
		Route::any('/admin/home','admin\AdminController@home');
		//------------------------------执行天气接口
		Route::any('/admin/getWeather','admin\AdminController@getWeather');
		
		// ----------------------------------------文件上传
		Route::any('/media/upload','media\MediaController@upload');
		Route::any('/media/do_upload','media\MediaController@do_upload');
		//------------------------------------------素材展示
		Route::any('/media/upload_show','media\MediaController@upload_show');
		//------------------------------------------渠道添加
		Route::any('/channel/create','channel\ChannelController@create');
		Route::any('/channel/do_create','channel\ChannelController@do_create');
		//------------------------------------------渠道展示
		Route::any('/channel/create_show','channel\ChannelController@create_show');
		//------------------------------------------图表展示
		Route::any('/channel/chart_show','channel\ChannelController@chart_show');


		

		

//});








