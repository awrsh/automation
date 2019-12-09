<?php

namespace App\Http\Controllers\User\activityClass;

use App\ClassScoresModel;
use App\LessonModel;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassScoreController extends Controller
{
    public function index()
    {
        return view('User.ActivityClass.ClassScore');
    }

    public function getlesson()
    {
        $str = "";
        $lessens = LessonModel::where('basic_id', \request()->basic_id)->get();
        foreach ($lessens as $item) {
            $str .= "<option value='$item->id'>$item->lesson_name</option>";
        }
        return response($str);
    }

    public function getStudent()
    {
        $str = "";
        $i = 1;
        $student = Student::where('student_student_class', \request()->class_id)->get();
        foreach ($student as $item) {
            $str .= "<tr>
                    <td>$i</td>
                     <td>$item->student_firstname - $item->student_lastname</td>
                      <td> $item->student_father_name</td>
                       <td><input name='scores[$item->student_id]' class='form-control col-md-2 col-sm-12' type='number'></td>
                        </tr> ";
            $i++;
        }
        return response($str);
    }

    public function insertClassScore()
    {
        foreach (\request()->scores as $key => $item) {
            ClassScoresModel::create([
                'class_scores_date' => \request()->date,
                'score' => $item,
                'student_id' => $key,
                'lesson_id' => \request()->lesson
            ]);
        }
        return back()->with('success','ثبت نمرات با موفقیت انجام شد');
    }
}
