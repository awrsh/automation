<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class authTeacher
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

        if (Auth::Guard('teacher')->check()) {
           
            return $next($request);
        }else{
            return redirect()->route('Teachers.WorkSpace.Login');
        }
    }
}
