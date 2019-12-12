<?php

namespace App\Http\Controllers\Teachers;

use App\Models\Student;
use App\ClassScoresModel;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BasicModel;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('authTeacher');
    }
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

    public function Status_absence()
    {

        $classes = ClassModel::get();
        return view('Teachers.Pannel.Status_Absence', compact('classes'));
    }

    public function getStudent(Request $request)
    {


        $students = Student::where('student_student_class', $request->class_id)
            ->where('school_id', auth()->guard('teacher')->user()->school_id)
            ->get();
        $class = ClassModel::where('class_id', $request->class_id)->first();



        $student_list = '';
        $i = 1;
        foreach ($students as $key => $item) {
            $student_list .= '<tr>
                    
                     <td>' . $item->student_firstname . ' _ ' . $item->student_lastname . '</td>
                      <td>' . $item->student_student_number . '</td>
                      <td>' . $item->student_student_class . '</td>
                      <td>' . BasicModel::where('basic_id', $class->basic_id)->first()->basic_name . '</td>
                       <td>
                       <input type="hidden" value="غایب" id="sts-' . $i . '" name="students['.$item->student_id.']">
                       <div class="form-group">
                       <div class="custom-control custom-switch">
                           <input type="checkbox"  value="' . $item->student_id . '"
                                  name="status[]"
                                  class="custom-control-input switch"
                                  id="asd-' . $i . '">
                           <label class="custom-control-label"
                                  for="asd-' . $i . '"><span
                                   class="text-danger">غایب</span></label>
                       </div>
                   </div></td>
                        </tr> ';
                        $i++;
        }
        return response($student_list);
    }
}
