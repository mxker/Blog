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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/** **************** Website Backend ******************* */
Route::group(['namespace' => 'Admin','prefix'=>'backend'], function (){

    Route::get('/', 'LoginController@login');
    Route::post('login/check', 'LoginController@checkLogin');
    Route::any('register', 'LoginController@register');
    Route::get('logout', 'LoginController@logout');
    Route::get('code', 'LoginController@code');

    // session中间件验证
    Route::get('home/{id}', 'HomeController@index')->middleware('session');

    Route::resource('article', 'ArticleController');
    Route::resource('category', 'CategoryController');
    Route::any('category/changeOrder', 'CategoryController@changeOrder');
});

/** ****************Website Frontend******************* */

Route::group(['namespace' => 'Blog'], function (){

    Route::get('/','HomeController@index');

    Route::get('article/{id}','ArticleController@index');

    Route::post('search','ArticleController@search');

    Route::get('auth/index','AuthController@index');

    Route::get('ab','TestController@index');
});


/*** ********************自带Auth路由************************/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
