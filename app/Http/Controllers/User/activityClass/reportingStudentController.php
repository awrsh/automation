<?php

namespace App\Http\Controllers\User\activityClass;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class reportingStudentController extends Controller
{
    public function Reporting()
    {
        return view('User.ActivityClass.reporting_student');
    }

    public function getReportstudent()
    {
        $str = "";
        $i = 1;
        $student = Student::where('student_student_class', \request()->class_id)->get();
        foreach ($student as $item) {
            $str .= "<tr>
                    <td>$i</td>
                     <td>$item->student_firstname - $item->student_lastname</td>
                      <td> $item->student_father_name</td>
                      
                       <td><a href='".route('activity_class.ReportScoresClassStudent')."/".$item->student_id."'  class='btn btn-sm btn-primary'>گزارش نمرات کلاسی</a></td>
                       
                            <td><a href='".route('activity_class.getStudyingexerciseList', $item)."' class='btn btn-sm btn-primary'>گزارش نمرات تکالیف</a></td>
                        </tr> ";
            $i++;
        }
        return $str;
    }

    public function ReportScoresClassStudent($id)
    {
      $student = Student::where('student_id',$id)->first();
        return view('User.ActivityClass.Studying_reportList',compact('student'));
    }

    public function ReportScoresExerciseStudent(Student $student)
    {

        return view('User.ActivityClass.Studying_exercisetList',compact('student'));

    }
}
