<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Candidate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->toArray()['type']=='candidate')
        {
            if(Auth::user()->candidate->status==2){
                echo '<script>alert("Tài khoản của bạn đã bị khóa do thông tin k hợp lệ, Vui lòng liên hệ quản trị viên để biết thêm chi tiết")</script>';
                echo '<script>window.location.href="dang-nhap.html"</script>';
                // return redirect('/ung-vien/dang-nhap.html');
                exit;
            }
            return $next($request);
        }
        return redirect('/ung-vien/dang-nhap.html');
    }
}
