<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LessonModel;
use App\StudiesModel;
use App\StudiesStudentsModel;
use Carbon\Carbon;
use Morilog\Jalali\Jalalian;

class MainController extends Controller
{

   public function __construct()
{
    $this->middleware('authStudent');
} 
    public function Dashboard()
    {
         
        $student = auth()->user();
       
       /*
        $count = 6;
        $day_list = [];
        $day_studies =[];
        for ($i=0; $i <$count ; $i++) { 
            $count_study=0;
           $day_list[]= Jalalian::forge(Carbon::now()->subDays($i))->format('%A');
           $day_studies_day  = StudiesStudentsModel::where('studies_students_date',Carbon::now()->subDays($i)->format('Y-m-d 00:00:00'))->get();
           foreach ($day_studies_day as $key => $value) {
              $count_study .= $value->studies_students_count;
           }
           $day_studies [] =$count_study;
        }

        */


        $basic=$student->getBasicId();

       $lessons = LessonModel::where('basic_id',$basic)->get();
       $lessons_name = LessonModel::where('basic_id',$basic)->pluck('lesson_name');

        $study_count =[];
       foreach ($lessons as $key => $value) {
        
        if($student->getStudies()->where('lesson_id',$value->id)
        ->where('studies_students_date','>',Carbon::now()->subDays(7)->format('Y-m-d 00:00:00'))
        ->where('studies_students_date','<',Carbon::now()->format('Y-m-d 00:00:00'))
        ->first() != null){
       $study_count[] = json_encode($student->getStudies()->where('lesson_id',$value->id)->first()->studies_students_count);
        }else{
            $study_count[] = '0';
        }   
       }
       
        return view('Students.Pannel.Dashboard',compact(['student','lessons_name','study_count']));
    }

    public function DisciplineReport()
    {
        $student = auth()->user();
        return view('Students.Pannel.DisciplineReport',compact('student'));
    }

    public function StudyingReport()
    {
        $student = auth()->user();
        $lessons = LessonModel::where('basic_id',$student->getBasicId())->get();
        return view('Students.Pannel.StudyingReport',compact(('lessons')));
    }

    public function StudyingReportInsert(Request $request)
    {
        $request->validate([
            'studies_students_date' => 'required',
     
        ], [
            'studies_students_date.required' => 'تاریخ انجام مطالعه را وارد کنید',       
        ]);
        
     $class_id = auth()->user()->getClass()->first()->class_id;
     if(strlen(implode($request->lesson_id)) == 0){
        return back()->with('Error','هیچ موردی برای ثبت وارد نشده است');
     }
     foreach ($request->lesson_id as $key=>$lesson_count) {
         if ($lesson_count !== null) {

           if(is_numeric($lesson_count)){
            StudiesStudentsModel::create([
                'studies_students_date' => $request->studies_students_date,
                'studies_students_count' => $lesson_count,
                'lesson_id' => $key,
                'studies_id' => StudiesModel::where('class_id',$class_id)->first()->id,
                'student_id' => auth()->user()->student_id

            ]);
           }else{
            return back()->with('Error','لطفا مدت زمان را به صورت عددی وارد کنید');
           }
          }
        }

        return back()->with('success','عملیات با موفقیت انجام شد');

    }

    public function StudyingReportList()
    {
        $student = auth()->user();
        $lessons = LessonModel::where('basic_id',$student->getBasicId())->get();
        return view('Students.Pannel.StudyReportList',compact('student','lessons'));
    }


    public function EditProfileView()
    {
        return view('Students.Pannel.EditProfile');
    }
}
