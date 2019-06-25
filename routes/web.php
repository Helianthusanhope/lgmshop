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
	Route::resource(' admin/adminusers','Admin\AdminuserController');
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
	// 商品活动管理
	Route::get('admin/goactive/{id}', 'Admin\GoodController@goActive');
	// 参加 取消活动执行
	Route::post('admin/activeup/{id}', 'Admin\GoodController@activeup');
	// 商品
	Route::resource('admin/goods', 'Admin\GoodController');
	// 订单
	Route::resource('admin/orders', 'Admin\OrderController');
	// 轮播图
	Route::resource('admin/banners', 'Admin\BannerController');
	// 活动
	Route::resource('admin/actives', 'Admin\ActiveController');
	// 友情链接快速操作
	Route::get('admin/friends/status/{id}', 'Admin\FriendController@status');
	// 友情链接
	Route::resource('admin/friends', 'Admin\FriendController');
	// 网站配置快速操作
	Route::get('admin/webconfigs/status/{id}', 'Admin\WebConfigController@status');
	// 网站配置
	Route::resource('admin/webconfigs', 'Admin\WebConfigController');
	// 友情链接快速操作
	Route::get('admin/works/status/{id}', 'Admin\WorkController@status');
	// 文章(新闻)
	Route::resource('admin/works', 'Admin\WorkController');

// });


//前台首页
Route::resource('/', 'Home\IndexController');


//  前台注册  邮箱  手机号
Route::get('home/register','Home\RegisterController@index');
Route::get('home/register/sendPhone','Home\RegisterController@sendPhone');
Route::post('home/register/store','Home\RegisterController@store');
Route::post('home/register/insert','Home\RegisterController@insert');
Route::get('home/register/changeStatus/{id}/{token}','Home\RegisterController@changeStatus');


//前台登陆
Route::get('home/login', 'Home\LoginController@login');
//验证登录
Route::post('home/dologin', 'Home\LoginController@dologin');
//登录退出
Route::get('home/loginout', 'Home\LoginController@loginout');

//个人中心
//显示个人中心首页
Route::get('home/personal', 'Home\PersonalController@index');
//显示个人信息修改页面页面
Route::get('home/information/edit', 'Home\InformationController@edit');
//执行信息修改
Route::post('home/information/update', 'Home\InformationController@update');

//显示地址页面
Route::get('home/address', 'Home\AddressController@index');
//执行地址添加
Route::post('home/address/store', 'Home\AddressController@store');





//显示活动界面
Route::get('home/active/{id}', 'Home\ActiveController@index');
//显示商品列表
Route::get('home/goodlist','Home\GoodlistController@index');