<?php

namespace App\Http\Controllers\User\activityClass;

use App\Models\ClassModel;
use App\PresentClassModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatusAbsence extends Controller
{
    public function Status_absence()
    {
        
        $classes = ClassModel::get();
        return view('User.ActivityClass.Status_Absence', compact('classes'));
    }

    public function GetClass()
    {
        $classes = ClassModel::where('basic_id', \request()->basic)->get();
        return view('User.ActivityClass.Status_Absence', compact('classes'));
    }

    public function insertAbsence()
    {
        if (\request()->lesson ==''){
            return back()->with('error','درسی انتخاب نشده است');
        }else {

//             if (\request()->status==null || \request()->status ==""){
//
//             }

            foreach (\request()->students as $key => $item) {

                PresentClassModel::create([
                    'present_class_id' => \request()->basic,
                    'present_class_date' => \request()->case_date,
                    'present_status' => $item,
                    'class_id' => \request()->class_id,
                    'lesson_id' => \request()->lesson,
                    'student_id' => $key
                ]);
            }
            return back()->with('success','ثبت با موفقیت انجام شد');
        }
    }
}




