<?php

namespace App\Http\Controllers\User\Studing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LessonModel;
use App\Models\ClassModel;
use App\Models\Student;
use Illuminate\Support\Facades\File;

class StudingClassListController extends Controller
{
    public function StudyingReportList()
    {
        return view('User.Studying.StudyingReportClassList');
    }


    public function getStudyingReportList(Request $request)
    {
        
        
      $classes=ClassModel::where('basic_id',$request->basic)->get();
        

      $class_lists = ' <h5 class="card-title">  لیست مطالعات  کلاسی </h5>';


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
                    <th> نام-نام خانوادگی </th>
                    <th>  نام پدر</th>
                    <th> کد ملی  </th>
                    <th>جزئیات دروس</th>   
                    </tr>
                </thead>
                <tbody>
                ';
               
          foreach ( \App\Models\Student::where('student_student_class',$item->class_id)->get() as $key=>$student){
         if ($student->student_father_name) {
            $fatherName = $student->student_father_name;
         }else{
            $fatherName = 'وارد نشده';
         }
         
             
                          $class_lists .=' <tr>
                          <td> '.($key+1).' </td>
                          <td>'.$student->student_firstname.'-'.$student->student_lastname.'</td>
                          <td>'. $fatherName .'</td>
                          <td>'.$student->student_national_number.'</td>
                        
                          <td >
                          <a href="'.route('Studing.StudyingReportListStudent',$student).'?basic='.$request->basic.'" class="btn btn-info btn-rounded"> مشاهده جزئیات </a>
                          </td>
              

        
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
        <th> نام-نام خانوادگی </th>
        <th>  نام پدر</th>
        <th> کد ملی  </th>
        <th>جزئیات دروس</th>   
        </tr>
    </thead>
    <tbody>
    ';

          foreach ( \App\Models\Student::where('student_student_class',$item->class_id)->get() as $student){
         
            if ($student->student_father_name) {
                $fatherName = $student->student_father_name;
             }else{
                $fatherName = 'وارد نشده';
             }

             
            $class_lists .=' <tr>
            <td> '.($key+1).' </td>
            <td>'.$student->student_firstname.'-'.$student->student_lastname.'</td>
            <td>'. $fatherName .'</td>
            <td>'.$student->student_national_number.'</td>
          
            <td >
            <a href="'.route('Studing.StudyingReportListStudent',$student).'?basic='.$request->basic.'" class="btn btn-info btn-rounded"> مشاهده جزئیات </a>
            </td>


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



    public function StudyingReportListStudent(Request $request,Student $student)
    {
     
      $lessons= LessonModel::where('basic_id',$request->basic)->get();
      
        return view('User.Studying.StudyingSingleStudent',compact(['student','lessons']));
        
    }
}
