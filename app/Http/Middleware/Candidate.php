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
            return $next($request);
        }
        return redirect('/ung-vien/dang-nhap.html');
    }
}
