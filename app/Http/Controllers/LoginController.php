<?php

namespace App\Http\Controllers;

use App\Models\Admin\admin;
use App\Models\School;

class LoginController extends Controller
{
    public function index()
    {
        return view('Form.login');
    }
    public function login()
    {

        $res = School::where([
            'school_username' => request()->post('username'),
            'school_password' => md5(request()->post('password')),
            'school_status' => 'on',
            'school_url' => route('BaseUrl'),
        ])->get();
        if (count($res) > 0) {
            session()->put('user', [
                'id' => $res[0]['school_id'],
                'name' => $res[0]['school_name'],
                'url' => $res[0]['school_url'],
                'name_manager' => $res[0]['school_name_manager'],
                'phone_manager' => $res[0]['school_phone_manager'],
                'address' => $res[0]['school_address'],
                'profile' => $res[0]['school_profile'],
            ]);
            return \redirect(\route('Dashboard'));
        } else {
            return view('Form.login')->with('error', 'اطلاعات وارد شده اشتباه است');

        }
    }

    public function loginAdmin()
    {
        
        $res = admin::where([
            'admin_username' => request()->post('username'),
            'admin_password' => md5(request()->post('password')),
        ])->get();
        if (count($res) > 0) {
           
            session()->put('admin', [
                'id' => $res[0]['admin_id'],
                'Uasrname' => $res[0]['admin_username'],
                'pass' => $res[0]['admin_rol'],
            ]);
            return \redirect('/Admin');
        } else {
            return view('Form.Adminlogin')->with('error', 'اطلاعات وارد شده اشتباه است');
        }
    }

    public function Admin()
    {
        return view('Form.Adminlogin');
    }
}
