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



// 后台首页
Route::get('/demo', 'admin\indexController@index');


// 前台列表页
Route::get('/list', 'home\listController@index');

// 前台详情页
Route::get('/play', 'home\playController@index');

//搜索列表页
Route::get('/search','home\searchController@index');

// 前台
Route::get('/homes', 'home\zhucheController@index');






// 后台首页
Route::get('/indexs', 'admin\indexController@index');
//用户
Route::get('/ad_user', 'admin\ad_userController@index');
//视频
Route::get('/ad_video', 'admin\ad_videoController@index');
// 轮播
Route::get('/ad_vertisement', 'admin\ad_vertisementController@index');
Route::get('/add_vertisement', 'admin\add_vertisementController@index');
//栏目管理
Route::get('/ad_column', 'admin\ad_columnController@index');
// 友情链接
Route::get('/ad_ink', 'admin\ad_inkController@index');
// 上传管理
Route::get('/ad_upload', 'admin\ad_uploadController@index');

