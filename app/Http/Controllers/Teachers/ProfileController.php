<?php

namespace App\Http\Controllers\Teachers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('authTeacher');
    }
    public function EditProfile(Teacher $teacher,Request $request)
    {
      
        $request->validate([
            'student_photo' => 'mimes:jpeg,png,jpg',
            'teacher_email' => Rule::unique('teachers')->ignore($request->teacher_id),
            'teacher_fullname' => 'required'
        ], [
            'student_photo.mimes' => 'فرمت فایل صحیح نیست',    
            'teacher_email.unique' => 'ایمیل وارد شده از قبل وجود دارد',
            'teacher_fullname.required' => 'فیلد نام دبیر نمیتواند خالی باشد'
        ]);
        if ($request->teacher_profile !== null) {
            $fileName = time() .'.'. $request->teacher_profile->getClientOriginalExtension();
           
           
            $request->teacher_profile->move(public_path('uploads/Teachers/Profile/'.$request->teacher_fullname), $fileName);
        }else{
            $fileName =$teacher->teacher_profile;
        }
       $teacher->update([
            'teacher_fullname' => $request->teacher_fullname,
            'teacher_email' => $request->teacher_email,
            'teacher_profile' => $fileName,
            'teacher_mobile' => $request->teacher_mobile,
            'teacher_biography' => $request->teacher_biography,
            'teacher_address' => $request->teacher_address,
            'teacher_birthplace' => $request->teacher_birthplace
       ]);

       return back()->with('success','ویرایش با موفقیت انجام شد');
    }
}
