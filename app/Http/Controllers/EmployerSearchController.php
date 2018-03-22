<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\CandidateProfile;
use App\Company_save_candidate;
use MyLibrary;
use Auth;
class EmployerSearchController extends Controller
{
    public function pageSearch()
    {   
        //Lây danh sách nghành
        $data['category']=Category::get();
        //Lấy danh sách setting
        $data['sex']=Mylibrary::getSetting('sex');
        $data['city']=Mylibrary::getSetting('city');
        $data['level']=Mylibrary::getSetting('level');
        $data['slary']=Mylibrary::getSetting('slary');
        $data['experience']=Mylibrary::getSetting('experience');

        $list_search_ajax=[];
        $list_profile=CandidateProfile::where('status',1)->get();
        foreach($list_profile as $k=>$v)
        {
            $list_search_ajax[]='"'.$v->title.'"';
        }
        $list_search_ajax=implode(',',$list_search_ajax);    
        $data['list_search_ajax']=$list_search_ajax;
        return view('employer.search.page_search',$data);
    }

    public function searchResult(Request $request)
    {   
        //Số trang
        $page=1;
        if($request->has('page')) $page=$request->page;
        $data['old_keyword']='';
        $data['old_category_id']='all';
        $data['old_level']='all';
        $data['old_slary']='all';
        $data['old_city']='all';
        //Lấy giá trị input cũ
        $list_profile=CandidateProfile::select('*')->where('status',1);
        if($request->has('keyword') && $request->keyword!='')
        {
            $data['old_keyword']=$request->keyword;
            $list_profile=$list_profile->where('title','like','%'.$request->keyword.'%');
        }
        if($request->has('category_id') && $request->category_id!='all')
        {
            $data['old_category_id']=$request->category_id;
            $list_profile=$list_profile->where('category_id',$request->category_id);
        }
        if($request->has('level') && $request->level!='all')
        {
            $data['old_level']=$request->level;
            $list_profile=$list_profile->where('level',$request->level);
        }
        if($request->has('slary') && $request->slary!='all')
        {
            $data['old_slary']=$request->slary;
            $list_profile=$list_profile->where('slary',$request->slary);
        }
        if($request->has('city') && $request->city!='all')
        {
            $data['old_city']=$request->city;
            $list_profile=$list_profile->where('city',$request->city);
        }
        $total_profile=$list_profile->count();
        $data['total_profile']=$total_profile;
        $data['post_of_page']=10;
        //Lấy theo số trang
        $list_profile=$list_profile->skip($page-1)->take($data['post_of_page']);
        $list_profile=$list_profile->get();
        $data['list_profile']=$list_profile;

        //Số trang
        $data['page']=$page;
        
        $total_page=ceil($total_profile/$data['post_of_page']);
        $data['total_page']=$total_page;

        //Lấy các hồ sơ đã lưu của công ty này
        $user=Auth::user();
        $company_id=$user->company->id;
        $save_profile=Company_save_candidate::where([['company_id',$company_id],['status',1]])->get();
        $list_save_profile=[];
        foreach($save_profile as $v)
        {
            $list_save_profile[]=$v->id;
        }
        $data['list_save_profile']=$list_save_profile;

        //Lây danh sách nghành
        $data['category']=Category::get();
        //Lấy danh sách setting
        $data['sex']=Mylibrary::getSetting('sex');
        $data['city']=Mylibrary::getSetting('city');
        $data['level']=Mylibrary::getSetting('level');
        $data['slary']=Mylibrary::getSetting('slary');
        $data['experience']=Mylibrary::getSetting('experience');


        //List search ajax
        $list_search_ajax=[];
        $list_profile=CandidateProfile::where('status',1)->get();
        foreach($list_profile as $k=>$v)
        {
            $list_search_ajax[]='"'.$v->title.'"';
        }
        $list_search_ajax=implode(',',$list_search_ajax);    
        $data['list_search_ajax']=$list_search_ajax;

        return view('employer.search.result_search',$data);
    }

    //Chi tiết CV ứng viên
    public function getDetailCvCandidate($id)
    {
        //Lấy thông tin của cv ứng tuyển
        $candidate_profile=CandidateProfile::find($id);
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

    //Lưu ưng viên vào tài khoản của mình
    public function saveCvAction($id)
    {
        //Kiểm tra có tồn tại CV này không
        $candidate_profile=CandidateProfile::find($id);
        if(!isset($candidate_profile))
        {
            echo '<script>alert("CV không hợp lệ")</script>';
            echo '<script>history.go(-1)</script>';
            exit;
        }
        //Lấy id người đăng nhập
        $user=Auth::user();
        $company_id=$user->company->id;

        //Kiểm tra đã có tồn tại dòng lưu chưa (chưa thì tạo)
        $company_save_candidate=Company_save_candidate::where([['company_id',$company_id],['candidate_profile_id',$id]])->first();
        if(!isset($company_save_candidate))
        {
            //Chưa có tiền hành tạo
            $row=new Company_save_candidate;
            $row->company_id=$company_id;
            $row->candidate_profile_id=$id;
            $row->status=1;
            $row->save();
            return redirect()->back();
        }else
        {
            $company_save_candidate->status=1;
            $company_save_candidate->save();
            return redirect()->back();
        }
    }
}
