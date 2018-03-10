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
/*****Nhà tuyển dụng đăng nhập trước khi quản trị*/
Route::get('/employer/dang-nhap.html','UserController@getLogin')->name('employer_login');
Route::post('/employer/dang-nhap.html','UserController@postLogin')->name('post_employer_login');
/*****Nhà tuyển dụng đăng kí*/
Route::get('/employer/dang-ki.html','UserController@getRegister')->name('register');
Route::post('/employer/dang-ki.html','UserController@postRegister')->name('postRegister');
/***Quản trị nhà tuyền dụng */
Route::group(['prefix' => 'employer','middleware'=>'employer'], function() {
    Route::get('dashboard.html','EmployerController@dashBoard');
    Route::get('thong-tin-cong-ty.html','EmployerController@company');
});
