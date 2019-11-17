<?php

namespace App\Http\Controllers\User\Discipline;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DisciplineCaseModel;
use App\Models\DisciplineLawsModel;

class DisciplineController extends Controller
{
    public function AddCase(Request $request)
    {



        $request->validate([
            'case_date' => 'required',
            'law_id' => 'required',
            'case_effect' => 'required',
         
        ],[
           
            'case_date.required' => 'زمان ثبت الزامی است',
            'law_id.required' => 'لطفا عنوان مورد را انتخاب نمایید',
            'case_effect.required' => 'تاثیر مورد انظباطی روی نمره را وارد کنید',
        ]);


        DisciplineCaseModel::create([
            'student_id' => $request->student_id,
            'case_date' => $request->case_date,
            'law_id' => $request->law_id,
            'case_descriotion' => $request->case_descriotion,
            'case_effect' => $request->case_effect,
        ]);


        return back()->with('success','مورد انضباطی با موفقیت ثبت شد');
    }
}
