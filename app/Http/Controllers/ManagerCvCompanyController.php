<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MyLibrary;
use Auth;
use App\Company;
use App\PostEmployer;
use App\Tag;
use App\Category;
use App\Manager_cadidate_and_post;
use App\Manager_cv_company;
use App\CandidateProfile;
class ManagerCvCompanyController extends Controller
{
    public function saveCvAction($id)
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
            return redirect('employer/danh-sach-tin.html')->with('message',['status'=>'danger','content'=>'Bạn không có quyền lưu CV này']);
        }
        //Kiểm tra đã có tồn tại dòng lưu chưa (chưa thì tạo)
        $manager_cv_company=$manager_cadidate_and_post->manager_cv_company;
        if(!isset($manager_cv_company))
        {
            //Chưa có tiền hành tạo
            $manager_cv_company=new Manager_cv_company;
            $manager_cv_company->manager_cadidate_and_posts_id=$id;
            $manager_cv_company->company_id=$company_id;
            $manager_cv_company->status=1;
            $manager_cv_company->save();
            return redirect()->back();
        }else
        {
            $manager_cv_company->status=1;
            $manager_cv_company->save();
            return redirect()->back();
        }
    }
    public function deleteSaveCvAction($id)
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
            return redirect('employer/danh-sach-tin.html')->with('message',['status'=>'danger','content'=>'Bạn không có quyền lưu CV này']);
        }
        //Kiểm tra đã có tồn tại dòng lưu chưa (chưa thì tạo)
        $manager_cv_company=$manager_cadidate_and_post->manager_cv_company;
        if(!isset($manager_cv_company))
        {
            //Chưa có tiền hành tạo
            $manager_cv_company=new Manager_cv_company;
            $manager_cv_company->manager_cadidate_and_posts_id=$id;
            $manager_cv_company->company_id=$company_id;
            $manager_cv_company->status=0;
            $manager_cv_company->save();
            return redirect()->back();
        }else
        {
            $manager_cv_company->status=0;
            $manager_cv_company->save();
            return redirect()->back();
        }
    }
    
    public function getListSaveCv()
    {
        //Lấy thông tin company
        $user=Auth::user();
        $company_id=$user->company->id;
        //Tìm các hồ sơ đã lưu của công ty này
        $cv=Manager_cv_company::where([['company_id',$company_id],['status',1]])->get();
        $data['cv']=$cv;
        return view('employer.cv.list_save_cv',$data);
    }
}
