<?php

namespace App\Http\Controllers\Teachers;

use App\LessonModel;
use App\Models\School;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudyController extends Controller
{
    public function AddStudyView()
    {

        $school_id=Auth::guard('teacher')->user()->school_id;
        $section_id=School::where('school_id',$school_id)->first()->school_sections;
        
        return view('Teachers.Pannel.AddStudyVeiw',compact('section_id') );
    }

    public function getStudyClasses(Request $request)
    {
        $teacher_lessons =Auth::Guard('teacher')->user()->teacher_lessons()->get();
        dd($teacher_lessons);
        $classes = ClassModel::where('basic_id', $request->basic_id)->get();
        $options = ' <option selected="">باز کردن فهرست انتخاب</option>';
        foreach ($classes as $item) {
            $options .= ' <option value="' . $item->class_id . '">' . $item->class_name . '</option>';
        }



           $lesson_array =  LessonModel::where('basic_id',$request->basic_id)->get();
           
            


        

          $table = '<table class="table table-striped table-bordered example2">
            <thead>
                <tr>
                    <th>ردیف</th>
                    <th>نام درس</th>
                    <th>مدت زمان مطالعه</th>
                   
                 
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

}
