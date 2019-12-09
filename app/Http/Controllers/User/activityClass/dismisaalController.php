<?php

namespace App\Http\Controllers\User\activityClass;

use App\DismissalModel;
use App\Models\ClassModel;
use App\Models\DisciplineCaseModel;
use App\Models\DisciplineLawsModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class dismisaalController extends Controller
{
    public function exitClass()
    {
        $classes = ClassModel::where('basic_id', 1)->get();
        return view('User.ActivityClass.Dismissal', compact('classes'));
    }

    public function InsertExitClass(Request $request)
    {

       $request->validate([
            'case_date' => 'required',
            'case_effect' => 'required',
            'case_description' => 'required',
            'lesson' => 'required',
        ], [
            'case_date.required' => 'تاریخ را انتخاب کنید',
            'lesson.required' => 'درس را انتخاب کنید',
            'case_effect.required' => 'تاثیر در نمره را انتخاب کنید',
             'case_description.required' => 'توضیحات اخراج را کامل کنید',
         ]);

        if ($request->has('status')) {

            foreach (\request('status') as $item) {
                DismissalModel::create(array(
                    'student_id' => $item,
                    'dismissal_date' => $request->case_date,
                    'dismissal_desc' => $request->case_description,
                    'dismissal_effect' => $request->case_effect,
                    'lesson_id'=> $request->lesson
                ));
            };
            return back()->with('success','ثبت اخراج از کلاس با موفقیت انجام شد');
        } else {
            return back()->with('error', 'هیچ دانش آموزی انتخاب نشده است');
        }


    }
}
