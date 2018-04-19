<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostEmployeRequest;
use MyLibrary;
use App\PostEmployer;
use App\Tag;
class AmdminPostEmployerController extends Controller
{
    /*Nhà tuyển dụng quản lí*/
    public function adminGetListPost()
    {
        //Lấy danh sách tin của tất cả công ty và công ty đó phải kích hoạt
        $list_post=PostEmployer::join('company','post_employers.company_id','=','company.id')->select('post_employers.id as id','post_employers.title as title','post_employers.expiration_date as expiration_date','post_employers.status as status','company.name as name')->where('company.status',1)->orderBy('post_employers.id','desc')->get();
        $data['list_post']=$list_post;
        return view('admin.post.list_post',$data);
    }
    /**Sửa tin */
    public function adminGetEditEmployer($id)
    {
        //Lấy thông tin hiện tại
        $current_post=PostEmployer::find($id);
        if(!isset($current_post))
        {
            return redirect('admin/danh-sach-tin.html')->with('message',['status'=>'danger','content'=>'Bài viết không tồn tại']);
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
        //Lấy danh sách ngành
        $category=json_decode($current_post['category_id'],true);
        $data['category']=$category;

        $data['list_sex']=MyLibrary::getSetting('sex');
        $data['list_working_form']=MyLibrary::getSetting('working_form');
        $data['level']=MyLibrary::getSetting('level');
        $data['experience']=MyLibrary::getSetting('experience');
        $data['slary']=MyLibrary::getSetting('slary');
        $data['time_try']=MyLibrary::getSetting('time_try');
        $data['city']=MyLibrary::getSetting('city');
        return view('admin.post.edit_post',$data);
    }
    public function adminPostEditEmployer($id,PostEmployeRequest $request)
    {
        //Lấy thông tin hiện tại
        $current_post=PostEmployer::find($id);
        if(!isset($current_post))
        {
            return redirect('employer/danh-sach-tin.html')->with('message',['status'=>'danger','content'=>'Bài viết không tồn tại']);
        }
        $current_post=$current_post->toArray();

        //Sửa bài tuyển dụng mới
        $new_post=PostEmployer::find($id);
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
        //Kiểm tra so với ngày hiện
        $curent_date=date('Y-m-d H:i:s');
        $curent_date=strtotime($curent_date);
        if(strtotime($request->expiration_date)<$curent_date)
        {
            $new_post->status=4;
        }else
        {
            $new_post->status=0;
        }
        //Thông tin liên hệ
        $arr_contact=[
            'name_contact'=>$request->name_contact,
            'email_contact'=>$request->email_contact,
            'address_contact'=>$request->address_contact,
            'mobile_contact'=>$request->mobile_contact
        ];
        $new_post->contact=json_encode($arr_contact);
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
        return redirect('admin/danh-sach-tin.html')->with('message',['status'=>'success','content'=>'Cập nhập bài tuyển dụng thành công']);
    }
    /*Duyệt tin*/
    public function adminCheckPost($id)
    {
        //Lấy thông tin hiện tại
        $current_post=PostEmployer::find($id);
        if(!isset($current_post))
        {
            return redirect('admin/danh-sach-tin.html')->with('message',['status'=>'danger','content'=>'Bài viết không tồn tại']);
        }
        $current_post->status=1;
        $current_post->save();
        return redirect('admin/danh-sach-tin.html')->with('message',['status'=>'success','content'=>'Duyệt bài tuyển dụng thành công']);
    }
    /*Không duyệt*/
    public function adminUnCheckPost($id)
    {
        //Lấy thông tin hiện tại
        $current_post=PostEmployer::find($id);
        if(!isset($current_post))
        {
            return redirect('admin/danh-sach-tin.html')->with('message',['status'=>'danger','content'=>'Bài viết không tồn tại']);
        }
        $current_post->status=3;
        $current_post->save();
        return redirect('admin/danh-sach-tin.html')->with('message',['status'=>'success','content'=>'Bài tuyển dụng đã ở trạng thái k được duyệt(hủy)']);
    }
}
