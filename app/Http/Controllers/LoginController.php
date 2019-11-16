<?php

namespace App\Http\Controllers;

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
            'school_password' =>md5(request()->post('password')),
        ])->get();
        if (count($res) > 0) {
           return \redirect(\route('Dashboard'));
        } else {
            return view('Form.login')->with('error','اطلاعات وارد شده اشتباه است');

        }
    }
}
