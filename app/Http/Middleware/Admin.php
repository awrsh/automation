<?php

namespace App\Http\Middleware;

use App\Models\Admin\admin as AppAdmin;
use Closure;


class Admin
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
        $sis=session()->get('admin');
        
       $res = AppAdmin::where(['admin_username'=>$sis['Uasrname'],'admin_rol'=>'!*^%$'])->get();
        if (count($res)>0) {
            return $next($request);
        }else
        {
            return redirect(route('BaseUrl'))->with('error','اطلاعات وارد شده اشتباه است');
        }
    }
}
