<?php

namespace App\Http\Controllers\User\Studing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LessonModel;
use App\Models\ClassModel;
use App\StudiesModel;
use App\StudiesStudentsModel;
use Carbon\Carbon;
use Morilog\Jalali\Jalalian;

class StudingController extends Controller
{
    public function StudyingModels()
    {
        return view('User.Studying.StudyingInsert');
    }


    public function getStudyClasses(Request $request)
    {
        $classes = ClassModel::where('basic_id', $request->basic_id)->get();
        $options = ' <option value="" selected="">باز کردن فهرست انتخاب</option>';
        foreach ($classes as $item) {
            $options .= ' <option value="' . $item->class_id . '">' . $item->class_name . '</option>';
        }



           $lesson_array =  LessonModel::where('basic_id',$request->basic_id)->get();






          $table = '<table class="table table-striped table-bordered example2">
            <thead>
                <tr>
                    <th>ردیف</th>
                    <th>نام درس</th>
                    <th> مدت زمان مطالعه بر حسب دقیقه</th>
                   
                 
                </tr>
            </thead>
            <tbody>';

            foreach ($lesson_array as $key=>$item) {


               $table .=' <tr>
                        <td>'.$key++.' </td>
                        <td>'.$item->lesson_name.'</td>
                        <td>                       
                            <input name="id_lesson['.$item->id.']" type="text" style="width: 50px">         
                        </td>

                        

                        
                 </tr>';
            }



           $table .= '</tbody>

        </table>';
        return response([$options,$table]);
}



        public function InsertStudy(Request $request)
        {




            $validatedData = $request->validate([
                'studies_name' => 'required',

                'studies_date' => 'required',

                'class' => 'required',

            ], [
                'class.required' => 'نام کلاس الزامی است',

                'studies_date.required' => ' لطفا بازه زمانی را انتخاب کنید',

                'studies_name.required' => 'نام مورد مطالعاتی الزامی می باشد',
                // 'basic_id.required' => 'پایه را انتخاب کنید',
            ]);




            if ($request->studies_date == 'یک سال') {
                $request->case_start_date = Carbon::now();
                $request->case_end_date = Carbon::now()->addYear();
            }

            if ($request->studies_date == 'انتخاب بازه زمانی') {
                $request->case_start_date = $this->convertDate($request->case_start_date);
                $request->case_end_date = $this->convertDate($request->case_end_date);
            }





           foreach ($request->id_lesson as $key=>$item) {

            StudiesModel::create([
                'studies_name' => $request->studies_name,
                'studies_count' => $item,
                'studies_start_date' => $request->case_start_date,
                'studies_end_date' => $request->case_end_date,
                'lesson_id' =>$key,
                'school_id' => session()->get('ManagerSis')['id'],
                'class_id' => $request->class

            ]);
           }

            return back()->withInput()->with('success','مورد مطالعاتی با موفقیت اضافه شد');
        }




        public function StudyingReport()
        {
            return view('User.Studying.StudyingReport');
        }


