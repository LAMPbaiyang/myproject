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


//引导页
 // Route::get('/', function () {
     // return view('welcome');
 // });
 
 
 //======================前台路由=========================================================================
 
 // 首页
Route::get('/', function () {
    return view('homes/index');
});


// 前台视频列表页
Route::get('/list', 'home\listController@index');

// 前台视频播放页(详情页)
Route::get('/play', 'home\playController@index');

//搜索列表页
Route::get('/search','home\searchController@index');

// 前台注册页
Route::get('/register', 'home\registerController@index');


 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

// 前台登录页
Route::resource('homes/login', 'home\loginController');

//前台登录验证码
Route::get('homes/codes','home\loginController@codes');

// 前台个人中心页
Route::group(['prefix'=>'homes','namespace'=>'home\center','middleware'=>'homes'],function(){

//用户个人中心
Route::resource('center', 'centerController');

Route::resource('uface', 'centerController@uface');

//用户开通会员
Route::resource('huiyuan', 'huiyuanController');

//用户上传
Route::resource('videoup', 'videoupController');

//视频管理
Route::resource('personvideo', 'personvideoController');

//用户评论
Route::resource('comment', 'commentController');

//历史记录
Route::resource('history', 'historyController');


 
 });
 


 
 

//====================后台路由===================================================================
 


//后台主页
//Route::get('admins','admin\indexController@index');




//后台登陆
Route::resource('admins/login','admin\loginController');

//后台登录验证码
Route::get('admins/code','admin\loginController@code');


//后台注册
Route::get('admins/register','admin\registerController@register');

//后台404
Route::get('404','admin\error404Controller@index');




Route::group(['prefix'=>'admins','namespace'=>'admin','middleware'=>'admins'],function(){
		
	//用户后台首页
	Route::get('/',function(){
		return view('admins/index');
	});
	
	
	// 用户管理
	Route::resource('users','usersController');
	
	// 后台视频管理
	Route::resource('video','videoController');
	
	// 后台视频上传管理
	Route::resource('videoUP','videouploadController');
	
	// 后台栏目管理
	Route::resource('column','columnController');
	
	// 广告轮播图管理
	Route::resource('ads','adsController');

});
