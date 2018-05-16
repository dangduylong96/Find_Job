<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Mail;
use URL;
use App\Check_job;
use App\PostEmployer;
use App\Register_email;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $url=url()->full();
        if($url!=URL('/').'/ung-vien/dang-nhap2.html' || $url!=URL('/').'/ung-vien/thong-tin-tai-khoan2.html'){
            session()->put('url_back',$url);
        }
        // Ngày giờ hiện tại
        $curent_date=date('Y-m-d H:i:s');
        //k xóa sử dụng phần dưới
        $curent_date2=date('Y-m-d H:i:s');
        $curent_date=strtotime($curent_date);


        //*******Cập nhập bài viết hết hạn
        //Ngày cập nhập cuối cùng
        $check_job=Check_job::first();
        $update_date=strtotime($check_job->updated_at);
        if($curent_date>$update_date)
        {
            $post=PostEmployer::where([['expiration_date','<',date('Y-m-d H:i:s')],['status','!=',2]])->get();
            foreach($post as $k=>$v)
            {
                $post_expirent=PostEmployer::find($v->id);
                $post_expirent->status=2;
                $post_expirent->save();
            }
            //Cập nhập lại ngày
            if($check_job->status=1)
            {
                $check_job->status=0;
            }else{
                $check_job->status=1;                
            }
            $check_job->save();
        }


        //*******Gửi mail cho những email đã đăng kí
        /*
            Dòng đầu tiên trong bảng Register_email là dòng kiểm tra hôm nay đã gửi mail cho ai chưa qua
            cột status
        */
        $row_check=Register_email::find(1);
        $update_date=strtotime($row_check->updated_at);
        //Ngày update cuối cùng +1 ngày
        $update_date_last=strtotime("+1 day", strtotime($row_check->updated_at));
        /*
            Nếu ngày hôm nay lớn hơn ngày update cuối +1 ngày, có nghĩa là tin nào đăng 1 ngày sau mới gửi
            cho các ứng viên qua email. Việc cập nhập đc thực hiện mỗi ngày 1 lần
        */
        //Ngày hôm nay -1 ngày là
        $last_day=date('Y-m-d',strtotime("-1 day", $curent_date));

        if($curent_date>$update_date_last){
            $list_cate_update=[];
            //Lấy các bài viết mới thêm từ hôm qua đến hôm nay
            $new_post=PostEmployer::where([['created_at','>=',$last_day],['status',1]])->get();
            if(isset($new_post)){
                foreach($new_post as $v){
                    //Gửi cho các email có category của tin đã đăng ( 1 tin thuộc nhiều ngành)
                    $category=json_decode($v->category_id);
                    foreach($category as $v_cate){
                        //Lấy mảng với key là id_cate và value là id bài viết
                        if(isset($list_cate_update[$v_cate])){
                            array_push($list_cate_update[$v_cate],$v->id);
                        }else{
                            $list_cate_update[$v_cate]=[$v->id];
                        }
                    }
                }
            }
            //Tiến hành gửi mail
            if(count($list_cate_update)>0){
                //k chính là id cate và v là mảng id các bài viết
                foreach($list_cate_update as $k=>$v){
                    //Lấy các email đã đăng kí cái category này
                    $list_email=Register_email::where('category_id',$k)->get();
                    foreach($list_email as $v_mail){
                        //Vì v là mảng các bài viết nên ta có thể làm như sau
                        $data=[
                            'id_post'=>$v
                        ];
                        Mail::send('mail.mail_job', $data, function ($message) use ($v_mail) {
                            $message->from('nh0xpr0py5@gmail.com', 'Job Pro');                
                            $message->to($v_mail->email, 'Ứng viên')->subject('Find Job xin giới thiệu một số việc làm sẽ phù hợp với bạn');
                        });
                    }  
                }
            }
            //Cập lại ngày hôm nay đã gửi mail cập nhập
            if($row_check->status==0){
                $row_check->status=1;
                $row_check->save();
            }else{
                $row_check->status=0;
                $row_check->save();
            }
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