        public function getStudyingReport(Request $request)
        {



      $classes=ClassModel::where('basic_id',$request->basic)->get();


      $class_lists = ' <h5 class="card-title">     وضعیت مطالعاتی دروس به تفکیک کلاس </h5>';


      $class_lists .='<ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">';

      foreach ($classes as $key=>$item){

      if ($key == 0){
          $class_lists .=  '<li class="nav-item">
              <a class="nav-link active" id="pills-'.$item->class_id.'-tab" data-toggle="pill" href="#pills-'.$item->class_id.'" role="tab" aria-controls="pills-home" aria-selected="true"> '.$item->class_name.'</a>
      </li>';
       } else{
          $class_lists .= '<li class="nav-item">
             <a class="nav-link " id="pills-'.$item->class_id.'-tab" data-toggle="pill" href="#pills-'.$item->class_id.'" role="tab" aria-controls="pills-home" aria-selected="true"> '.$item->class_name.'</a>
      </li>';
       }
      }


      $class_lists .= '</ul>
  ';





  $class_lists .='<div class="tab-content my-5" id="pills-tabContent2">';

foreach ($classes as $key=>$item){
        if ($key == 0){
          $class_lists .='  <div class="tab-pane fade show active" id="pills-'.$item->class_id.'" role="tabpanel" aria-labelledby="pills-all-tab">
                ';

                $class_lists .= '
                <table class="table table-striped table-bordered example2">
                <thead>
                    <tr>
                    <th>ردیف</th>
                    <th> نام و نام خانوادگی </th>
                    <th class="text-success">  بیش از حد مطلوب</th>
                    <th> مطابق الگو  </th>
                    <th class="text-danger">     کمتر از حد مطلوب  </th>      
                    </tr>
                </thead>
                <tbody>
                ';
      if(\App\Models\Student::where('student_student_class',$item->class_id)->count()){
          foreach ( \App\Models\Student::where('student_student_class',$item->class_id)->get() as $student){

        // $studeis = $student->whereHas('getStudies',function($query) use($request){
        //         $query->where('studies_students_date', '>', $this->convertDate($request->start_date))
        //         ->where('studies_students_date', '<', $this->convertDate($request->end_date));
        // })->get();
       $studeis = StudiesStudentsModel::where('student_id',$student->student_id)
       ->where('studies_students_date', '>', $this->convertDate($request->start_date))
       ->where('studies_students_date', '<', $this->convertDate($request->end_date))
       ->get();
           $excelentStudy =0;
           $badStudy=0;
           $normalStudy =0;


           foreach ( $studeis as $key => $value) {

               if($value->StudyName->studies_count < $value->studies_students_count){
                    $excelentStudy ++;
               }elseif($value->StudyName->studies_count > $value->studies_students_count){
                $badStudy++;
               }else{
                $normalStudy ++;
               }
           }
                          $class_lists .=' <tr>
                          <td> '.($key+1).' </td>
                          
                          <td>
                          <a href="'.route('Studing.StudyingReportListStudent',$student).'?basic='.$request->basic.'" >
                          '.$student->student_firstname.' '.$student->student_lastname.' 
                           </a>
                          
                          </td>
                          <td>'. $excelentStudy .'</td>
                          <td>'.$normalStudy.'</td>
                        
                          <td >'.$badStudy.'</td>
                        

        
                   </tr>';
                        }
                    }else{
                        $class_lists .='  <td>دانش اموزی برای این کلاس ثبت نشده است</td>
            ';
                    }

                        $class_lists .='  </tbody>
                                  
                        </table></div>
            ';
        }else{

          $class_lists .='<div class="tab-pane fade" id="pills-'.$item->class_id.'" role="tabpanel" aria-labelledby="pills-all-tab">
    ';
    $class_lists .= '
    <table class="table table-striped table-bordered example2">
    <thead>
        <tr>
        <th>ردیف</th>
        <th> نام و نام خانوادگی </th>
        <th>  بیش از حد مطلوب</th>
        <th> مطابق الگو  </th>
        <th>     کمتر از حد مطلوب  </th>
        </tr>
    </thead>
    <tbody>
    ';
    if(\App\Models\Student::where('student_student_class',$item->class_id)->count()){

          foreach ( \App\Models\Student::where('student_student_class',$item->class_id)->get() as $student){
            $studeis=  $student->getStudies;
             //   برحسب تاریخ اضافه شود
        //    $studeis=  $student->getStudies->where('studies_students_date',);
            $excelentStudy =0;
            $badStudy=0;
            $normalStudy =0;


            foreach ( $studeis as $key => $value) {
                if($value->StudyName->studies_count < $value->studies_students_count){
                     $excelentStudy ++;
                }elseif($value->StudyName->studies_count > $value->studies_students_count){
                 $badStudy++;
                }else{
                 $normalStudy ++;
                }
            }
                           $class_lists .=' <tr>
                           <td> '.($key+1).' </td>
                           <td>
                            <a href="'.route('Studing.StudyingReportListStudent',$student).'?basic='.$request->basic.'" >
                            '.$student->student_firstname.' '.$student->student_lastname.' 
                            </a>           
                          </td>
                           <td>'. $excelentStudy .'</td>
                           <td>'.$normalStudy.'</td>
                         
                           <td >'.$badStudy.'</td>
                          
         
          
                   </tr>';
            }
        }else{
            $class_lists .='  <td>دانش اموزی برای این کلاس ثبت نشده است</td>
';
        }

            $class_lists .='  </tbody>
                                  
            </table></div>
';
        }
}

$class_lists .='</div>';


return $class_lists;


        }
}
