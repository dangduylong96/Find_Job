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
                if(isset($user->candidate->id)){
                    $candidate_id=$user->candidate->id;
                    $check_love=Manager_cadidate_and_post::where([['candidate_id',$candidate_id],['type',1],['post_id',$id]])->first();
                    if(isset($check_love))
                    {
                        $data['check_love']=1;
                    }
                }
            }
        }
        //Lấy 3 việc làm liên quan đầu tiên
        $arr_cate_relate=json_decode($post->category_id);
        // $relationship_post=PostEmployer::whereIn('id', [3,5])->where('status',1)->skip(0)->take(3)->orderBy('created_at','desc')->get();
        $result_relationship=[];
        $relationship_post=PostEmployer::where('status',1)->orderBy('created_at','desc')->get();
        foreach($relationship_post as $v){
            if(count($result_relationship)<3){
                $arr_cate=json_decode($v->category_id);
                foreach($arr_cate_relate as $v1){
                    if(in_array($v1,$arr_cate)){
                        $result_relationship[]=$v;
                    }
                }
            }else{
                break;
            }
        }
        $data['relationship_post']=$result_relationship;

        //Danh sách các bài viết đã ưa thích
        if(Auth::check())
        {
            $user=Auth::user();
            if($user->type=="candidate")
            {
                if(isset($user->candidate)){
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
                    echo '<script>alert("Vui lòng bổ sung thông tin cá nhân để kích hoạt tài khoản trước khi yêu thích hoặc ứng tuyển")</script>';
                    echo '<script>window.location.href="ung-vien/thong-tin-tai-khoan2.html"</script>';
                    exit;
                }
            }
        }
        return view('frontend.detail_post.detail_post',$data);
    }
}
