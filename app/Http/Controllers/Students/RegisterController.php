<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function RegisterView()
    {
        return view('Students.Register.Register');
    }

    public function LoginView()
    {
        return view('Students.Register.Login');
    }
    
   

    public function Login(Request $request)
    {
      
    
            $user = Student::where('student_student_number', $request->student_number)->first();
            if($user){
                if (($request->input('student_password') ==  $request->student_password)) {
                    if ($request->has('rememberme')) {
                        Auth::login($user,true);
                        $request->session()->flash('Success', 'ورود با موفقیت انجام شد .');
                    return redirect()->route('Student.WorkSpace.Dashboard');
                    } else {
                        Auth::login($user);
			            $request->session()->flash('Success', 'ورود با موفقیت انجام شد .');
                        return redirect()->route('Student.WorkSpace.Dashboard');
                    }
                  
                } else {
                    $request->session()->flash('Error', 'رمز عبور شما صحیح نمی باشد .');
                    return back();
                }
            } else {
                $request->session()->flash('Error', ' شماره دانش اموزی صحیح نمی باشد .');
                return back();
            }
        

       
    }



}
