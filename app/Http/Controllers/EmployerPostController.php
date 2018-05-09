<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostEmployeRequest;
use MyLibrary;
use Auth;
use URL;
use App\Company;
use App\PostEmployer;
use App\Tag;
use App\Category;
use App\Manager_cadidate_and_post;
use App\CandidateProfile;
class EmployerPostController extends Controller
{
    /*Nhà tuyển dụng quản lí*/
    public function employerGetListPost()
    {
        //Lấy id người đăng nhập
        $user=Auth::user()->toArray();
        $user_id=$user['id'];
        $company=Company::where('user_id',$user_id)->get()->toArray();
        $company_id=$company[0]['id'];
        //Lấy danh sách tin của cong ty đó
        $list_post=PostEmployer::where('company_id',$company_id)->orderBy('id','desc')->get()->toArray();
        $data['list_post']=$list_post;
        return view('employer.post.list_post',$data);
    }

    /**Thêm tin */
    public function employerGetAddEmployer()
    {
        $data['list_sex']=MyLibrary::getSetting('sex');
        $data['list_working_form']=MyLibrary::getSetting('working_form');
        $data['level']=MyLibrary::getSetting('level');
        $data['experience']=MyLibrary::getSetting('experience');
        $data['slary']=MyLibrary::getSetting('slary');
        $data['time_try']=MyLibrary::getSetting('time_try');
        $data['city']=MyLibrary::getSetting('city');
        //Lấy danh sách ngành
        $data['category']=Category::get();
        return view('employer.post.post',$data);
    }

