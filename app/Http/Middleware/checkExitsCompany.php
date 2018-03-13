<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
class checkExitsCompany
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
        $company=$user->company;
        if(!isset($company))
        {
            return redirect('/employer/thong-tin-cong-ty.html');
        }
        return $next($request);
    }
}
