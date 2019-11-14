<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
            'national_number' => 'numeric',

        ], [
            'student_photo.mimes' => 'فرمت فایل صحیح نیست',
          
            'national_number.digits' => 'شماره ملی بایستی شامل اعداد باشد',
            'national_number.between' => 'تعداد ارقام شماره ملی تایید نشد',

        ]);

        if ($request->has('student_photo')) {
            $fileName = $request->student_photo->getClientOriginalName();
            $fileNameWithoutEx = pathinfo($fileName, PATHINFO_FILENAME);
            $request->student_photo->move(public_path('uploads/students/'), $fileName);

        }
        Student::create([
            'school_id' => 1,
            'student_firstname' => $request->firstname,
            'student_lastname' => $request->lastname,
            'student_certificate_number' => $request->certificate_number,
            'student_national_number' => $request->national_number,
            'student_father_name' => $request->father_name,
            'student_father_mobile' => $request->father_mobile,
            'student_mother_mobile' => $request->mother_mobile,
            'student_birthday' => $request->birthday,
            'student_student_class' => $request->student_class,
            'student_student_number' => $request->student_number,
            'student_home_tel' => $request->home_tel,
            'student_student_mobile' => $request->student_mobile,
            'student_prev_school' => $request->prev_school,
            'student_student_photo' => $fileName,
        ]);
        School::find(1)->decrement('school_count_students', 1);
        return back()->with('success', 'دانش اموز با موفقیت ثبت شد');
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
        return view('User.Students.EditClass');
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
            $options .= ' <option value="' . $item->basic_id . '">' . $item->basic_name . '</option>';
        }

        return $options;

    }

    public function showClasses(Request $request)
    {
        dd($request->all());
    }

    public function Discipline()
    {
        return view('User.Discipline.AddDiscipline');
    }

}
