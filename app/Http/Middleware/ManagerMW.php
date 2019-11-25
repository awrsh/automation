<?php

namespace App\Http\Middleware;

use App\Models\School;
use Closure;

class ManagerMW
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
        $sis=session()->get('ManagerSis');
        $res = School::where(['school_username'=>$sis['username'],'school_status'=>'on'])->get();
         if (count($res)>0) {
             return $next($request);
         }else
         {
             return redirect(route('BaseUrl'))->with('error','اطلاعات وارئ شده صحیح نیست');
         }
    }
}
