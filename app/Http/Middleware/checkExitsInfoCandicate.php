<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
class checkExitsInfoCandicate
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
        $user=Auth::user()->toArray();
        $user_id=$user['id'];
        $user=User::find($user_id);
        $candidate=$user->candidate;
        if(!isset($candidate))
        {
            return redirect('/ung-vien/thong-tin-tai-khoan.html');
        }
        return $next($request);
    }
}
