<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// 首页
Route::get('/', function () {
    return view('home/index');
});



//=================前台=================

// 前台列表页
Route::get('/list', 'home\listController@index');

// 前台详情页
Route::get('/play', 'home\playController@index');

//搜索列表页
Route::get('/search','home\searchController@index');

//登录列表
Route::get('/login','home\loginController@index');

//注册列表
Route::get('/register','home\registerController@index');


//视频列表
// Route::resource('/','column\columnController@index');

// 前台
Route::get('/homes', 'home\zhucheController@index');






//==========后台==============


//后台登录页

Route::resource('/ad_login', 'admin\ad_loginController');

//后台验证码
Route::get('/code', 'admin\ad_loginController@code');






//视频
//Route::get('/ad_video', 'admin\ad_videoController@index');
// 轮播
//Route::get('/ad_vertisement', 'admin\ad_vertisementController@index');
//栏目管理
//Route::get('/ad_column', 'admin\ad_columnController@index');
// 友情链接
//Route::get('/ad_ink', 'admin\ad_inkController@index');
// 上传管理
//Route::get('/ad_upload', 'admin\ad_uploadController@index');






Route::group (['prefix'=>'admin','namespace'=>'admin', 'middleware'=>'admins'],function(){

		// 后台首页
		Route::get('/',function(){
			return view('admin/index');
		});	
		//用户管理
    	Route::resource('ad_user','ad_userController');

	});

