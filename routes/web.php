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

/** **************** Website Admin ******************* */
Route::domain(env('ADMIN_DOMAIN'))->group(function (){

    Route::group(['namespace' => 'Admin'], function (){

        Route::get('/', 'LoginController@login');
        Route::post('backend/login/check', 'LoginController@checkLogin');
        Route::any('backend/register', 'LoginController@register');
        Route::get('backend/logout', 'LoginController@logout');
        Route::get('backend/code', 'LoginController@code');

        // session中间件验证
        Route::get('backend/home/{id}', 'HomeController@index')->middleware('session');

        Route::resource('backend/article', 'ArticleController');
        Route::resource('backend/category', 'CategoryController');
        Route::any('backend/category/changeOrder', 'CategoryController@changeOrder');
    });
});


/** ****************Website Frontend******************* */

Route::group(['domain'=>env('WEB_DOMAIN'),'namespace' => 'Blog'], function (){

    Route::get('/','HomeController@index');

    Route::get('article/{id}','ArticleController@index');
});


/*** ********************自带Auth路由************************/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
