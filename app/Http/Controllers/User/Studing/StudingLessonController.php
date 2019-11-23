<?php

namespace App\Http\Controllers\User\Studing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LessonModel;
use App\Models\ClassModel;
use App\Models\Student;
use App\StudiesModel;
use App\StudiesStudentsModel;

class StudingLessonController extends Controller
{
    public function StudyingLessonsReport()
    {
       
        return view('User.Studying.StudyingLessonsReport');
    }

    public function StudyingLessonsReportList(Request $request)
    {
      
        
      $classes=ClassModel::where('basic_id',$request->basic)->get();
        

      $class_lists = ' <h5 class="card-title">  لیست مطالعات دانش آموزی </h5>';


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
                    <th> درس </th>
                    <th>دبیر</th>
                    <th> حد مطلوب</th>
                    <th>میانگین مطالعه </th>
                    <th>وضعیت</th>
            
                     
                    </tr>
                </thead>
                <tbody>
                ';

                
               
          foreach (LessonModel::where('basic_id',$request->basic)->get() as $lesson){


        /************
         * 
         * 
         تاریخ اضافه شود
         نام دبیر اضافه شود
         * 
         * 
         * ************* */     
       


        if ($lesson->getRelatedStudySpecialClass($item->class_id)->first() != null) {
            $studyCountLesson = $lesson->getRelatedStudySpecialClass($item->class_id)->first()->studies_count; 
        }else{
            $studyCountLesson = 0;
        }

        $studyStudent_array=StudiesStudentsModel::whereHas('StudyName',function($q) use($lesson,$item){
            $q->where(['lesson_id'=>$lesson->id,'class_id'=>$item->class_id]);
    })->get();
    
    $LessonStudyStudentCount=0; 
    foreach ($studyStudent_array as  $studyStudent) {
        $LessonStudyStudentCount=$LessonStudyStudentCount + $studyStudent->studies_students_count;
    }
     $studentClassCount= Student::where('student_student_class',$item->class_id)->count();
     $averageStudyStudentClass= $LessonStudyStudentCount / $studentClassCount;

     if($averageStudyStudentClass > $studyCountLesson){
        $status = '<a class="text-success">مطلوب</a>';
     }else{
        $status = '<a class="text-danger">نامطلوب</a>';
     }

                           
                          $class_lists .=' <tr>
                          <td> '.(($key++)+1).' </td>
                          <td>'.$lesson->lesson_name.'</td>
                          <td>نام دبیر</td>
                          <td>'.  $studyCountLesson.'</td>
                        
                          <td >'.$averageStudyStudentClass.'</td>
                          <td>'. $status .'</td>

        
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
        <th> درس </th>
        <th>دبیر</th>
        <th> حد مطلوب</th>
        <th>میانگین مطالعه </th>
        <th>وضعیت</th>

            
         
        </tr>
    </thead>
    <tbody>
    ';

          foreach ( \App\Models\Student::where('student_student_class',$item->class_id)->get() as $student){
        
        if ($lesson->getRelatedStudySpecialClass($item->class_id)->first() != null) {
            $studyCountLesson = $lesson->getRelatedStudySpecialClass($item->class_id)->first()->studies_count; 
        }else{
            $studyCountLesson = 0;
        }

        $studyStudent_array=StudiesStudentsModel::whereHas('StudyName',function($q) use($lesson,$item){
            $q->where(['lesson_id'=>$lesson->id,'class_id'=>$item->class_id]);
    })->get();
    
    $LessonStudyStudentCount=0; 
    foreach ($studyStudent_array as  $studyStudent) {
        $LessonStudyStudentCount=$LessonStudyStudentCount + $studyStudent->studies_students_count;
    }
     $studentClassCount= Student::where('student_student_class',$item->class_id)->count();
     $averageStudyStudentClass= $LessonStudyStudentCount / $studentClassCount;


     if($averageStudyStudentClass > $studyCountLesson){
        $status = '<a class="text-success">مطلوب</a>';
     }else{
        $status = '<a class="text-danger">نامطلوب</a>';
     }
                          
                          $class_lists .=' <tr>
                          <td> '.(($key++)+1).' </td>
                          <td>'.$lesson->lesson_name.'</td>
                          <td>نام دبیر</td>
                          <td>'.  $studyCountLesson.'</td>
                        
                          <td >'.$averageStudyStudentClass.'</td>
                          <td>'.$status.'</td>

        
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
