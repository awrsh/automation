<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Student;

class MainController extends Controller
{ 
     public function index()
     {
         return view('User.Students.Register');
     }

     public function Register(Request $request)
     {
      
        $request->validate([
            'student_photo' => 'mimes:jpeg,png,jpg|dimensions:max_width=75,max_height=100',
            'national_number' => 'numeric',

        ],[
           'student_photo.mimes'=>'فرمت فایل صحیح نیست',
           'student_photo.dimensions'=>'اندازه عکس مناسب نیست',
           'national_number.digits' => 'شماره ملی بایستی شامل اعداد باشد',
           'national_number.between' => 'تعداد ارقام شماره ملی تایید نشد',

        ]);
      

       
  
  
   
   Student::create([
    'school_id' => 1,
    'student_firstname' =>  $request->firstname,
    'student_lastname' =>  $request->lastname,
    'student_certificate_number' =>  $request->certificate_number,
    'student_national_number' =>  $request->national_number,
    'student_father_name' =>  $request->father_name,
    'student_father_mobile' =>  $request->father_mobile,
    'student_mother_mobile' =>  $request->mother_mobile,
    'student_birthday' =>  $request->birthday,
    'student_student_section' =>  $request->student_section,
    'student_student_basic' =>  $request->student_basic,
    'student_student_class' =>  $request->student_class,
    'student_student_number' =>  $request->student_number,
    'student_home_tel' =>  $request->home_tel,
    'student_student_mobile' =>  $request->student_mobile,
    'student_prev_school' =>  $request->prev_school,
    'student_student_photo' =>  'dss'
   ]);

    return back()->with('success','دانش اموز با موفقیت ثبت شد') ;
     }

     public function ImportWithExcel()
     {
    
         return view('User.Students.ImportData');
     }


     
     public function UploadPhoto()
     {
         return view('User.Students.UploadPhoto');
     }

     public function AlbumPhoto()
     {
         return view('User.Students.AlbumPhoto');
     }


     public function EditClass()
     {
         return view('User.Students.EditClass');
     }


}
