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

 Route::get('/', function () {
     return view('welcome');
 });


//后台主页
// Route::get('admins', 'admin\indexController@index');

//后台登陆
//Route::get('admins/login','admin\loginController@login');
Route::get('admins/login',function(){
	return view('admins/login');
});

//后台注册
Route::get('admins/register','admin\registerController@register');

//后台404
Route::get('404','admin\error404Controller@index');


//后台视频管理
//Route::get('admins/videoedit','admin\videoeditController@index');


//后台视频上传管理
//Route::get('videoupload','admin\videouploadController@index');

//后台栏目管理
//Route::get('column','admin\columnController@index');

//广告轮播管理
//	Route::get('admins/ads_edit','admin\ads_editController@index');

//用户管理
//Route::resource('admins/users','admin\usersController');



Route::group(['prefix'=>'admins','namespace'=>'admin'],function(){
	// 后台主页
	Route::get('/', 'indexController@index');
	//用户管理
	Route::resource('users','usersController');
	//后台视频管理
	Route::resource('videoedit','videoeditController');
	//后台视频上传管理
	Route::resource('videoupload','videouploadController');
	//后台栏目管理
	Route::resource('column','columnController');
	//广告轮播管理
	Route::resource('ads_edit','ads_editController');

});
