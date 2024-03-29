<?php

namespace App\Http\Controllers\Teachers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\TeacherLessons;
use Illuminate\Support\Facades\Auth;

class DisciplineController extends Controller
{
    public function __construct()
    {
        $this->middleware('authTeacher');
    }
    public function DisciplineList()
    {
        $count = 0;

        $teacher_lessons =Auth::Guard('teacher')->user()->teacher_lessons()->get();
       $classes= Auth::Guard('teacher')->user()->teacher_lessons()->pluck('class_name','class_id');
       
        return view('Teachers.Pannel.DisciplineList',compact(['teacher_lessons','classes','count']));
    }

    public function DisciplineShow(Student $student)
    {
        return view('Teachers.Pannel.DisciplineShow',compact('student'));
    }

    public function AddDisciplineView()
    {
        
     
        $teacher_lessons =Auth::Guard('teacher')->user()->teacher_lessons()->get();
        return view('Teachers.Pannel.AddDiscipline',compact('teacher_lessons'));
    }
}