    public function employerPostAddEmployer(PostEmployeRequest $request)
    {
        //Lấy id người đăng nhập
        $user=Auth::user()->toArray();
        $user_id=$user['id'];
        $company=Company::where('user_id',$user_id)->get()->toArray();
        $company_id=$company[0]['id'];
        //Tạo bài tuyển dụng mới
        $new_post=new PostEmployer;
        $new_post->company_id=$company_id;
        $new_post->title=$request->title;
        $new_post->qty_candidate=$request->qty_candidate;
        $new_post->sex=$request->sex;
        $new_post->desc=$request->desc;
        $new_post->requirement=$request->requirement;
        $new_post->working_form=$request->working_form;
        $new_post->level=$request->level;
        $new_post->experience=$request->experience;
        $new_post->slary=$request->slary;
        $new_post->time_try=$request->time_try;
        $new_post->workplace=$request->workplace;
        $new_post->benefit=$request->benefit;
        //Xử lí category
        $arr_category=$request->category;
        $stamp_arr_cate=[];
        if(count($arr_category)>5){
            $i=1;
            foreach($arr_category as $v)
            {
                if($i>5)
                {
                    break;
                }
                $stamp_arr_cate[]=$v;
                $i++;
            } 
            $arr_category=$stamp_arr;
        }
        $new_post->category_id=json_encode($arr_category);

        $new_post->expiration_date=date('y-m-d',strtotime($request->expiration_date));
        $new_post->status=0;
        $new_post->view=1;
        //Thông tin liên hệ
        $arr_contact=[
            'name_contact'=>$request->name_contact,
            'email_contact'=>$request->email_contact,
            'address_contact'=>$request->address_contact,
            'mobile_contact'=>$request->mobile_contact
        ];
        $new_post->contact=json_encode($arr_contact);
        //Xử lí thẻ tag
        $arr_tag=$request->tags;
        $stamp_arr=[];
        if(count($arr_tag)>5)
        {
            $i=1;
            foreach($arr_tag as $k=>$v)
            {
                if($i>5)
                {
                    break;
                }
                $stamp_arr[]=$v;
                $i++;
            } 
            $arr_tag=$stamp_arr;
        }
        $new_post->tags=json_encode($arr_tag);
        $new_post->save();
        //id vừa thêm vào là
        $new_id=$new_post->id;
        //Thêm tag vào bảng tag
        if(count($arr_tag)>0)
        {
            foreach($arr_tag as $k=>$v)
            {
                $tag=new Tag;
                $tag->post_id=$new_id;
                $tag->name=$v;
                $tag->save();
            }
        }
        return redirect('employer/danh-sach-tin.html')->with('message',['status'=>'success','content'=>'Thêm bài tuyển dụng thành công']);
    }
    /**Sửa tin */
    public function employerGetEditEmployer($id)
    {
        //Kiểm tra tin này có thuốc user này hay không
        $user=Auth::user()->toArray();
        $user_id=$user['id'];
        $company=Company::where('user_id',$user_id)->get()->toArray();
        $company_id=$company[0]['id'];
        //Lấy thông tin hiện tại
        $current_post=PostEmployer::find($id);
        if(!isset($current_post))
        {
            return redirect('employer/danh-sach-tin.html')->with('message',['status'=>'danger','content'=>'Bài viết không tồn tại']);
        }
        $current_post=$current_post->toArray();
        if($current_post['company_id']!=$company_id && $current_post['status']!=3)
        {
            return redirect('employer/danh-sach-tin.html')->with('message',['status'=>'danger','content'=>'Bài viết không thuộc sở hữu của bạn']);
        }
        $data['current_post']=$current_post;
        //Lấy thông tin người liên hệ
        $detail_contact=json_decode($current_post['contact'],true);
        $data['detail_contact']=$detail_contact;
        //Lấy các thẻ tag của bài viết này
        $tags=json_decode($current_post['tags'],true);
        $data['tags']=$tags;
        //id bài viết
        $data['id']=$id;

        $data['list_sex']=MyLibrary::getSetting('sex');
        $data['list_working_form']=MyLibrary::getSetting('working_form');
        $data['level']=MyLibrary::getSetting('level');
        $data['experience']=MyLibrary::getSetting('experience');
        $data['slary']=MyLibrary::getSetting('slary');
        $data['time_try']=MyLibrary::getSetting('time_try');
        $data['city']=MyLibrary::getSetting('city');
        //Lấy danh sách ngành
        $category=json_decode($current_post['category_id'],true);
        $data['category']=$category;
        return view('employer.post.edit_post',$data);
    }
    public function employerPostEditEmployer($id,PostEmployeRequest $request)
    {
        //Lấy id người đăng nhập
        $user=Auth::user()->toArray();
        $user_id=$user['id'];
        $company=Company::where('user_id',$user_id)->get()->toArray();
        $company_id=$company[0]['id'];
        //Lấy thông tin hiện tại
        $current_post=PostEmployer::find($id);
        if(!isset($current_post))
        {
            return redirect('employer/danh-sach-tin.html')->with('message',['status'=>'danger','content'=>'Bài viết không tồn tại']);
        }
        $current_post=$current_post->toArray();
        if($current_post['company_id']!=$company_id && $current_post['status']!=3)
        {
            return redirect('employer/danh-sach-tin.html')->with('message',['status'=>'danger','content'=>'Bài viết không thuộc sở hữu của bạn']);
        }

        //Tạo bài tuyển dụng mới
        $new_post=PostEmployer::find($id);
        $new_post->company_id=$company_id;
        $new_post->title=$request->title;
        $new_post->qty_candidate=$request->qty_candidate;
        $new_post->sex=$request->sex;
        $new_post->desc=$request->desc;
        $new_post->requirement=$request->requirement;
        $new_post->working_form=$request->working_form;
        $new_post->level=$request->level;
        $new_post->experience=$request->experience;
        $new_post->slary=$request->slary;
        $new_post->time_try=$request->time_try;
        $new_post->workplace=$request->workplace;
        $new_post->benefit=$request->benefit;
        $new_post->expiration_date=date('y-m-d',strtotime($request->expiration_date));

        //Xử lí category
        $arr_category=$request->category;
        $stamp_arr_cate=[];
        if(count($arr_category)>5){
            $i=1;
            foreach($arr_category as $v)
            {
                if($i>5)
                {
                    break;
                }
                $stamp_arr_cate[]=$v;
                $i++;
            } 
            $arr_category=$stamp_arr;
        }
        $new_post->category_id=json_encode($arr_category);

        //Thông tin liên hệ
        $arr_contact=[
            'name_contact'=>$request->name_contact,
            'email_contact'=>$request->email_contact,
            'address_contact'=>$request->address_contact,
            'mobile_contact'=>$request->mobile_contact
        ];
        $new_post->contact=json_encode($arr_contact);
        //Xử lí thẻ tag
        $arr_tag=$request->tags;
        $stamp_arr=[];
        if(count($arr_tag)>5)
        {
            $i=1;
            foreach($arr_tag as $k=>$v)
            {
                if($i>5)
                {
                    break;
                }
                $stamp_arr[]=$v;
                $i++;
            } 
            $arr_tag=$stamp_arr;
        }
        $new_post->tags=json_encode($arr_tag);
        $new_post->save();
        //id vừa thêm vào là
        $new_id=$id;
        //Xóa tag cũ
        $old_tag=Tag::where('post_id',$new_id)->get();
        foreach($old_tag as $v)
        {
            $v->delete();
        }
        //Thêm tag vào bảng tag
        if(count($arr_tag)>0)
        {
            foreach($arr_tag as $k=>$v)
            {
                $tag=new Tag;
                $tag->post_id=$new_id;
                $tag->name=$v;
                $tag->save();
            }
        }
        return redirect('employer/danh-sach-tin.html')->with('message',['status'=>'success','content'=>'Cập nhập bài tuyển dụng thành công!!']);
    }
    public function employerPostRemoveEmployer($id)
    {
        //Lấy id người đăng nhập
        $user=Auth::user()->toArray();
        $user_id=$user['id'];
        $company=Company::where('user_id',$user_id)->get()->toArray();
        $company_id=$company[0]['id'];
        //Lấy thông tin hiện tại
        $current_post=PostEmployer::find($id);
        if(!isset($current_post))
        {
            return redirect('employer/danh-sach-tin.html')->with('message',['status'=>'danger','content'=>'Bài viết không tồn tại']);
        }
        $current_post=$current_post->toArray();
        if($current_post['company_id']!=$company_id && $current_post['status']!=3)
        {
            return redirect('employer/danh-sach-tin.html')->with('message',['status'=>'danger','content'=>'Bài viết không thuộc sở hữu của bạn']);
        }
        $post=PostEmployer::find($id);
        $post->status=3;
        $post->save();
        return redirect('employer/danh-sach-tin.html')->with('message',['status'=>'warning','content'=>'Hủy thành công. Vui lòng liên hệ quản trị viên nếu muốn khôi phục']);
    }

