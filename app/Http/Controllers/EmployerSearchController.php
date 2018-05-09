<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\CandidateProfile;
use App\Company_save_candidate;
use MyLibrary;
use Auth;
use URL;
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
        $list_profile=CandidateProfile::select('*')->where([['status',1],['display',1]]);
        // $list_profile=$list_profile->where('display',1);
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
            $list_save_profile[]=$v->candidate_profile_id;
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
        if(!isset($profile_cv)){
            $data['target']=null;
            $data['experience']=null;
            $data['level']=null;
            $data['english']=null;
            $data['advantages']=null;
            $data['cv']=null;
        }else{
            $data['target']=json_decode($profile_cv->target);
            $data['experience']=json_decode($profile_cv->experience);
            $data['level']=json_decode($profile_cv->level);
            $data['english']=json_decode($profile_cv->english);
            $data['advantages']=json_decode($profile_cv->advantages);
            $data['cv']=$profile_cv->cv;
        }
        

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
            session()->flash('message', 'Lưu thành công!!!');
            return redirect()->back();
        }else
        {
            $company_save_candidate->status=1;
            $company_save_candidate->save();
            session()->flash('message', 'Lưu thành công!!!');
            return redirect()->back();
        }
    }

    //Hủy lưu viên vào tài khoản của mình
    public function removeSaveCvAction($id)
    {
        //Lấy id người đăng nhập
        $user=Auth::user();
        $company_id=$user->company->id;

        //Kiểm tra nhà tuyển dụng có quyền xóa bài lưu này k
        $company_save_candidate=Company_save_candidate::find($id);
        if(!isset($company_save_candidate))
        {
           return redirect('employer/danh-sach-tim-kiem-cv.html')->with('message',['status'=>'warning','content'=>'Không tồn tại bài viết này']);
        }
        if($company_save_candidate->company_id!=$company_id)
        {
            return redirect('employer/danh-sach-tim-kiem-cv.html')->with('message',['status'=>'danger','content'=>'Bạn không có quyền trên cv này!!']);
        } 
        $company_save_candidate->status=0;
        $company_save_candidate->save();
        return redirect('employer/danh-sach-tim-kiem-cv.html')->with('message',['status'=>'success','content'=>'Hủy lưu thành công!!']);
    }

    //Ajax tìm kiếm ứng viên
    public function ajaxSearchResult(Request $request)
    {   
        //Số trang
        $page=1;
        if($request->has('page')) $page=$request->page;
        //Lấy giá trị input cũ
        $list_profile=CandidateProfile::select('*')->where([['status',1],['display',1]]);
        if($request->has('keyword') && $request->keyword!='')
        {
            $list_profile=$list_profile->where('title','like','%'.$request->keyword.'%');
        }
        if($request->has('category_id') && is_array($request->category_id))
        {
            if(!in_array('all',$request->category_id))
            {
                $list_profile=$list_profile->whereIn('category_id',$request->category_id);
            }
        }
        if($request->has('level') && is_array($request->level))
        {
            if(!in_array('all',$request->level))
            {
                $list_profile=$list_profile->whereIn('level',$request->level);
            }
        }
        if($request->has('slary') && is_array($request->slary))
        {
            if(!in_array('all',$request->slary))
            {
                $list_profile=$list_profile->whereIn('slary',$request->slary);                
            }
        }
        if($request->has('city') && is_array($request->city))
        {
            if(!in_array('all',$request->city))
            {
                $list_profile=$list_profile->whereIn('city',$request->city);                
            }
        }
        //Tổng tìm được và số ứng viên mỗi trang
        $total_profile=$list_profile->count();
        $post_of_page=10;
        //Số trang       
        $total_page=ceil($total_profile/$post_of_page);
        //Lấy theo số trang
        $list_profile=$list_profile->skip($page-1)->take($post_of_page);
        $list_profile=$list_profile->get();

        //Lấy các hồ sơ đã lưu của công ty này
        $user=Auth::user();
        $company_id=$user->company->id;
        $save_profile=Company_save_candidate::where([['company_id',$company_id],['status',1]])->get();
        $list_save_profile=[];
        foreach($save_profile as $v)
        {
            $list_save_profile[]=$v->candidate_profile_id;
        }
        $html='';
        foreach($list_profile as $k=>$v)
        {
            $html.='<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <div class="jp_job_post_main_wrapper_cont jp_job_post_grid_main_wrapper_cont"> <div class="jp_job_post_main_wrapper jp_job_post_grid_main_wrapper"> <div class="row"> <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <div class="jp_job_post_side_img"> <img src="'.URL('/').'/'.$v->candidate->image.'" alt="post_img" width="100px" height="95px"/> </div> <div class="jp_job_post_right_cont jp_job_post_grid_right_cont"> <h4>'.substr($v->title,0,50).'</h4> <p>'.substr($v->category->name,0,50).'</p> <ul> <li><i class="fa fa-cc-paypal"></i>&nbsp; '.MyLibrary::getNameSetting('slary',$v->slary).'</li> <li><i class="fa fa-map-marker"></i>&nbsp; '.MyLibrary::getNameSetting('city',$v->city).'</li> </ul> </div> </div> <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <div class="jp_job_post_right_btn_wrapper jp_job_post_grid_right_btn_wrapper"> <ul> <li style="display:none"><a href="javascript:void(0)" class="love_action"><i class="fa fa-heart-o"></i></a></li> <li><a href="cv-ung-vien-'.$v->id.'.html" target="_blank">Xem</a></li>';
            if(!in_array($v->id,$list_save_profile))
            {
                $html.='<li><a href="luu-ung-vien-'.$v->id.'.html">Lưu</a></li>';
            }else
            {
                $html.='<li><a href="javascript:void(0)" style="background-color:#37d09c"><i class="fa fa-check"></i>Đã Lưu</a></li>';
            }
            $html.='</ul> </div> </div> </div> </div> </div> </div>';
        }
        //Hiển thị trang tin
        $html.='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hidden-sm hidden-xs"> <div class="pager_wrapper gc_blog_pagination"> <ul class="pagination">';
        for($i=1;$i<=$total_page;$i++)
        {
            if($i==$page)
            {
                $html.='<li class="active"><a href="javascript:void(0);" class="ajax_page" data-page="'.$i.'">'.$i.'</a></li>';
            }else
            {
                $html.='<li class=""><a href="javascript:void(0);" class="ajax_page" data-page="'.$i.'">'.$i.'</a></li>';
            }            
        }
        $html.='</ul> </div> </div>';

        $msg=[
            'status'=>200,
            'content'=>$html
        ];
        return json_encode($msg);
    }
}
