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
/****************************Nhà tuyển dụng đăng nhập trước khi quản trị*/
Route::get('/employer/dang-nhap.html','UserController@getLogin')->name('employer_login');
Route::post('/employer/dang-nhap.html','UserController@postLogin')->name('post_employer_login');
/*****Nhà tuyển dụng đăng kí*/
Route::get('/employer/dang-ki.html','UserController@getRegister')->name('register');
Route::post('/employer/dang-ki.html','UserController@postRegister')->name('postRegister');
/***Quản trị nhà tuyền dụng */
Route::group(['prefix' => 'employer','middleware'=>'employer'], function() {
    Route::group(['middleware' => 'checkexitscompany'], function(){
        Route::get('dashboard.html','EmployerController@dashBoard');    
        
        //Quản lí tin của nhà tuyển dụng
        Route::get('dashboard.html','EmployerController@dashBoard');    
        Route::get('them-tin.html','PostEmployerController@employerGetAddEmployer');    
        Route::post('them-tin.html','PostEmployerController@employerPostAddEmployer')->name('post_add_employer');
        Route::get('sua-tin-{id}.html','PostEmployerController@employerGetEditEmployer');
        Route::post('sua-tin-{id}.html','PostEmployerController@employerPostEditEmployer');
        Route::get('danh-sach-tin.html','PostEmployerController@employerGetListPost');    
        Route::get('ajax-list-tags.html','TagController@ajaxListTag');    
    });
    Route::get('thong-tin-cong-ty.html','CompaniesController@company');
    Route::post('thong-tin-cong-ty.html','CompaniesController@updateCompany')->name('employer_update_company');
});



//Ứng viên
/*************************************Ứng viên quản trị */
Route::get('/ung-vien/dang-nhap.html','CandidateController@getLogin')->name('candidate_login');
Route::post('/ung-vien/dang-nhap.html','CandidateController@postLogin')->name('post_candidate_login');
Route::get('/ung-vien/dang-ki.html','CandidateController@getRegister')->name('candidate_register');
Route::post('/ung-vien/dang-ki.html','CandidateController@postRegister')->name('post_register_candidate');
Route::group(['prefix' => 'ung-vien','middleware'=>'candidate'], function() {
    Route::group(['middleware' => 'checkExitsInfoCandicate'], function(){
        Route::get('dashboard.html','CandidateController@dashBoard');  
        
        // //Quản lí tin của nhà tuyển dụng
        // Route::get('dashboard.html','EmployerController@dashBoard');    
        // Route::get('them-tin.html','PostEmployerController@employerGetAddEmployer');    
        // Route::post('them-tin.html','PostEmployerController@employerPostAddEmployer')->name('post_add_employer');
        // Route::get('sua-tin-{id}.html','PostEmployerController@employerGetEditEmployer');
        // Route::post('sua-tin-{id}.html','PostEmployerController@employerPostEditEmployer');
        // Route::get('danh-sach-tin.html','PostEmployerController@employerGetListPost');    
        // Route::get('ajax-list-tags.html','TagController@ajaxListTag');    
    });
    
    Route::get('thong-tin-tai-khoan.html','CandidateController@candidateGetCandidateInfo');
    Route::post('thong-tin-tai-khoan.html','CandidateController@candidatePostCandidateInfo')->name('candidate_post_candidate_info');
});


/********************Admin (Quản trị viên)*/
Route::get('/admin/dang-nhap.html','AdminController@getLogin')->name('admin_login');
Route::post('/admin/dang-nhap.html','AdminController@postLogin')->name('post_admin_login');
/****Quản trị Admin */
Route::group(['prefix' => 'admin','middleware'=>'admin'], function() {
    Route::get('dashboard.html','AdminController@dashBoard');
    //Setting thành phố
    Route::get('thanh-pho.html','SettingController@listCity');
    Route::get('thanh-pho/them.html',function(){
        return view('admin.setting.city.add_city');
    });
    Route::post('thanh-pho/them.html','SettingController@postCity')->name('add_city');
    Route::get('thanh-pho/sua-{id}.html','SettingController@editCity');
    Route::post('thanh-pho/sua-{id}.html','SettingController@postEditCity');
    Route::get('thanh-pho/xoa-{id}.html','SettingController@deleteCity');

    //Setting Quy mô
    Route::get('qui-mo.html','SettingController@companySize');
    Route::get('qui-mo/them.html',function(){
        return view('admin.setting.size_company.add_size_company');
    });
    Route::post('qui-mo/them.html','SettingController@addSizeCompany')->name('add_size_company');
    Route::get('qui-mo/sua-{id}.html','SettingController@editSizeCompany');
    Route::post('qui-mo/sua-{id}.html','SettingController@postEditSizeCompany');
    Route::get('qui-mo/xoa-{id}.html','SettingController@deleteSizeCompany');

    //Setting giới tính
    Route::get('gioi-tinh.html','SettingController@Sex');
});

Route::get('/demo', function () {
    return MyLibrary::get_username(1);
});