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
//网站首页
Route::get('/', function () {
    return view('welcome');
});

/*
 * 用户模块
 */
Route::get("/admin", "admin\IndexController@index");
//后台登录
Route::get("/admin/login","admin\LoginController@index");
//获取验证码的地址
Route::get("/captcha/{tmp}", "admin\LoginController@captcha");
//登陆验证
Route::post("/admin/logTodo", "admin\LoginController@logTodo");
//退出登陆
Route::get("/admin/logout", "admin\LoginController@logout");
//用户列表
Route::any("/admin/userlist","admin\UserController@userlist");
//添加用户
Route::get("/admin/useradd","admin\UserController@useradd");
//用户详情
Route::get("/admin/userdetail","admin\UserController@userdetail");
/**
 * 用户模块
 */

Route::post("/admin/user/store","admin\UserController@store");
//删除用户
Route::get("/admin/user/destroy/{user}","admin\UserController@destroy");
//查看详情
Route::get("/admin/user/edit/{tmp}", "admin\UserController@edit");
//编辑用户
Route::post("/admin/user/update", "admin\UserController@update");
//修改用户对应的分组
Route::post("/admin/user/setGroup", "admin\UserController@setGroup");
/*----------------------------------------------------------*
 * 分组管理                                                 *
 *----------------------------------------------------------*/
Route::resource("/admin/group", "admin\GroupController");

/*----------------------------------------------------------*
 * 前台管理                                                 *
 *----------------------------------------------------------*/

//这里是前台主页
Route::get('/',"Home\IndexController@index");
//Route::get('/caizhuang', function () {
//  return view('Home.caizhuang');
////    echo "sdmk";
//});
//这里是前台彩妆
Route::get('/caizhuang',"Home\IndexController@caizhuang");
//这里是本周促销
Route::get('/cuxiao',"Home\CuxiaoController@index");
//这里是主页跳转注册页面
Route::get('/zhuche',"Home\ZhucheController@zhuche");
//这里是主页登录页面
Route::get('/denglu',"Home\IndexController@denglu");
//这里是主页面部护肤页面跳转
Route::get('/mianbuhufu',"Home\IndexController@mianbuhufu");
//这里是主页限时特卖页面跳转
Route::get('/xianshitemai',"Home\IndexController@xianshitemai");
//这里是主页贵宾专享页面跳转
Route::get('/guibinzhuanxiang',"Home\IndexController@guibinzhuanxiang");
//这里是主页所有品牌的页面跳转
Route::get('/suoyoupinpai',"Home\IndexController@suoyoupinpai");
