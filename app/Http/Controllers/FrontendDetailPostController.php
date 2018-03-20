<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostEmployer;
use MyLibrary;
use Auth;
use App\Manager_cadidate_and_post;
class FrontendDetailPostController extends Controller
{
    public function getDetailPost($id)
    {
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
        //Kiểm tra bài viết có đc yêu thích hay chưa?
        if(Auth::check())
        {
            $user=Auth::user();
            if($user->type=="candidate")
            {
                $candidate_id=$user->candidate->id;
                $check_love=Manager_cadidate_and_post::where([['candidate_id',$candidate_id],['type',1],['post_id',$id]])->first();
                if(isset($check_love))
                {
                    $data['check_love']=1;
                }
            }
        }

        //Lấy 3 việc làm liên quan đầu tiên
        $relationship_post=PostEmployer::where([['category_id',$post->category_id],['status',1]])->skip(0)->take(3)->orderBy('created_at','desc')->get();
        $data['relationship_post']=$relationship_post;

        //Danh sách các bài viết đã ưa thích
        if(Auth::check())
        {
            $user=Auth::user();
            if($user->type=="candidate")
            {
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
            }
        }
        return view('frontend.detail_post.detail_post',$data);
    }
}
