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
// 前台
Route::get('/homes', 'home\zhucheController@index');






// 后台首页
Route::get('/indexs', 'admin\indexController@index');
//用户
Route::get('/ad_user', 'admin\ad_userController@index');
Route::get('/add_upuser', 'admin\add_upuserController@index');
//视频
Route::get('/ad_video', 'admin\ad_videoController@index');
Route::get('/add_upvideo', 'admin\add_upvideoController@index');
// 轮播
Route::get('/ad_vertisement', 'admin\ad_vertisementController@index');
Route::get('/add_upvertisement', 'admin\add_upvertisementController@index');
//栏目管理
Route::get('/ad_column', 'admin\ad_columnController@index');
Route::get('/add_upcolumn', 'admin\add_upcolumnController@index');
// 友情链接
Route::get('/ad_ink', 'admin\ad_inkController@index');
Route::get('/add_upink', 'admin\add_upinkController@index');
// 上传管理
Route::get('/ad_upload', 'admin\ad_uploadController@index');