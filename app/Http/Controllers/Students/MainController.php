<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LessonModel;
use App\StudiesModel;
use App\StudiesStudentsModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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
       if ($request->study_model == "0") {
        return back()->with('Error','در حال حاظر الگوی مطالعه ای وجود ندارد');

       }
        $request->validate([
            'studies_students_date' => 'required',
            'study_model' => 'required',
            'lesson_id' => 'required',
            'count' => 'required'

        ], [
            'studies_students_date.required' => 'تاریخ انجام مطالعه را وارد کنید',    
            'study_model.required' => 'الگوی مطالعاتی را انتخاب کنید',   
            'lesson_id.required' => 'درس مورد نظر را انتخاب کنید',   
            'count.required' => 'میزان مطالعه را وارد کنید',      
        ]);
        
     $class_id = auth()->user()->getClass()->first()->class_id;
    if (StudiesStudentsModel::where('studies_id',$request->study_model)
    ->where('lesson_id',$request->lesson_id)
    ->where('student_id',auth()->user()->student_id)->count()) {
        return back()->with('Error','میزان مطالعه برای این درس ثبت شده است');

    }else{
        StudiesStudentsModel::create([
            'studies_students_date' => $this->convertDate($request->studies_students_date),
            'studies_students_count' => $request->count,
            'lesson_id' => $request->lesson_id,
            'studies_id' => $request->study_model,
            'student_id' => auth()->user()->student_id

        ]);
        return back()->with('success','عملیات با موفقیت انجام شد');
    }
          
          
          
        

       

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

    public function getStudyModel(Request $request)
    {
        $student=Auth::guard('student')->user();
        $studies=StudiesModel::where('class_id',$student->student_student_class)
        ->where('lesson_id',$request->lesson_id)->where('school_id',$student->school_id)
        ->where('studies_start_date','<=',Carbon::now())
        ->where('studies_end_date','>=',Carbon::now())
        ->get();
        $options = ' <option selected="">باز کردن فهرست انتخاب</option>';
        foreach ($studies as $item) {
            $options .= ' <option value="' . $item->id . '">' . $item->studies_name . '</option>';
        }


        return response($options);
        
    }
}
