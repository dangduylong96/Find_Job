<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Company;
use App\PostEmployer;
use App\Tag;
use App\Category;

class AdminController extends Controller
{
    //Đăng nhập
    public function getLogin()
    {
        return view('admin.login');
    }
    
    public function postLogin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ],
        [
            'email.required'=>'Email không được bỏ trống',
            'email.email'=>'Email không hợp lệ',
            'password.required'=>'Password không được bỏ trống',
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'type'=>'admin']))
        {
            return redirect('/admin/dashboard.html');
        }
        return view('admin.login')->with('message_login','Thông tin đăng nhập chưa chính xác!!');
    }

    public function dashBoard()
    {
        $data['Company']=Company::count();
        $data['PostEmployer']=PostEmployer::count();
        $data['Tag']=Tag::count();
        $data['Category']=Category::count();
        return view('admin.dashboard.dashboard',$data);
    }
}
