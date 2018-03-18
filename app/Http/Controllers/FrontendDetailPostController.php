<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostEmployer;
use MyLibrary;
class FrontendDetailPostController extends Controller
{
    public function getDetailPost($url,$id)
    {
        //Lấy thông tin bài viết hiện tại
        $post=PostEmployer::find($id);
        if(!isset($post))
        {
            return redirect('/');
        }
        $data['post']=$post;
        //Lấy 3 việc làm liên quan đầu tiên

        //Lấy 3 việc làm liên quan cuối

        return view('frontend.detail_post.detail_post',$data);
    }
}
