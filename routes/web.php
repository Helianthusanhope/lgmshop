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
	// 库存增加
	Route::post('admin/stockadd/{id}', 'Admin\GoodController@stockadd');
	// 商品 库存 添加 新的库存类型
	Route::post('admin/stockstore', 'Admin\GoodController@stockstore');
	// 商品快速上架
	Route::get('admin/goods/status/{id}', 'Admin\GoodController@status');
	// 商品活动管理
	Route::get('admin/goactive/{id}', 'Admin\GoodController@goActive');
	// 参加 取消活动执行
	Route::post('admin/activeup/{id}', 'Admin\GoodController@activeup');
	// 商品
	Route::resource('admin/goods', 'Admin\GoodController');
	// 发货
	Route::get('admin/orders/deliver/{id}', 'Admin\OrderController@deliver');
	// 订单
	Route::resource('admin/orders', 'Admin\OrderController');
	
	// 轮播图
	Route::resource('admin/banners', 'Admin\BannerController');
	
	// 活动快速上推荐位
	Route::get('admin/actives/status/{id}', 'Admin\ActiveController@status');
	// 活动
	Route::resource('admin/actives', 'Admin\ActiveController');

	// 友情链接添加快速操作
	Route::get('admin/friends/status/{id}', 'Admin\FriendController@status');
	// 友情链接
	Route::resource('admin/friends', 'Admin\FriendController');

	// 网站配置快速操作
	Route::get('admin/webconfigs/status/{id}', 'Admin\WebConfigController@status');
	// 网站配置
	Route::resource('admin/webconfigs', 'Admin\WebConfigController');
	
	// 文章链接显示快速操作
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
Route::get('home/login/myself', 'Home\LoginController@rinima');
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

//显示收货地址页面
Route::get('home/address', 'Home\AddressController@index');
//执行地址添加
Route::post('home/address/store', 'Home\AddressController@store');
//地址删除
Route::get('home/address/edit/{aid}', 'Home\AddressController@edit');
//默认地址的修改
Route::get('home/address/update/{aid}', 'Home\AddressController@update');



//显示个人安全中心
Route::get('home/safety', 'Home\SafetyController@index');



//显示活动界面
Route::get('home/active/{id}', 'Home\ActiveController@index');
//显示新闻详情页
Route::get('home/work/{id}', 'Home\WorkController@index');
// 三级分类和全局搜索 显示商品详情
Route::resource('home/goodlist','Home\GoodlistController');
//一级分类 显示
Route::get('home/goodlist/catetop/{cid}','Home\GoodlistController@catetop');
//二级分类 显示
Route::get('home/goodlist/catetwo/{cid}','Home\GoodlistController@catetwo');
// 显示商品
Route::resource('home/goods','Home\GoodController');
// 订单页
Route::get('home/orders/buy', 'Home\OrderController@index');
Route::resource('home/orders','Home\OrderController');













// 加入购物车
Route::get('home/car/add','Home\CarController@add');
Route::get('home/car/index','Home\CarController@index');
Route::get('home/car/addnum','Home\CarController@addNum');
Route::get('home/car/descnum','Home\CarController@descNum');
Route::get('home/car/delete','Home\CarController@delete');

// 购物 结算
Route::get('home/order/account','Home\OrderController@account');
Route::post('home/order/pay','Home\OrderController@pay');