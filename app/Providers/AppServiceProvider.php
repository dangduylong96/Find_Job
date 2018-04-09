<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Check_job;
use App\PostEmployer;

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
        //Ngày giờ hiện tại
        $curent_date=date('Y-m-d H:i:s');
        $curent_date=strtotime($curent_date);
        //Ngày cập nhập cuối cùng
        $check_job=Check_job::first();
        $update_date=strtotime($check_job->updated_at);
        if($curent_date>$update_date)
        {
            $post=PostEmployer::all();
            foreach($post as $k=>$v)
            {
                $exp_post=strtotime($v->expiration_date);
                if($exp_post<$curent_date)
                {
                    $post_expirent=PostEmployer::find($v->id);
                    $post_expirent->status=2;
                    $post_expirent->save();
                }
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
