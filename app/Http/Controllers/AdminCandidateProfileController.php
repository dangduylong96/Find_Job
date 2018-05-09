<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        //Lấy id người đăng nhập
        $user=Auth::user();
        $company_id=$user->company->id;
        //Lấy thông tin ứng tuyển hiện tại
        $manager_cadidate_and_post=Manager_cadidate_and_post::find($id);
        if(!isset($manager_cadidate_and_post))
        {
            return redirect('employer/danh-sach-tin.html')->with('message',['status'=>'danger','content'=>'CV không tồn tại']);
        }
        $post_employer=PostEmployer::find($manager_cadidate_and_post->post_id);
        if($company_id!=$post_employer->company_id)
        {
            return redirect('employer/danh-sach-tin.html')->with('message',['status'=>'danger','content'=>'Bạn không có quyền xem CV này']);
        }
        $url_cv_out=$manager_cadidate_and_post->url_cv_out;
        //Kiểm tra là dùng hồ sơ bên ngoài hay hồ sơ có sẵn
        if(isset($url_cv_out) && $url_cv_out!='')
        {
            //Nếu chỉ có cv thôi
            return redirect('http://localhost:90/Find_Job/public/out_cv/'.$url_cv_out);
        }elseif(isset($manager_cadidate_and_post->candidate_profile_id))
        {
            //Lấy thông tin của cv ứng tuyển
            $candidate_profile=$manager_cadidate_and_post->candidate_profile;
            $data['candidate_profile']=$candidate_profile;
            //Lấy thông tin người tạo hồ sơ
            $candidate=$candidate_profile->candidate;
            $data['candidate']=$candidate;       
            //Lấy thông tin chi tiết hồ sơ (CV_profile)
            $profile_cv=$candidate_profile->profile_cv;
            $data['target']=json_decode($profile_cv->target);
            $data['experience']=json_decode($profile_cv->experience);
            $data['level']=json_decode($profile_cv->level);
            $data['english']=json_decode($profile_cv->english);
            $data['advantages']=json_decode($profile_cv->advantages);
            $data['cv']=$profile_cv->cv;

            //Tăng lượt view của hồ sơ lên
            if(!session()->has('view_cv_'.$id))
            {
                $candidate_profile->view=$candidate->view+1;
                $candidate_profile->save();
                session()->put('view_cv_'.$id,$id);
            }   
            
            return view('employer.apply.detail_cv',$data);
        }
    }
}
