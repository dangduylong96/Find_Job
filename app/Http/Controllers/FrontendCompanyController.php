<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use URL;
use App\Company;
use App\PostEmployer;
use App\Manager_cadidate_and_post;
class FrontendCompanyController extends Controller
{
    public function getDetailCompany($id)
    {
        //Lây thông tin công ty
        $company=Company::find($id);   
        if(!isset($company))
        {
            return redirect('/');
        }
        //Tăng lượt xem của công ty lên
        if(!session()->has('view_company_'.$id))
        {
            $company->view=$company->view+1;
            $company->save();
            session()->put('view_company_'.$id,$id);
        } 
        $data['company']=$company;
        
        //Lấy việc làm thuộc công ty này
        $list_post_0_to_3=PostEmployer::where('company_id',$id)->skip(0)->take(5)->orderBy('created_at','desc')->get();
        $data['list_post_0_to_3']=$list_post_0_to_3;

        //Danh sách các bài viết đã ưa thích
        if(Auth::check())
        {
            $user=Auth::user();
            if($user->type=="candidate")
            {
                $candidate_id=$user->candidate;
                if(isset($candidate_id)){
                    $candidate_id=$user->candidate->id;
                    $list_love=Manager_cadidate_and_post::where([['candidate_id',$candidate_id],['type',1]])->get();
                    if(isset($list_love))
                    {
                        $data['list_love']=[];
                        foreach($list_love as $v)
                        {
                            $data['list_love'][]=$v->post_id;
                        }
                    }
                }else{
                    echo '<script>alert("Vui lòng bổ sung thông tin cá nhân để tiếp tục!!!");</script>';
                    echo '<script>window.location.href="'.URL::to('/').'/ung-vien/thong-tin-tai-khoan2.html";</script>';
                }
            }
        }

        //Lấy thông tin bài viết hiện tại
        $post=PostEmployer::find($id);   
        if(!isset($post))
        {
            return redirect('/');
        }
        //Tăng lượt xem của bài viết lên
        if(!session()->has('view_post_'.$id))
        {
            $post->view=$post->view+1;
            $post->save();
            session()->put('view_post_'.$id,$id);
        }   
        $data['post']=$post;
        return view('frontend.company.company',$data);
    }
}
