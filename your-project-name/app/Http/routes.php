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