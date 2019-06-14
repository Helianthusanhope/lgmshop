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
/*
	路由分配
		
		吕博: 数据共享(23,24)  	路由分配 32-131
		
		关超:数据共享(25,26) 		路由分配 132-232
		
		满玉奇:数据共享(27,28)  	 路由分配 233-333
	
	数据共享:

		
	
		
		

				

 */
Route::get('/', function () {
    return view('welcome');
});

//后台首页 
Route::resource('admin/index', 'Admin\IndexController');

//后台用户管理
Route::resource('admin/users', 'Admin\UserController');

//