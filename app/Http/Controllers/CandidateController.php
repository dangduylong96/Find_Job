<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CandidateInfoRequest;
use Auth;
use MyLibrary;
Use App\User;
use App\Candidate;
Use Hash;
use File;
class CandidateController extends Controller
{
    //Dashboar
    public function dashBoard()
    {
        return view('candidate.dashboard.dashboard');
    }

    //Đăng nhập
    public function getLogin()
    {
        return view('candidate.login');
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
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'type'=>'candidate']))
        {
            return redirect('/ung-vien/dashboard.html');
        }
        return view('candidate.login')->with('message_login','Thông tin đăng nhập chưa chính xác!!');
    }
    public function getLogin2()
    {
        echo URL('/');
        exit;
        return view('candidate.login2');
    }
    
    public function postLogin2(Request $request)
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
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'type'=>'candidate']))
        {
            $url_back=session('url_back');
            if($url_back!=URL('/').'/ung-vien/dang-nhap2.html' || $url_back!=URL('/').'/ung-vien/thong-tin-tai-khoan2.html'){
                return redirect('/ung-vien/dashboard.html');
            }
            return redirect($url_back);
        }
        return view('candidate.login2')->with('message_login','Thông tin đăng nhập chưa chính xác!!');
    }

    //Đăng kí
    public function getRegister()
    {
        return view('candidate.register');
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
        $user->type='candidate';
        $user->password=Hash::make($request->password);
        $user->status=1;
        $user->save();
        session()->flash('message','Bạn đã đăng kí thành công, bây giờ bạn có thể đăng nhập');
        return redirect()->route('candidate_login');
    }

    //Thông tin tài khoản
    public function candidateGetCandidateInfo()
    {
        //Lấy id người đăng nhập
        $user=Auth::user()->toArray();
        $user_id=$user['id'];
        $user=User::find($user_id);
        $data['candidate_info']=[
            'name'=>'',
            'dob'=>'',
            'sex'=>'',
            'address'=>'',
            'phone'=>'',
            'image'=>'public/images/public_image/default_image.gif'
        ];
        if(isset($user->candidate))
        {
            $data['candidate_info']=$user->candidate->toArray();
        }
        $data['sex']=MyLibrary::getSetting('sex');
        return view('candidate.candidate_info.candidate_info',$data);
    }
    public function candidatePostCandidateInfo(CandidateInfoRequest $request)
    {
        //Lấy id người đăng nhập
        $user=Auth::user()->toArray();
        $user_id=$user['id'];
        $user=User::find($user_id);
        //Lấy thông tin và kiểm tra tài khoản đó có thông tin nào chưa( chưa thì tạo, có thì sửa)
        $candidate=$user->candidate;
        if(!isset($candidate))
        {
            //Tạo thông tin mới
            $candidate_info=new Candidate;
            $candidate_info->user_id=$user_id;
            $candidate_info->name=$request->name;
            $candidate_info->dob=date('Y-m-d',strtotime($request->dob));
            $candidate_info->sex=$request->sex;
            $candidate_info->address=$request->address;
            $candidate_info->phone=$request->phone;
            $candidate_info->image='public/images/public_image/default_image.gif';
            $candidate_info->status=0;
            if ($request->hasFile('image')){
                $file=$request->file('image');
                $image_name=str_random(10).$file->getClientOriginalName();
                while(File::exists('public/images/candidate'.$image_name))
                {
                    $image_name=str_random(10).$file->getClientOriginalName();
                }
                //upload file
                $file->move('public/images/candidate',$image_name);
                $candidate_info->image='public/images/candidate/'.$image_name;
            }
            $candidate_info->save();
            return redirect('ung-vien/thong-tin-tai-khoan.html')->with('message','Cập nhập thông tin thành công');
        }else
        {
            $candidate=$user->candidate->toArray();
            $current_image=$candidate['image'];
            $candidate_id=$candidate['id'];
            $candidate=Candidate::find($candidate_id);
            $candidate->user_id=$user_id;
            $candidate->name=$request->name;
            $candidate->dob=date('Y-m-d',strtotime($request->dob));
            $candidate->sex=$request->sex;
            $candidate->address=$request->address;
            $candidate->phone=$request->phone;
            $candidate->status=0;
            $candidate->image=$current_image;
            if ($request->hasFile('image')){
                $file=$request->file('image');
                $image_name=str_random(10).$file->getClientOriginalName();
                while(File::exists('public/images/candidate'.$image_name))
                {
                    $image_name=str_random(10).$file->getClientOriginalName();
                }
                //upload file
                $file->move('public/images/candidate',$image_name);
                $candidate->image='public/images/candidate/'.$image_name;
                //Xóa file cũ
                if($current_image!='public/images/public_image/default_image.gif')
                {
                    File::delete($current_image);
                }
            }
            $candidate->save();
            return redirect('ung-vien/thong-tin-tai-khoan.html')->with('message','Cập nhập thông tin công ty thành công');
        }
    }
    //Thông tin tài khoản
    public function candidateGetCandidateInfo2()
    {
        //Lấy id người đăng nhập
        $user=Auth::user()->toArray();
        $user_id=$user['id'];
        $user=User::find($user_id);
        $data['candidate_info']=[
            'name'=>'',
            'dob'=>'',
            'sex'=>'',
            'address'=>'',
            'phone'=>'',
            'image'=>'public/images/public_image/default_image.gif'
        ];
        if(isset($user->candidate))
        {
            $data['candidate_info']=$user->candidate->toArray();
        }
        $data['sex']=MyLibrary::getSetting('sex');
        return view('candidate.candidate_info.candidate_info2',$data);
    }
    public function candidatePostCandidateInfo2(CandidateInfoRequest $request)
    {
        //Lấy id người đăng nhập
        $user=Auth::user()->toArray();
        $user_id=$user['id'];
        $user=User::find($user_id);
        //Lấy thông tin và kiểm tra tài khoản đó có thông tin nào chưa( chưa thì tạo, có thì sửa)
        $candidate=$user->candidate;
        if(!isset($candidate))
        {
            //Tạo thông tin mới
            $candidate_info=new Candidate;
            $candidate_info->user_id=$user_id;
            $candidate_info->name=$request->name;
            $candidate_info->dob=date('Y-m-d',strtotime($request->dob));
            $candidate_info->sex=$request->sex;
            $candidate_info->address=$request->address;
            $candidate_info->phone=$request->phone;
            $candidate_info->image='public/images/public_image/default_image.gif';
            $candidate_info->status=0;
            if ($request->hasFile('image')){
                $file=$request->file('image');
                $image_name=str_random(10).$file->getClientOriginalName();
                while(File::exists('public/images/candidate'.$image_name))
                {
                    $image_name=str_random(10).$file->getClientOriginalName();
                }
                //upload file
                $file->move('public/images/candidate',$image_name);
                $candidate_info->image='public/images/candidate/'.$image_name;
            }
            $candidate_info->save();
            return redirect('ung-vien/thong-tin-tai-khoan.html')->with('message','Cập nhập thông tin thành công');
        }else
        {
            $candidate=$user->candidate->toArray();
            $current_image=$candidate['image'];
            $candidate_id=$candidate['id'];
            $candidate=Candidate::find($candidate_id);
            $candidate->user_id=$user_id;
            $candidate->name=$request->name;
            $candidate->dob=date('Y-m-d',strtotime($request->dob));
            $candidate->sex=$request->sex;
            $candidate->address=$request->address;
            $candidate->phone=$request->phone;
            $candidate->status=0;
            $candidate->image=$current_image;
            if ($request->hasFile('image')){
                $file=$request->file('image');
                $image_name=str_random(10).$file->getClientOriginalName();
                while(File::exists('public/images/candidate'.$image_name))
                {
                    $image_name=str_random(10).$file->getClientOriginalName();
                }
                //upload file
                $file->move('public/images/candidate',$image_name);
                $candidate->image='public/images/candidate/'.$image_name;
                //Xóa file cũ
                if($current_image!='public/images/public_image/default_image.gif')
                {
                    File::delete($current_image);
                }
            }
            $candidate->save();
            $url_back=session('url_back');
            return redirect($url_back);
        }
    }
}