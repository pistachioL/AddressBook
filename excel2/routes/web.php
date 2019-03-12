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


//前网址 后方法
Route::get('/', function () {
    return view('welcome');
});
//Route::any('import','dataController@import');

Route::any('Register','dataController@Register');
Route::any('Login','dataController@Login');
//Route::any('showLogin','dataController@showLogin');

Route::any('yanzhen','dataController@yanzhen');
Auth::routes();

Route::any('authenticate','LoginController@authenticate');


Route::group(['middleware'=>['After_Login']], function(){
	Route::any('upload','dataController@upload'); //上传全部excel文件
	Route::any('create','dataController@create');  //逐个新增数据
	Route::any('save','dataController@save');
	Route::any('update/{id}', 'dataController@update');  //update方法里面加了参数id
	Route::any('delete/{id}', 'dataController@delete');
	Route::any('show','dataController@show');	
	Route::get('/home', 'HomeController@index')->name('home');
});