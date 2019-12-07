<?php

namespace App\Http\Controllers\Teachers;

use Carbon\Carbon;
use App\LessonModel;
use App\StudiesModel;
use App\Models\School;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudyController extends Controller
{
    public function AddStudyView()
    {

        $school_id = Auth::guard('teacher')->user()->school_id;
        $section_id = School::where('school_id', $school_id)->first()->school_sections;

        return view('Teachers.Pannel.AddStudyVeiw', compact('section_id'));
    }

    public function getTeacherClasses(Request $request)
    {
        $teacher_lessons = Auth::Guard('teacher')->user()->teacher_lessons()->pluck('class_name')->toArray();

        $classes = ClassModel::where('basic_id', $request->basic_id)->get();
        $options = ' <option selected="">باز کردن فهرست انتخاب </option>';
        foreach ($classes as $item) {
            if (in_array($item->class_name, $teacher_lessons)) {

                $options .= ' <option value="' . $item->class_id . '">' . $item->class_name . '</option>';
            }
        }



        $lesson_array =  LessonModel::where('basic_id', $request->basic_id)->get();






        $table = '<table class="table table-striped table-bordered example2">
            <thead>
                <tr>
                    <th>ردیف</th>
                    <th>نام درس</th>
                    <th>مدت زمان مطالعه (برحسب دقیقه میباشد)</th>
                   
                 
                </tr>
            </thead>
            <tbody>';

        foreach ($lesson_array as $key => $item) {


            $table .= ' <tr>
                        <td>' . $key++ . ' </td>
                        <td>' . $item->lesson_name . '</td>
                        <td>                       
                            <input name="id_lesson[' . $item->id . ']" type="number" style="width: 50px">         
                        </td>

                        

                        
                 </tr>';
        }



        $table .= '</tbody>

        </table>';
        return response([$options, $table]);
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



        if (strlen(implode($request->id_lesson)) == 0) {
            return back()->with('Error', 'لطفا حد مطلوب مطالعه برای دروس را وارد کنید');
        } else {

            foreach ($request->id_lesson as $key => $item) {

                if ($item !== null) {
                    StudiesModel::create([
                        'studies_name' => $request->studies_name,
                        'studies_count' => $item,
                        'studies_start_date' => $request->case_start_date,
                        'studies_end_date' => $request->case_end_date,
                        'lesson_id' => $key,
                        'school_id' => Auth::guard('teacher')->user()->school_id,
                        'class_id' => $request->class

                    ]);
                }
            }
        }

        return back()->withInput()->with('success', 'مورد مطالعاتی با موفقیت اضافه شد');
    }
}
