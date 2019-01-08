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
use Illuminate\Support\Facades\Route;

/** ****************Website backend 路由******************* */
Route::domain(env('ADMIN_DOMAIN'))->group(function (){

    Route::group(['namespace' => 'Backend'], function (){

        // 登录注册
        Route::get('/', 'LoginController@login');
        Route::post('backend/login/check', 'LoginController@checkLogin');
        Route::any('backend/register', 'LoginController@register');
        Route::get('backend/logout', 'LoginController@logout');
        Route::get('backend/code', 'LoginController@code');

        // seesion中间件验证
        Route::get('backend/home/{id}', 'HomeController@index')->middleware('session');

        // 文章管理
        Route::resource('backend/article', 'ArticleController');

        // 分类管理
        Route::resource('backend/category', 'CategoryController');
        Route::any('backend/category/changeOrder', 'CategoryController@changeOrder');
    });
});


/** ****************Website frontend 路由******************* */

Route::group(['domain'=>env('WEB_DOMAIN'),'namespace' => 'Blog'], function (){
    // 首页
    Route::get('/','HomeController@index');

    // 文章详情
    Route::get('article/{id}','ArticleController@index');
});



/*** ********************自带Auth路由************************/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
