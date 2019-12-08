<?php

namespace App\Http\Controllers\Teachers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function EditProfile(Teacher $teacher,Request $request)
    {

        $request->validate([
            'student_photo' => 'mimes:jpeg,png,jpg',
            'teacher_email' => Rule::unique('teachers')->ignore($request->teacher_id)
        ], [
            'student_photo.mimes' => 'فرمت فایل صحیح نیست',    
            'teacher_email.unique' => 'ایمیل وارد شده از قبل وجود دارد',
        ]);

       $teacher->update([
            'teacher_fullname' => $request->teacher_fullname,
            'teacher_email' => $request->teacher_email,
            'teacher_profile' => $request->teacher_profile,
            'teacher_mobile' => $request->teacher_mobile,
            'teacher_biography' => $request->teacher_biography,
            'teacher_address' => $request->teacher_address,
            'teacher_birthplace' => $request->teacher_birthplace
       ]);

       return back()->with('success','ویرایش با موفقیت انجام شد');
    }
}
