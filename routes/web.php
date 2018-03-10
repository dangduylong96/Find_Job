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

//Nhà tuyển dụng
/*Nhà tuyển dụng đăng nhập trước khi quản trị*/
Route::get('/employer/dang-nhap.html','UserController@getLogin')->name('login');
/*Nhà tuyển dụng đăng kí*/
Route::get('/employer/dang-ki.html','UserController@getRegister')->name('register');