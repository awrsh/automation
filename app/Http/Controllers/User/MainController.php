<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\LessonModel;
use App\Models\BasicModel;
use App\Models\ClassModel;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $school = School::where('school_id', 1)->first();
        $count = $school->school_count_students;

        return view('User.Students.Register', compact('count'));
    }

    public function Register(Request $request)
    {

        $request->validate([
            'student_photo' => 'mimes:jpeg,png,jpg',
            'student_national_number' => 'unique:students',
            'student_student_number' => 'unique:students',
            'student_certificate_number' => 'unique:students'

        ], [
            'student_photo.mimes' => 'فرمت فایل صحیح نیست',    
            'student_national_number.unique' => 'دانش اموز دیگری با این کد ملی وجود دارد',
            'student_student_number.unique' => 'شماره دانش اموزی از قبل وجود دارد',
            'student_certificate_number.unique' => 'دانش اموز دیگری با این شماره شناسنامه وجود دارد'


        ]);

        if ($request->has('student_photo')) {
            $fileName = $request->national_number .'.'. $request->student_photo->getClientOriginalExtension();
            $fileNameWithoutEx = pathinfo($fileName, PATHINFO_FILENAME);
            $request->student_photo->move(public_path('uploads/students/'.$request->national_number), $fileName);
        }else{
            $fileName ='';
        }

       $insert_status= Student::create([
            'school_id' => 1,
            'student_firstname' => $request->firstname,
            'student_lastname' => $request->lastname,
            'student_certificate_number' => $request->student_certificate_number,
            'student_national_number' => $request->student_national_number,
            'student_father_name' => $request->father_name,
            'student_father_mobile' => $request->father_mobile,
            'student_mother_mobile' => $request->mother_mobile,
            'student_birthday' => $request->birthday,
        
            'student_student_number' => $request->student_student_number,
            'student_home_tel' => $request->home_tel,
            'student_student_mobile' => $request->student_mobile,
            'student_prev_school' => $request->prev_school,
            'student_student_photo' => $fileName,
            
        ]);
        School::find(1)->decrement('school_count_students', 1);
        
        return redirect()->route('Student.EditClass')->with('success', 'دانش اموز با موفقیت ثبت شد');
    }

    public function ImportWithExcel()
    {

        return view('User.Students.ImportData');
    }

    public function UploadPhoto()
    {
        return view('User.Students.UploadPhoto');
    }

    public function AlbumPhoto()
    {
        return view('User.Students.AlbumPhoto');
    }

    public function EditClass()
    {
        $list_ul = Student::where('student_student_class', null)->get();
        return view('User.Students.EditClass', compact('list_ul'));
    }

    public function ListStudents()
    {
        $list = Student::get();
        return view('User.Students.List', compact('list'));
    }

    public function GetBasics(Request $request)
    {
        $basics = BasicModel::where('section_id', $request->section_id)->get();
        $options = ' <option selected="">باز کردن فهرست انتخاب</option>';
        foreach ($basics as $item) {
            $options .= ' <option value="' . $item->basic_id . '">' . $item->basic_name . '</option>';
        }

        return $options;
    }

    public function GetClasses(Request $request)
    {
        $classes = ClassModel::where('basic_id', $request->basic_id)->get();
        $options = ' <option selected="">باز کردن فهرست انتخاب</option>';
        foreach ($classes as $item) {
            $options .= ' <option value="' . $item->class_id . '">' . $item->class_name . '</option>';
        }
        return $options;
    }



    public function GetClassesForView(Request $request)
    {
        $classes = ClassModel::where('basic_id', $request->basic_id)->get();
        $options = ' ';
        foreach ($classes as $item) {


            $options .= ' <span class="badge badge-info" style="font-size: 15px;
            word-spacing: 5px;">'.$item->class_name.'</span> ';
                }
        return $options;
    }



    public function showClasses(Request $request)
    {
        $id = $request->class_id;
        $classes = Student::where('student_student_class', $id)->get();
        $options = '';
        foreach ($classes as $item) {
            $options .= ' <option value="' . $item->student_id . '">' . $item->student_firstname . ' - ' . $item->student_lastname . '</option>';
        }
            return $options;



    }

    public function Discipline()
    {
        return view('User.Discipline.AddDiscipline');
    }
}
