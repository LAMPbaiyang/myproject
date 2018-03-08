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
/* Route::get('/', function () {
    return view('homes/index');
}); */


//前台首页
Route::get('/','home\indexController@index');


// 前台视频列表页
Route::resource('list', 'home\listController@index');
Route::resource('detail', 'home\listController@show');

// 前台视频播放页(详情页)
Route::resource('homes/play', 'home\playController@show');
//前台视频评论页
Route::resource('homes/comment', 'home\playController@comment');
//前台视频播放页
Route::resource('homes/shoucang', 'home\playController@shoucang');

//搜索列表页
Route::resource('homes/search','home\searchController');

// 前台注册页
Route::resource('homes/register', 'home\registerController');
 
 // 注册验证方法路由
Route::resource('homes/doregister', 'home\registerController@doRegister');

 //前台注册短信验证码(路由方法名和王建不同)
Route::resource('register/SMS','home\registerController@SMS');

// 前台登录页
Route::resource('homes/login', 'home\loginController');

//前台登录验证码
//Route::get('homes/codes','home\loginController@codes');
Route::get('homes/codes/1/{tmp}', 'home\loginController@codes');




// 前台个人中心页
Route::group(['prefix'=>'homes','namespace'=>'home\center','middleware'=>'homes'],function(){

//用户个人中心
Route::resource('center', 'centerController');

Route::resource('uface', 'centerController@uface');

//用户注销
Route::resource('exit', 'centerController@exit');


//用户开通会员
Route::resource('huiyuan', 'huiyuanController');

//用户上传
Route::resource('videoup', 'videoupController');

//视频管理
Route::resource('personvideo', 'personvideoController');

//用户评论

Route::resource('pinglun', 'commentController');


//历史记录
Route::resource('history', 'historyController');

//收藏
Route::resource('store', 'shoucangController');

 
 });
 


 
 

//====================后台路由===================================================================
 
//后台登陆
Route::resource('admins/login','admin\loginController');

//后台登录验证码
//Route::get('admins/code','admin\loginController@code');
Route::get('admins/code/2/{tmp}', 'admin\loginController@code');

//后台注册
Route::get('admins/register','admin\registerController@register');

//后台404
Route::get('404','admin\error404Controller@index');




Route::group(['prefix'=>'admins','namespace'=>'admin','middleware'=>'admins'],function(){
		
	//用户后台首页
	Route::get('/',function(){
		return view('admins/index');
	});
		
	// 后台管理员管理
	Route::resource('users','usersController');
	
	//前台用户管理
	Route::resource('user','userController');
    Route::resource('stop','userController@stop');
	
	// 后台视频管理
	Route::resource('video','videoController');
	
	// 后台视频上传管理
	Route::resource('upload','uploadController');
	//上传视频封面
	Route::resource('uploads','uploadController@up');
	//上传视频文件
	Route::resource('uploadv','uploadController@vup');
	
	
	
	
	// 后台栏目管理
	Route::resource('column','columnController');
	
	// 轮播图管理
	Route::resource('ads','adsController');
	
	//轮播图上传
	Route::resource('ads/imageUpload','adsController@imgupload');
	

});
