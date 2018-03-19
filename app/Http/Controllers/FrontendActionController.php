<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Manager_cadidate_and_post;
use App\Candidate;
use App\PostEmployer;
class FrontendActionController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Auth::check())
            {
                $message=[
                    'status'=>'404',
                    'content'=>'Bạn chưa đăng nhập.Vui lòng đăng nhập để thêm mục yêu thích',
                    'link'=>'http://localhost:90/Find_Job/ung-vien/dang-nhap.html'                
                ];
                echo json_encode($message);
                exit;
            }else
            {
                //Kiểm tra có phải là người tìm việc hay không?
                $user=Auth::user();
                if(!$user->type='candidate')
                {
                    $message=[
                        'status'=>'404',
                        'content'=>'Tài khoản của bạn không phải là người tìm việc',
                        'link'=>'http://localhost:90/Find_Job/ung-vien/thong-tin-tai-khoan.html'
                    ];
                    echo json_encode($message);
                    exit;
                }else
                {
                    //Kiểm tra đã bổ sung thông tin cá nhân chưa
                    $id_user=$user->id;
                    $candidate=Candidate::where('user_id',$id_user)->first();
                    if(!$candidate)
                    {
                        $message=[
                            'status'=>'404',
                            'content'=>'Vui lòng bổ sung thông tin cá nhân để kích hoạt tài khoản',
                            'link'=>'http://localhost:90/Find_Job/ung-vien/thong-tin-tai-khoan.html'
                        ];
                        echo json_encode($message);
                        exit;
                    }                
                }
            }    
            return $next($request);
        });
        
    }
    //Yêu thích
    public function frontendLoveAction(Request $request)
    {
        //Lấy id và hành động của thêm hoặc loại bỏ
        $id=$request->id;

        //Kiểm tra id bài post có tồn tại hay không?
        $post=PostEmployer::find($id);
        if(!isset($post))
        {
            $message=[
                'status'=>'404',
                'content'=>'Có lỗi phát sinh',
                'link'=>'#'                
            ];
            return json_encode($message);
        }
        if($post->status==3)
        {
            $message=[
                'status'=>'404',
                'content'=>'Có lỗi phát sinh',
                'link'=>'#'                
            ];
            return json_encode($message);
        }

        $user=Auth::user();
        $id_user=$user->id;
        $candidate=Candidate::where('user_id',$id_user)->first();
        //kiểm tra bài viết đã yêu thích hoặc tồn tại chưa
        $manager_cadidate_and_post=Manager_cadidate_and_post::where([['candidate_id',$candidate->id],['post_id',$id]])->first();
        if(!isset($manager_cadidate_and_post))
        {
            $row=new Manager_cadidate_and_post;
            $row->candidate_id=$candidate->id;
            $row->post_id=$id;
            $row->type=1;
            $row->type_apply='';
            $row->save();
            $message=[
                'status'=>'200',
                'content'=>'Yêu thích bài viết thành công. Bạn có thể tìm bài viết trong mục quản lí yêu thích'        
            ];
            return json_encode($message);
        }else
        {
            $type=$manager_cadidate_and_post->type;
            if($type=1)
            {
                $manager_cadidate_and_post->type=0;
                $message=[
                    'status'=>'200',
                    'content'=>'Hủy yêu thích thành công'        
                ];
            }else
            {
                $manager_cadidate_and_post->type=1;
                $message=[
                    'status'=>'200',
                    'content'=>'Yêu thích bài viết thành công. Bạn có thể tìm bài viết trong mục quản lí yêu thích'        
                ];
            }
            $manager_cadidate_and_post->save();
            return json_encode($message);
        }
    }
}
