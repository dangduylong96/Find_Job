<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostEmployeRequest;
use MyLibrary;
use Auth;
use App\Company;
use App\PostEmployer;
use App\Tag;
class PostEmployerController extends Controller
{
    /*Admin quản lí*/



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
        return redirect('employer/danh-sach-tin.html')->with('message',['status'=>'success','content'=>'Cập nhập bài tuyển dụng thành công']);
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
}
