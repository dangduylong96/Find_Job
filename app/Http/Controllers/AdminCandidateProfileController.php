<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use URL;
use App\CandidateProfile;
class AdminCandidateProfileController extends Controller
{
    public function getListProfile(){
        //Lấy danh hồ sơ
        $list_profile=CandidateProfile::orderBy('id','desc')->get();
        $data['list_profile']=$list_profile;
        return view('admin.candidate_profile.profile',$data);
    }
    //Xem chi tiết CV
    public function getCvApply($id)
    {
        //Lấy id người đăng nhập và kiểm tra cv tồn tại không
        $cv=CandidateProfile::find($id);
        if(!isset($cv)){
            return redirect('admin/danh-sach-ho-so-ung-vien.html')->with('message',['status'=>'danger','content'=>'CV không tồn tại']);
        }
        //Tăng lượt view của hồ sơ lên
        if(!session()->has('view_cv_'.$id))
        {
            $cv->view=$cv->view+1;
            $cv->save();
            session()->put('view_cv_'.$id,$id);
        } 

        //Lấy chi tiết hồ sơ (nếu có hoặc không)
        $profile_cv=$cv->profile_cv;
        $data['candidate_profile']=$cv;
        //Lấy thông tin người tạo hồ sơ
        $candidate=$cv->candidate;
        $data['candidate']=$candidate; 
        if(!isset($profile_cv)){
            $data['target']=null;
            $data['experience']=null;
            $data['level']=null;
            $data['english']=null;
            $data['advantages']=null;
            $data['cv']=null;
        }else
        {
            $data['target']=json_decode($profile_cv->target);
            $data['experience']=json_decode($profile_cv->experience);
            $data['level']=json_decode($profile_cv->level);
            $data['english']=json_decode($profile_cv->english);
            $data['advantages']=json_decode($profile_cv->advantages);
            $data['cv']=$profile_cv->cv;
        }

        return view('admin.candidate_profile.detail_cv',$data);
    }
    public function checkCandidate($id){
        $cv=CandidateProfile::find($id);
        if(!isset($cv)){
            return redirect('admin/danh-sach-ho-so-ung-vien.html')->with('message',['status'=>'danger','content'=>'CV không tồn tại']);
        }
        $cv->status=1;
        $cv->save();
        return redirect('admin/danh-sach-ho-so-ung-vien.html')->with('message',['status'=>'success','content'=>'Duyệt cv thành công!!!']);
    }
    public function destroyCandidate($id){
        $cv=CandidateProfile::find($id);
        if(!isset($cv)){
            return redirect('admin/danh-sach-ho-so-ung-vien.html')->with('message',['status'=>'danger','content'=>'CV không tồn tại']);
        }
        $cv->status=2;
        $cv->save();
        return redirect('admin/danh-sach-ho-so-ung-vien.html')->with('message',['status'=>'success','content'=>'Duyệt cv thành công!!!']);
    }
}
