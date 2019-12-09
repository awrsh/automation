<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LessonModel;
use App\Models\Student;

class ExerciseController extends Controller
{


    public function __construct()
    {
        $this->middleware('authStudent');
    }


    public function ExerciseDailyView()
    {
        // $student =Student::find(1);
        // $student->exercise_dailies()->detach(1);
        // dd($student->exercise_dailies);
        $student = auth()->user();
        $lessons = LessonModel::where('basic_id',$student->getBasicId())->get();
        return view('Students.Pannel.ExerciseDailyView',compact(['student','lessons']));
    }


    public function ExerciseDailyInsert(Request $request)
    {   
        
     $student = auth()->user();
     
        // if ($student->exercise_dailies->contains(2)) {
        //     return 'dsfss';
        // };

   if ($request->status !== null) {
    if(strlen(implode($request->status)) == 0){
        return back()->with('Error','موردی ثبت نشد');
    }else{
      
       foreach ($request->status as $exercise_id) {

         try {
           $student->exercise_dailies()->attach($exercise_id);
         } catch (\Illuminate\Database\QueryException $ex){ 
           return back()->with('Error','مواردی که انتخاب کردید احتمالا قبلا ثبت شده است لطفا اگر مورد جدیدی دارید ثبت کنید');
         }
             //throw $th;
         
       }
       return back()->with('success','با موفقیت ثبت شد');
    }
   }else{
    return back()->with('Error','موردی ثبت نشد');
   }



    }
}
