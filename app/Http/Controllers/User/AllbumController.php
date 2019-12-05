<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\SectionModel;
use App\Models\Student;
use PDF;

class AllbumController extends Controller
{

   
    
    function getClasses(Request $request)
    {
        
        $classes=ClassModel::where('basic_id',$request->basic_id)->get();
        if (count($classes) == 0) {
           return 'هنوز کلاسی ثبت نشده است';
        }
        

        $class_lists = ' <h5 class="card-title">  آلبوم عکس دانش آموزی </h5>';

        $class_lists .='<div class="d-flex justify-content-between">'; 
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

    $class_lists .= '<div class="">
    <a href="'.route('Allbum.getPDF',$item->class_id).'" class="btn btn-sm btn-secondary">دریافت فایل pdf </a>
    </div>
    ';
    $class_lists .='</div>';


   
      

      
    $class_lists .='<div class="tab-content my-5" id="pills-tabContent2">';

foreach ($classes as $key=>$item){
          if ($key == 0){
            $class_lists .='  <div class="tab-pane fade show active" id="pills-'.$item->class_id.'" role="tabpanel" aria-labelledby="pills-all-tab">
                  <div class="row">';
          
                          foreach (\App\Models\Student::where('student_student_class',$item->class_id)->get() as $student){
                            if($student->student_student_photo!=""){
                            $class_lists .=' <div class=" col-md-2 my-2 text-center">
                                      <div class="flex__column">
                                      <img src="' .route('BaseUrl').'/uploads/students/'.$student->student_national_number.'/'.$student->student_student_photo.' " height="100" width="75" alt="">
                                      <span>
                                          '.$student->student_firstname  .' _ '. $student->student_lastname.'
                                      </span>
                                      </div>
                              </div>';
                          }
                        else{
                            $class_lists .=' <div class=" col-md-2 my-2 text-center">
                            <div class="flex__column">
                            <img src="' .route('BaseUrl').'/Pannel/img/avatar.jpg " height="100" width="75" alt="">
                            <span>
                                '.$student->student_firstname .' _ '. $student->student_lastname.'
                            </span>
                            </div>
                    </div>';
                        
                           }
                        }
                          $class_lists .='  </div>
              </div>';
          }else{

            $class_lists .='<div class="tab-pane fade" id="pills-'.$item->class_id.'" role="tabpanel" aria-labelledby="pills-all-tab">
            <div class="row">';
          
            foreach (\App\Models\Student::where('student_student_class',$item->class_id)->get() as $student){
              if($student->student_student_photo!=""){
              $class_lists .=' <div class=" col-md-2 my-2 text-center">
                        <div class="flex__column">
                        <img src="' .route('BaseUrl').'/uploads/students/'.$student->student_student_photo.' " height="100" width="75" alt="">
                        <span>
                            '.$student->student_firstname . $student->student_lastname.'
                        </span>
                        </div>
                </div>';
            }
          else{
              $class_lists .=' <div class=" col-md-2 my-2 text-center">
              <div class="flex__column">
              <img src="' .route('BaseUrl').'/Pannel/img/avatar.jpg " height="100" width="75" alt="">
              <span>
                  '.$student->student_firstname . $student->student_lastname.'
              </span>
              </div>
      </div>';
          
             }
          }
            $class_lists .='  </div>
</div>';
          }

       
}

$class_lists .='</div>';


return $class_lists;


    }

    public function getPDF(Request $request)
    {

        $students = Student::where('student_student_class',$request->id)->get();
        $class= ClassModel::where('class_id',$request->id)->first();
      
       
        // $pdf = PDF::loadView('User.Students.PDF_Allbum', $students);
        // return $pdf->download('invoice.pdf');

      
        return view('User.Students.PDF_Allbum',compact(['students','class']));
    }
}
