<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
Use Hash;
Use App\User;
class EmployerController extends Controller
{
    public function dashBoard()
    {
        return view('employer.dashboard.dashboard');
    }
     //Đăng nhập
     public function getLogin()
     {
         return view('employer.login');
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
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'type'=>'employer']))
        {
            return redirect('/employer/dashboard.html');
        }
        return view('employer.login')->with('message_login','Thông tin đăng nhập chưa chính xác!!');
    }
 
     //Đăng kí
    public function getRegister()
    {
        return view('employer.register');
    }
    public function postRegister(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email|unique:users,email',
            'password'=>'required',
            'repassword'=>'same:password'
        ],
        [
            'email.required'=>'Email không được bỏ trống',
            'email.email'=>'Email không hợp lệ',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Password không được bỏ trống',
            'repassword.same'=>'Password nhập lại không đúng'
        ]);
        $user=new User;
        $user->email=$request->email;
        $user->type='employer';
        $user->password=Hash::make($request->password);
        $user->status=1;
        $user->save();
        session()->flash('message','Bạn đã đăng kí thành công, bây giờ bạn có thể đăng nhập');
        return redirect()->route('employer_login');
    }
    public function Logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
