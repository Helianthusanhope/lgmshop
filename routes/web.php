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

// Route::get('admin/index','IndexController@index');



// 后台首页
// 后台登录页面
Route::get('admin/login','Admin\LoginController@login');
Route::post('admin/dologin','Admin\LoginController@dologin');
Route::get('admin/outlogin','Admin\LoginController@outlogin');

Route::get('admin/rbac',function(){
	return view('admin.rbac');
});


// Route::group(['middleware'=>['login','nodes']],function(){
// Route::group(['middleware'=>['login']],function(){
	//后台首页
	Route::resource('admin/index', 'Admin\IndexController');
	// 后台 管理员
	Route::resource('admin/adminusers','Admin\AdminuserController');
	// 后台  角色
	Route::resource('admin/roles','Admin\RolesController');
	// 后台 权限
	Route::resource('admin/nodes','Admin\NodesController');
	// 用户
	Route::resource('admin/users', 'Admin\UserController');
	// 分区
	Route::resource('admin/cates', 'Admin\CateController');
	// 商品 库存 删除
	Route::post('admin/goodstock/{id}', 'Admin\GoodController@delete');
	// 商品 库存 添加
	Route::post('admin/stockstore', 'Admin\GoodController@stockstore');
	// 商品快速上架
	Route::get('admin/goods/status/{id}', 'Admin\GoodController@status');
	// 商品
	Route::resource('admin/goods', 'Admin\GoodController');
	// 订单
	Route::resource('admin/orders', 'Admin\OrderController');
	// 轮播图
	Route::resource('admin/banners', 'Admin\BannerController');
	// 活动
	Route::resource('admin/actives', 'Admin\ActiveController');
	// 友情链接
	Route::resource('admin/friends', 'Admin\FriendController');
	// 网站配置
	Route::resource('admin/webconfigs', 'Admin\WebConfigController');
	// 文章
	Route::resource('admin/works', 'Admin\WorkController');

// });


//前台首页
Route::resource('home/index', 'Home\IndexController');

//  前台注册  邮箱  手机号
Route::get('home/register','Home\RegisterController@index');
Route::get('home/register/sendPhone','Home\RegisterController@sendPhone');
Route::post('home/register/store','Home\RegisterController@store');
Route::post('home/register/insert','Home\RegisterController@insert');
Route::get('home/register/changeStatus/{id}/{token}','Home\RegisterController@changeStatus');


