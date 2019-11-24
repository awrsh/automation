<?php

namespace App\Http\Controllers\User\Studing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LessonModel;
use App\Models\ClassModel;
use App\StudiesModel;

class StudingController extends Controller
{
    public function StudyingModels()
    {
        return view('User.Studying.StudyingInsert');
    }


    public function getStudyClasses(Request $request)
    {
        $classes = ClassModel::where('basic_id', $request->basic_id)->get();
        $options = ' <option selected="">باز کردن فهرست انتخاب</option>';
        foreach ($classes as $item) {
            $options .= ' <option value="' . $item->class_id . '">' . $item->class_name . '</option>';
        }



           $lesson_array =  LessonModel::where('basic_id',$request->basic_id)->get();
            $lessons = '';
            foreach ($lesson_array as $item) {
                $lessons .= ' <option value="' . $item->id . '">' . $item->lesson_name  . '</option>';
            }
            return response([$options,$lessons]);
     
}



        public function InsertStudy(Request $request)
        {
            
            $validatedData = $request->validate([
                'studies_name' => 'required',
                'studies_count' => 'required | numeric',
                'studies_date' => 'required',
                'lesson' => 'required',
                'class' => 'required',

            ], [
                'class.required' => 'نام کلاس الزامی است',
                'lesson.required' => 'نام درس الزامی است',
                'studies_date.required' => ' لطفا بازه زمانی را انتخاب کنید',
                'studies_count.required' => 'لطفا زمان مورد نیاز برای مطالعه را وارد نمایید',
                'studies_count.numeric' => 'مدت زمان مطالعه به صورت عددی وارد شود',
                'studies_name.required' => 'نام مورد مطالعاتی الزامی می باشد',
                // 'basic_id.required' => 'پایه را انتخاب کنید',
            ]);




            StudiesModel::create([
                'studies_name' => $request->studies_name,
                'studies_count' => $request->studies_count,
                'studies_date' => $request->studies_date == 'انتخاب بازه زمانی' ? $request->case_start_date.'-'.$request->case_end_date : $request->studies_date,
                'lesson_id' => $request->lesson,
                'class_id' => $request->class

            ]);

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
            $class_lists .='  </tbody>
                                  
            </table></div>
';
        }
}

$class_lists .='</div>';


return $class_lists;


        }
}
