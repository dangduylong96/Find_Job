<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class EmployerMiddleware
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
        if(Auth::check() && Auth::user()->toArray()['type']=='employer')
        {
            return $next($request);
        }
        return redirect('/employer/dang-nhap.html');
    }
}
