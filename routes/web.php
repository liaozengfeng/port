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

        //登录
        Route::any('/login/login','login\LoginController@login');
        //注册
        Route::any('/login/register','login\LoginController@register');


Route::group(['middleware'=>['Login']],function(){
        //退出登录
        Route::any('/login/login_out','login\LoginController@login_out');

        //Admin_index
		Route::any('/admin/index','admin\AdminController@index');
		Route::any('/admin/update','admin\AdminController@update');
		//权限
		Route::any('/admin/permission/index','admin\PermissionController@index');
		//导航
		Route::any('/admin/navigation/save','admin\NavigationController@save');  //添加
		Route::any('/admin/navigation/show','admin\NavigationController@show');  //展示
		Route::any('/admin/navigation/delete','admin\NavigationController@delete');  //删除
		Route::any('/admin/navigation/search','admin\NavigationController@search');  //搜索

        //分类
        Route::any('/admin/cart/save','admin\CartController@save');  //添加
        Route::any('/admin/cart/show','admin\CartController@show');  //展示
        Route::any('/admin/cart/delete','admin\CartController@delete');  //删除
        Route::any('/admin/cart/search','admin\CartController@search');  //搜索
        Route::any('/admin/cart/edit','admin\CartController@edit');  //修改展示
        Route::any('/admin/cart/update','admin\CartController@update');  //修改执行

        //轮播
        Route::any('/admin/carousel/save','admin\CarouselController@save');  //添加
        Route::any('/admin/carousel/show','admin\CarouselController@show');  //展示
        Route::any('/admin/carousel/delete','admin\CarouselController@delete');  //删除

        //广告
        Route::any('/admin/advertising/save','admin\AdvertisingController@save');  //添加
        Route::any('/admin/advertising/save_file','admin\AdvertisingController@save_file');  //添加
        Route::any('/admin/advertising/show','admin\AdvertisingController@show');  //展示
        Route::any('/admin/advertising/delete','admin\AdvertisingController@delete');  //删除

        //新闻
        Route::any('/admin/news/save','admin\NewsController@save');  //添加
        Route::any('/admin/news/show','admin\NewsController@show');  //展示
        Route::any('/admin/news/delete','admin\NewsController@delete');  //删除
        Route::any('/admin/news/save_file','admin\NewsController@save_file');  //文件上传
        Route::any('/admin/news/search','admin\NewsController@search');  //搜索
        Route::any('/admin/news/edit','admin\NewsController@edit');  //修改展示
        Route::any('/admin/news/update','admin\NewsController@update');  //修改执行

        //友链
        Route::any('/admin/link/save','admin\LinksController@save');  //添加
        Route::any('/admin/link/show','admin\LinksController@show');  //展示
        Route::any('/admin/link/delete','admin\LinksController@delete');  //删除
        Route::any('/admin/link/search','admin\LinksController@search');  //搜索


});








