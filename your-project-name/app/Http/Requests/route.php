<?php
// 一定注意route.php路由文件中.Route:::get()的小括号内路由路径必须不能相同,否则影响效果!!!



Route::get('/', function () {
    return view('home/index');
});








// // 第一节：基本路由
// Route::get('/test', function () {
//     return 'hello get';
// });

// Route::post('/test', function () {
//     return 'hello post';
// });

// Route::put('/test', function () {
//     return 'hello put';
// });

// Route::delete('/test', function () {
//     return 'hello delete';
// });

// //多重路由
// Route::match(['get', 'post'], '/aa', function () {
//     return 'Hello World';
// });

// //带参数的路由
// //可选参数的路由，在参数后面加？
// //限制参数id的值为0-9的数值（可以多位数）
// // Route::get('user/{id?}', function ($id = null) {
// //     return 'User '.$id;
// // })->where('id', '[0-9]+');


// //第二节：控制器
// Route::get('/demo', 'demoController@demo');

// Route::get('/request', 'demoController@request');
// Route::get('/response', 'demoController@response');

// // 资源控制器
// Route::resource('/stu', 'admin\stuController');

// //第三节 模板继承
// // Route::get('/admin','admin\adminController@index');

// // Route::resource('/user','admin\userController');

// //第四节  文件上传
// Route::get('/uploads','admin\uploadsController@index');
// Route::post('/doupload','admin\uploadsController@doupload');

// //第五节:路由群组  


// //前台
// Route::group(['prefix'=>'home'],function(){

// });


// //后台
// Route::group(['prefix'=>'admin','middleware' => 'login'],function(){
// 	Route::get('/','admin\adminController@index');
// 	Route::resource('/user','admin\userController');
// 	});

// //登录
// Route::get('/admin/login','admin\loginController@index');
// Route::post('/admin/dologin','admin\loginController@dologin');
// Route::get('/admin/captch/{tmp}','admin\loginController@captch');