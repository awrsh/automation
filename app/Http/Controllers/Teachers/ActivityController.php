<?php

namespace App\Http\Controllers\Teachers;

use App\ClassScoresModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;

class ActivityController extends Controller
{
    public function ClassScores()
    {
        return view('Teachers.Pannel.ScoreClasses');
    }

    public function getStudents__Ajax(Request $request)
    {

        $students = Student::where('student_student_class', $request->class_id)
            ->where('school_id', auth()->guard('teacher')->user()->school_id)
            ->get();
        $student_list = '';
        $i = 0;
        foreach ($students as $item) {
            $student_list .= "<tr>
                        <td>$i</td>
                         <td>$item->student_firstname - $item->student_lastname</td>
                          <td> $item->student_father_name</td>
                           <td><input name='scores[$item->student_id]' class='form-control col-md-2 col-sm-12' type='number'></td>
                            </tr> ";
            $i++;
        }
        return response($student_list);
    }



    public function InsertClassScores(Request $request)
    {


        $request->validate([
            'lesson_id' => 'required',
            'azmoon_group' => 'required',


        ], [
            'lesson_id.required' => 'نام درس را انتخاب کنید',
            'azmoon_group.required' => 'مورد ازمون را وارد کنید',

        ]);
        if (strlen(implode($request->scores)) == 0) {
            return back()->with('Error', 'موردی ثبت نشد');
        } else {
            foreach ($request->scores as $key => $value) {
                if ($value !== null) {
                    ClassScoresModel::create([
                        'class_scores_date' => $request->azmoon_group,
                        'score' => $value,
                        'student_id' => $key,
                        'lesson_id' => $request->lesson_id
                    ]);
                }
            }
            return back()->with('success', 'نمرات با موفقیت ثبت شد');
        }
    }


    public function AddExerciseDailyView()
    {
        return view('Teachers.Pannel.AddExerciseDaily');
    }

    public function AddExerciseScoresView()
    {
        return view('Teachers.Pannel.ExerciseScoreView');
    }
}
