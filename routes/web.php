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

// 直接显示视图
Route::get('/', function () {
    return view('welcome');
});

// 请求User控制器中的index方法
Route::get('demo', 'DemoController@index');

// 参数路由
Route::get('demo/show/{id}', 'DemoController@show');

// 【群组路由】Auth文件夹下面的控制路由
Route::group(['namespace' => 'Auth'], function (){
    Route::get('login', 'LoginController@login');
    Route::get('login/admin-copy', 'LoginController@admin-copy');
});

// 资源路由 适用于资源控制器（artisan 创建控制器）
Route::resource('photo', 'PhotoController');

/** ****************Demo 路由******************* */

Route::get('view','DemoController@view');
Route::get('template','DemoController@template');
Route::get('model','DemoController@model');
Route::any('request','DemoController@request');


/** ****************Website backend 路由******************* */

Route::group(['namespace' => 'Backend'], function (){

    // 登录注册
    Route::get('backend/login', 'LoginController@login');
    Route::post('backend/login/check', 'LoginController@checkLogin');
    Route::any('backend/register', 'LoginController@register');
    Route::get('backend/logout', 'LoginController@logout');

    Route::get('backend/home', 'HomeController@index');
});


/*** ********************自带Auth路由************************/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
