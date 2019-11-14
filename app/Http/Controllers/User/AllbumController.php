<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\SectionModel;

class AllbumController extends Controller
{
    
    function getClasses(Request $request)
    {
        $classes=ClassModel::where('basic_id',$request->basic_id)->whereHas('basics',function($q) use ($request){
                $q->where('section_id',$request->section_id);
        })->get();
        

        $class_lists = ' <h5 class="card-title">  آلبوم عکس دانش آموزی </h5>';


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
                  <div class="row">';
          
                          foreach (\App\Models\Student::where('student_student_class',$item->class_id)->get() as $student){
                            $class_lists .=' <div class=" col-md-2 my-2 text-center">
                                      <div class="flex__column">
                                      <img src="' .route('BaseUrl').'/Pannel/assets/images/0150784058.jpg " height="100" width="75" alt="">
                                      <span>
                                          '.$student->student_firstname . $student->student_lastname.'
                                      </span>
                                      </div>
                              </div>';
                          }
                          $class_lists .='  </div>
              </div>';
          }else{

            $class_lists .='<div class="tab-pane fade" id="pills-'.$item->class_id.'" role="tabpanel" aria-labelledby="pills-all-tab">
      <div class="row">';

              foreach (\App\Models\Student::where('student_student_class',$item->class_id)->get() as $student){
                $class_lists .='  <div class=" col-md-2 my-2 text-center">
                          <div class="flex__column">
                          <img src="' .route('BaseUrl').'/Pannel/assets/images/0150784058.jpg " height="100" width="75" alt="">
                          <span>
                          '.$student->student_firstname . $student->student_lastname.'
                          </span>
                          </div>
                  </div>';
              }
              $class_lists .='  </div>
  </div>';
          }
}

$class_lists .='</div>';


return $class_lists;


    }
}
