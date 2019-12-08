<?php

namespace App\Http\Controllers\Teachers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function RegisterView()
    {
        return view('Teachers.Register.Register');
    }

    public function LoginView()
    {
        return view('Teachers.Register.Login');
    }
    
   

    public function Login(Request $request)
    {

            $teacher = Teacher::where('teacher_email', $request->teacher_email)->first();

            if($teacher){
                if (($request->input('teacher_password') ==  $teacher->teacher_password)) {
                    if ($request->has('rememberme')) {
                        Auth::Guard('teacher')->Login($teacher,true);
                        $request->session()->flash('Success', 'ورود با موفقیت انجام شد .');
                    return redirect()->route('Teachers.WorkSpace.Dashboard');
                    } else {
                        Auth::Guard('teacher')->Login($teacher);
			            $request->session()->flash('Success', 'ورود با موفقیت انجام شد .');
                        return redirect()->route('Teachers.WorkSpace.Dashboard');
                    }
                  
                } else {
                    $request->session()->flash('Error', 'رمز عبور شما صحیح نمی باشد .');
                    return back();
                }
            } else {
                $request->session()->flash('Error', ' ایمیل وارد شده اشتباه است');
                return back();
            }
        

       
    }

    public function LogOut() {
       
        Auth::Guard('teacher')->logout();
        return redirect()->route('Teachers.WorkSpace.LoginView');
      }



}
