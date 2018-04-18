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

//Frontend
Route::get('/','FrontendHomeController@Home'); 
Route::get('tim-kiem.html','FrontendSearchController@Search'); 
Route::post('tim-kiem-ajax.html','FrontendSearchController@ajaxSearch'); 
//Chi tiết bài đăng
Route::get('chi-tiet-p{id}.html','FrontendDetailPostController@getDetailPost')->where(['id'=>'[0-9]+']); 
//Hành động yêu thích, ứng tuyển
Route::get('yeu-thich.html','FrontendActionController@frontendLoveAction'); 
Route::get('ung-tuyen-p{id}.html','FrontendActionController@frontendApplyAction'); 
Route::post('ung-tuyen-p{id}.html','FrontendActionController@frontendPostsApplyAction');
//Chi tiết công ty
Route::get('cong-ty-c{id}.html','FrontendCompanyController@getDetailCompany'); 


//Nhà tuyển dụng
/****************************Nhà tuyển dụng đăng nhập trước khi quản trị*/
Route::get('/employer/dang-nhap.html','EmployerController@getLogin')->name('employer_login');
Route::post('/employer/dang-nhap.html','EmployerController@postLogin')->name('post_employer_login');
/*****Nhà tuyển dụng đăng kí*/
Route::get('/employer/dang-ki.html','UserController@getRegister')->name('register');
Route::post('/employer/dang-ki.html','UserController@postRegister')->name('postRegister');
/***Quản trị nhà tuyền dụng */
Route::group(['prefix' => 'employer','middleware'=>'employer'], function() {
    Route::group(['middleware' => 'checkexitscompany'], function(){
        Route::get('dashboard.html','EmployerController@dashBoard');    
        
        //Quản lí tin của nhà tuyển dụng
        Route::get('dashboard.html','EmployerController@dashBoard');    
        Route::get('them-tin.html','EmployerPostController@employerGetAddEmployer');    
        Route::post('them-tin.html','EmployerPostController@employerPostAddEmployer')->name('post_add_employer');
        Route::get('sua-tin-{id}.html','EmployerPostController@employerGetEditEmployer');
        Route::post('sua-tin-{id}.html','EmployerPostController@employerPostEditEmployer');
        Route::get('huy-tin-{id}.html','EmployerPostController@employerPostRemoveEmployer');
        Route::get('danh-sach-tin.html','EmployerPostController@employerGetListPost');  
        //Danh sách ng ứng tuyển  
        Route::get('danh-ung-tuyen-p{id}.html','EmployerPostController@getListApply');  
        Route::get('chi-tiet-cv-{id}.html','EmployerPostController@getCvApply');  
        //Lưu CV
        Route::get('luu-cv-{id}.html','ManagerCvCompanyController@saveCvAction');
        Route::get('huy-luu-cv-{id}.html','ManagerCvCompanyController@deleteSaveCvAction');
        //Danh sách CV đã lưu
        Route::get('danh-sach-cv-luu.html','ManagerCvCompanyController@getListSaveCv');
        //Danh sách CV đã lưu tìm kiếm
        Route::get('danh-sach-tim-kiem-cv.html','ManagerCvCompanyController@getListSearchSaveCv');
        
        //Tìm kiếm ứng viên
        Route::get('tim-kiem-ung-vien.html','EmployerSearchController@pageSearch');
        Route::get('ket-qua-ung-vien.html','EmployerSearchController@searchResult');
        Route::get('cv-ung-vien-{id}.html','EmployerSearchController@getDetailCvCandidate');
        Route::get('luu-ung-vien-{id}.html','EmployerSearchController@saveCvAction');
        Route::get('huy-ung-vien-{id}.html','EmployerSearchController@removeSaveCvAction');
        Route::get('ajax-tim-kiem-ung-vien.html','EmployerSearchController@ajaxSearchResult');

        Route::get('ajax-list-tags.html','TagController@ajaxListTag');    
    });
    Route::get('thong-tin-cong-ty.html','EmployerCompanyController@company');
    Route::post('thong-tin-cong-ty.html','EmployerCompanyController@updateCompany')->name('employer_update_company');
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

        Route::get('danh-sach-tro-giup-nha-tuyen-dung.html','CandidateProfileController@candidateGetListHelpSearch');
        Route::get('sua-tro-giup-{id}.html','CandidateProfileController@candidateGetHelpSearch');
        Route::post('sua-tro-giup-{id}.html','CandidateProfileController@candidatePostHelpSearch');
        Route::get('them-tro-giup.html','CandidateProfileController@candidateGetAddHelpSearch');
        Route::post('them-tro-giup.html','CandidateProfileController@candidatePostAddHelpSearch')->name('candidate_post_add_help_search');

        Route::get('chi-tiet-ho-so-{id}.html','ProfileCvController@candidateGetProfile');
        //Ajax thêm hồ sơ
        Route::post('them-ho-so.html','ProfileCvController@candidatePostAddProfile');
        //Ajax upload hồ sơ bổ sung
        Route::post('upload-ho-so.html','ProfileCvController@candidatePostCVProfile');

        Route::get('danh-sach-ung-tuyen.html','CandidateProfileController@getListApply');
        Route::get('danh-sach-yeu-thich.html','CandidateProfileController@getListLove');
        Route::get('bo-yeu-thich-{id}.html','CandidateProfileController@removeLove');
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

    Route::get('danh-sach-tin.html','AmdminPostEmployerController@adminGetListPost');
    Route::get('sua-tin-{id}.html','AmdminPostEmployerController@adminGetEditEmployer');
    Route::post('sua-tin-{id}.html','AmdminPostEmployerController@adminPostEditEmployer');
    Route::get('duyet-tin-{id}.html','AmdminPostEmployerController@adminCheckPost');
    Route::get('huy-tin-{id}.html','AmdminPostEmployerController@adminUnCheckPost');

    //Quản lí ngành
    Route::get('danh-sach-nghanh.html','AdminCategoryController@getListCategory');
    Route::get('them-nghanh.html','AdminCategoryController@addCategory');
    Route::post('them-nghanh.html','AdminCategoryController@postAddCategory')->name('add_category');
    Route::get('sua-nghanh-{id}.html','AdminCategoryController@editCategory');
    Route::post('sua-nghanh-{id}.html','AdminCategoryController@postEditCategory');
    Route::get('xoa-nghanh-{id}.html','AdminCategoryController@deleteCategory');

    //Quản lí công ty
    Route::get('danh-sach-cong-ty.html','AdminCompanyController@getAllCompany');
    Route::get('duyet-cong-ty-{id}.html','AdminCompanyController@adminCheckCompany');
    Route::get('huy-cong-ty-{id}.html','AdminCompanyController@destroyCompany');

    //Setting Quy mô
    Route::get('qui-mo.html','SettingController@companySize');
    Route::get('qui-mo/them.html',function(){
        return view('admin.setting.size_company.add_size_company');
    });
    Route::post('qui-mo/them.html','SettingController@addSizeCompany')->name('add_size_company');
    Route::get('qui-mo/sua-{id}.html','SettingController@editSizeCompany');
    Route::post('qui-mo/sua-{id}.html','SettingController@postEditSizeCompany');
    Route::get('qui-mo/xoa-{id}.html','SettingController@deleteSizeCompany');
});
Route::get('dang-xuat.html','EmployerController@Logout');