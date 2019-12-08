<?php

namespace App\Http\Controllers\User\activityClass;

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
        dd($request->all());
        if ($request->has('status')) {
            $id_law = DisciplineLawsModel::where('law_title', 'اخراج از کلاس')->first()['law_id'];
            foreach (\request('status') as $item) {
                DisciplineCaseModel::create(array(
                    'student_id' => $item,
                    'law_id' => $id_law,
                    'case_date' => $request->case_date,
                    'case_descriotion' => $request->case_description,
                    'case_effect' => $request->case_effect,
                ));
            };
            return back()->with('success','ثبت اخراج از کلاس با موفقیت انجام شد');
        } else {
            return back()->with('error', 'هیچ دانش آموزی انتخاب نشده است');
        }


    }
}
