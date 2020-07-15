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

Route::get('wx/token','TestController@getWxToken');
Route::any('test1','TestController@test');
Route::any('test2','TestController@test2');


Route::any('user/info','TestController@UserInfo');
Route::any('test2','TestController@test2');
