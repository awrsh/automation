<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Admin\admin;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\PasswordListSchoolModel;

class LoginController extends Controller
{
    public function index()
    {
        return view('FrontEnd.login');
    }


    public function ForgetPassword()
    {
        return view('FrontEnd.ForgetPassword');
    }


    public function CreateAccount()
    {
        return view('FrontEnd.CreateAccount');
    }
    public function Admin()
    {
        return view('FrontEnd.Adminlogin');
    }

    public function login()
    {
    

        $res = School::where([
            'school_username' => request()->post('username'),
            'school_password' => request()->post('password'),
            'school_status' => 'on',
            'school_url' => route('BaseUrl'),
        ])->get();
       
        if (count($res) > 0) {
            // if (request()->has('remember')) {
            //     Auth::loginUsingId($res[0]['school_id'],true);
            // } else {
            //     Auth::loginUsingId($res[0]['school_id']);
            // }
            
            session()->put('ManagerSis', [
                'id' => $res[0]['school_id'],
                'name' => $res[0]['school_name'],
                'username' => $res[0]['school_username'],
                'url' => $res[0]['school_url'],
                'name_manager' => $res[0]['school_name_manager'],
                'phone_manager' => $res[0]['school_phone_manager'],
                'address' => $res[0]['school_address'],
                'profile' => $res[0]['school_profile'],
            ]);
            return \redirect(\route('Dashboard'));
        } else {
            return view('FrontEnd.login')->with('error', 'اطلاعات وارد شده اشتباه است');

        }
    }

    public function SubmitAccount()
    {
        $school = School::create([
            'school_name'=>request()->post('schoolname'),
            'school_sections'=>request()->post('school_section'),
            'school_name_manager'=>request()->post('fullname'),
            'school_phone_manager'=>request()->post('mobile'),
            'school_username'=>request()->post('username'),
            'school_password'=>md5(request()->post('password')),
            'school_url'=>route('BaseUrl'),
            'school_count_students'=>request()->post('student_count'),
            'school_address'=>request()->post('address'),
            'school_status'=>'off'
        ]);

        PasswordListSchoolModel::create([
            'school_id'=>$school->school_id,
            'pass_txt'=>request()->post('password')
            ]);

            return redirect(route('BaseUrl'))->with('success', 'ثبت نام  با موفقیت انجام شد  بزودی با شما تماس گرفته می شود');
    }



    public function loginAdmin()
    {
        
        $res = admin::where([
            'username_admin' => request()->post('username'),
            'password_admin' => request()->post('password'),
        ])->get();
        if (count($res) > 0) {
           
            session()->put('admin', [
                'id' => $res[0]['id'],
                'name' => $res[0]['fullname_admin'],
                'Uasrname' => $res[0]['username_admin']
            ]);
            return \redirect('/Admin');
        } else {
            return view('FrontEnd.Adminlogin')->with('error', 'اطلاعات وارد شده اشتباه است');
        }
    }

  
}
