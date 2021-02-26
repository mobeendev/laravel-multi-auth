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


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware'=>['auth','admin']], function () {
		Route::get('/admin', 'AdminController@index')->name('admin');
});

Route::group(['middleware'=>['auth','user']], function () {
		Route::get('/user', 'UserController@index')->name('user');
});

Route::group(['middleware'=>['auth','manager']], function () {
		Route::get('/manager', 'ManagerController@index')->name('manager');;
});