    //Danh sách người ứng tuyển bài viết này
    public function getListApply($id)
    {
        //Lấy id người đăng nhập
        $user=Auth::user()->toArray();
        $user_id=$user['id'];
        $company=Company::where('user_id',$user_id)->get()->toArray();
        $company_id=$company[0]['id'];
        //Lấy thông tin hiện tại
        $current_post=PostEmployer::find($id);
        if(!isset($current_post))
        {
            return redirect('employer/danh-sach-tin.html')->with('message',['status'=>'danger','content'=>'Bài viết không tồn tại']);
        }
        $current_post=$current_post->toArray();
        if($current_post['company_id']!=$company_id && $current_post['status']!=3)
        {
            return redirect('employer/danh-sach-tin.html')->with('message',['status'=>'danger','content'=>'Bài viết không thuộc sở hữu của bạn']);
        }
        //Kiểm tra bài viết hết hạn chưa
        if($current_post['status']!=1)
        {
            return redirect('employer/danh-sach-tin.html')->with('message',['status'=>'warning','content'=>'Bài viết chưa được duyệt hoặc đã hết hạn']);
        }

        //Lấy tất cả người dùng đã ứng tuyển bài viết này
        $Manager_cadidate_and_post=Manager_cadidate_and_post::where([['post_id',$id],['type_apply',1]])->get();
        $data['Manager_cadidate_and_post']=$Manager_cadidate_and_post;
        return view('employer.apply.list_apply_post',$data);
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
            return redirect(URL('/').'/public/out_cv/'.$url_cv_out);
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
    }
}
