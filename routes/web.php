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

Route::get('/info', function () {
    phpinfo();
});

Route::get('wx/token','TestController@getWxToken');
Route::any('test1','TestController@test');
Route::any('test2','TestController@test2');


Route::any('user\info','TestController@UserInfo');
Route::any('test2','TestController@test2');

Route::any('user/reg','user\UserController@reg');
Route::any('user/login','user\UserController@login');

Route::any('user/goods','user\GoodsController@goods');
Route::any('user/blacklist','user\GoodsController@blacklist')->middleware('CheckToken');
Route::any('user/qiandao','user\GoodsController@qiandao');

Route::any('test3','TestController@test3')->middleware('CheckToken');
Route::any('test4','TestController@test4')->middleware('VerifyMay');
Route::any('test5','TestController@test5')->middleware('VerifyToken');
Route::any('aest','TestController@aest');
Route::any('ace','TestController@ace');
Route::any('sign1','TestController@sign1');