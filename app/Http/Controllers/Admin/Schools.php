<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\PasswordListSchoolModel;
use App\Models\School;

class Schools extends Controller
{
    public function AddSchool()
    {
      
       $school = School::create([
            'school_name'=>request()->post('nameSchool'),
            'school_sections'=>request()->post('school_section'),
            'school_name_manager'=>request()->post('nameManager'),
            'school_phone_manager'=>request()->post('mobile_manager'),
            'school_username'=>request()->post('username'),
            'school_password'=>md5(request()->post('password')),
            'school_url'=>request()->post('url'),
            'school_count_students'=>request()->post('count_students'),
            'school_address'=>request()->post('address_school'),
            'school_status'=>'off'
        ]);

        PasswordListSchoolModel::create([
            'school_id'=>$school->school_id,
            'pass_txt'=>request()->post('password')
            ]);

            return back()->with('success', 'مدرسه  با موفقیت ثبت شد');
    }
}
