<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\School;
use App\Models\Student;
use App\StudiesModel;

class ClassificationController extends Controller
{
    public function AddClass()
    {


        return view('User.Students.Classification.AddClass');
    }
    public function DeleteClass(Request $request)
    {
       ClassModel::where('class_id',$request->item)->delete();
       Student::where('student_student_class',$request->item)->update([
            'student_student_class' => null
       ]);

        StudiesModel::where('class_id',$request->item)->delete();

       return back()->with('success','کلاس حذف شد');
    }
    public function InsertClass(Request $request)
    {


        $validatedData = $request->validate([
            'class_name' => 'required|unique:class',
            // 'basic_id' => 'required',
        ], [
            'class_name.required' => 'نام کلاس الزامی است',
            'class_name.unique' => 'نام کلاس از قبل وجود دارد',
            // 'basic_id.required' => 'پایه را انتخاب کنید',
        ]);


        $Class = ClassModel::insert([
            'class_name' => $request->class_name,
            'basic_id' => $request->basic
        ]);

        if ($Class) {
            return back()->with('success', 'کلاس با موفقیت افزوده شد');
        }
        return back()->with('errors', 'خطا در ارسال درخواست');
    }



    public function ExitClass(Request $request)
    {
        $student_list_ol = $request->student_list_ol;
        foreach ($student_list_ol as  $item) {
            Student::where('student_id', $item)->update([
                'student_student_class' => null
            ]);
        }
        $options = "";
        foreach (Student::where('student_student_class', null)->get() as  $item2) {
            $options .= ' <option value="' . $item2->student_id . '">' . $item2->student_firstname . ' - ' . $item2->student_lastname . '</option>';
        }
        return $options;
    }
    public function EnterClass(Request $request)
    {
        $student_list_ul = $request->id_students;
        $id_class =  $request->class_id;
        
        foreach ($student_list_ul as  $item) {
            Student::where('student_id', $item)->update([
                'student_student_class' => $id_class
            ]);
        }
        $options = "";
        $options1 = "";
        foreach (Student::where('student_student_class', $id_class)->get() as  $item2) {
            $options .= ' <option value="' . $item2->student_id . '">' . $item2->student_firstname . ' - ' . $item2->student_lastname . '</option>';
        }
        foreach (Student::where('student_student_class', null)->get() as  $item2) {
            $options1 .= ' <option value="' . $item2->student_id . '">' . $item2->student_firstname . ' - ' . $item2->student_lastname . '</option>';
        }
        $array = [
            $options, $options1
        ];
        return response($array);
    }
}
