<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use File;
use App\Manager_cadidate_and_post;
use App\Candidate;
use App\PostEmployer;
use App\CandidateProfile;
class FrontendActionController extends Controller
{
    //Yêu thích
    public function frontendLoveAction(Request $request)
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

    //Ứng tuyển
    public function frontendApplyAction($id)
    {
        if(!Auth::check())
        {
            echo '<script>alert("Bạn chưa đăng nhập.Vui lòng đăng nhập")</script>';
            echo '<script>window.location.href="ung-vien/dang-nhap.html"</script>';
            exit;
        }else
        {
            //Kiểm tra có phải là người tìm việc hay không?
            $user=Auth::user();
            if(!$user->type='candidate')
            {
                echo '<script>alert("Tài khoản của bạn không phải là người tìm việc")</script>';
                echo '<script>window.location.href="/"</script>';
                exit;
            }else
            {
                //Kiểm tra đã bổ sung thông tin cá nhân chưa
                $id_user=$user->id;
                $candidate=Candidate::where('user_id',$id_user)->first();
                if(!$candidate)
                {
                    echo '<script>alert("Vui lòng bổ sung thông tin cá nhân để kích hoạt tài khoản")</script>';
                    echo '<script>window.location.href="ung-vien/thong-tin-tai-khoan.html"</script>';
                    exit;
                }                
            }
        }    

        //Kiểm tra user có sở hữu hồ sơ này k
        $user=Auth::user();
        $candidate=$user->candidate;
        $candidate_id=$candidate->id;
        $manager_cadidate_and_posts=Manager_cadidate_and_post::where([['candidate_id',$candidate_id],['post_id',$id]])->first();
        if(isset($manager_cadidate_and_posts))
        {
            if($manager_cadidate_and_posts->type_apply==1)
            {
                echo '<script>alert("Bạn đã ứng tuyển bài viết này")</script>';
                echo '<script>history.go(-1);</script>';
                exit;
            }
        }

        //Lấy thông tin bài viết hiện tại
        $post=PostEmployer::find($id);   
        if(!isset($post))
        {
            return redirect('/');
        }
        $data['post']=$post;
        $data['id']=$id;
        //Lấy hồ sơ của tài khoản
        $candidate_profile=$user->candidate->candidateProfile;
        $data['candidate_profile']=$candidate_profile;

        return view('frontend.apply.select_apply',$data);
    }

    public function frontendPostsApplyAction($id,Request $request)
    {
        if(!Auth::check())
        {
            echo '<script>alert("Bạn chưa đăng nhập.Vui lòng đăng nhập")</script>';
            echo '<script>window.location.href="ung-vien/dang-nhap.html"</script>';
            exit;
        }else
        {
            //Kiểm tra có phải là người tìm việc hay không?
            $user=Auth::user();
            if(!$user->type='candidate')
            {
                echo '<script>alert("Tài khoản của bạn không phải là người tìm việc")</script>';
                echo '<script>window.location.href="/"</script>';
                exit;
            }else
            {
                //Kiểm tra đã bổ sung thông tin cá nhân chưa
                $id_user=$user->id;
                $candidate=Candidate::where('user_id',$id_user)->first();
                if(!$candidate)
                {
                    echo '<script>alert("Vui lòng bổ sung thông tin cá nhân để kích hoạt tài khoản")</script>';
                    echo '<script>window.location.href="ung-vien/thong-tin-tai-khoan.html"</script>';
                    exit;
                }                
            }
        }    

        if($request->has('cv') && $request->cv!='cv_file')
        {
            //Kiểm tra user có sở hữu hồ sơ này k
            $user=Auth::user();
            $id_cv=$request->cv;
            $candidate_profile=CandidateProfile::find($id_cv);
            $candidate=$user->candidate;
            $candidate_id=$candidate->id;
            if($candidate_id!=$candidate_profile->candidate_id)
            {
                echo '<script>alert("Bạn không có quyền sở hữu hồ sơ này")</script>';
                exit;
            }
            //Lưu dữ liệu
            //Kiểm tra có dòng này chưa, có rồi thì sửa, chưa có thì thêm
            $manager_cadidate_and_posts=Manager_cadidate_and_post::where([['candidate_id',$candidate_id],['post_id',$id]])->first();
            if(!isset($manager_cadidate_and_posts))
            {
                //Thêm dòng mới
                $row=new Manager_cadidate_and_post;
                $row->candidate_id=$candidate_id;
                $row->post_id=$id;
                $row->type=0;
                $row->type_apply=1;
                $row->candidate_profile_id=$candidate_profile->id;
                $row->save();
                echo '<script>alert("Ứng tuyển thành công")</script>';
                echo '<script>history.go(-1);</script>';
                exit;
            }else
            {
                $row=$manager_cadidate_and_posts;
                if($row->type_apply==1)
                {
                    echo '<script>alert("Bạn đã ứng tuyển bài viết này")</script>';
                    echo '<script>history.go(-1);</script>';
                    exit;
                }
                $row->type_apply=1;
                $row->candidate_profile_id=$candidate_profile->id;
                $row->save();
                echo '<script>alert("Ứng tuyển thành công")</script>';
                echo '<script>history.go(-1);</script>';
                exit;
            }
        }else if($request->has('cv') && $request->has('cv_file') && $request->cv='cv_file')
        {
            //Kiểm tra user có sở hữu hồ sơ này k
            $user=Auth::user();
            $id_cv=$request->cv;
            $candidate_profile=CandidateProfile::find($id_cv);
            $candidate=$user->candidate;
            $candidate_id=$candidate->id;

            $file=$request->file('cv_file');
            $arr_file=['pdf','doc','docx'];
            $type_file=$file->getClientOriginalExtension();
            if(!in_array($type_file,$arr_file))
            {
                echo '<script>alert("Chỉ được upload đuôi pdf,doc,docx")</script>';
                echo '<script>history.go(-1);</script>';
                exit;
            }
            $name_file=str_random(10).$file->getClientOriginalName();
            while(File::exists('public/out_cv/'.$name_file))
            {
                $name_file=str_random(10).$file->getClientOriginalName();
            }

            //Kiểm tra có dòng này chưa, có rồi thì sửa, chưa có thì thêm
            $manager_cadidate_and_posts=Manager_cadidate_and_post::where([['candidate_id',$candidate_id],['post_id',$id]])->first();
            if(!isset($manager_cadidate_and_posts))
            {
                //Thêm dòng mới
                $row=new Manager_cadidate_and_post;
                $row->candidate_id=$candidate_id;
                $row->post_id=$id;
                $row->type=0;
                $row->type_apply=1;
                $row->url_cv_out=$name_file;
                $row->save();
                $file->move('public/out_cv',$name_file);
                echo '<script>alert("Ứng tuyển thành công")</script>';
                echo '<script>history.go(-1);</script>';
                exit;
            }else
            {
                $row=$manager_cadidate_and_posts;
                if($row->type_apply==1)
                {
                    echo '<script>alert("Bạn đã ứng tuyển bài viết này")</script>';
                    echo '<script>history.go(-1);</script>';
                    exit;
                }
                //Xóa file cũ
                $old_name=$row->url_cv_out;
                if($old_name!='')
                {
                    while(File::exists('public/out_cv/'.$old_name))
                    {
                        File::delete('public/out_cv/'.$old_name);
                    }
                }
                $row->type_apply=1;
                $row->url_cv_out=$name_file;
                $file->move('public/out_cv',$name_file);
                $row->save();
                echo '<script>alert("Ứng tuyển thành công")</script>';
                echo '<script>history.go(-1);</script>';
                exit;
            }
        }
    }
}
