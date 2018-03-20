<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostEmployer;
use MyLibrary;
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
        //Lấy 3 việc làm liên quan đầu tiên

        //Lấy 3 việc làm liên quan cuối

        return view('frontend.detail_post.detail_post',$data);
    }
}
