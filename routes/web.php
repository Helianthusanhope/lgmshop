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
// 首页
Route::resource('admin/index', 'Admin\IndexController');
// 用户
Route::resource('admin/users', 'Admin\UserController');
// 分区
Route::resource('admin/cates', 'Admin\CateController');
// 商品库存删除
Route::post('admin/goodstock/{id}', 'Admin\GoodController@delete');
Route::post('admin/stockstore', 'Admin\GoodController@stockstore');
// 商品
// 商品快速上架
Route::get('admin/goods/status/{id}', 'Admin\GoodController@status');
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
