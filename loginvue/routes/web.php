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


// 登录
Route::post('login','AdminController@login');

// 获取公钥
Route::get('getPublicKey','AdminController@getPublicKey');

Route::get('/','IndexController@index');
