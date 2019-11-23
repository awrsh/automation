<?php

namespace App\Http\Controllers\User;

use App\Exports\StudentsExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
use App\Models\Student;
use Maatwebsite\Excel\Facades\Excel;


class StudentsContorller extends Controller
{

    public function setPhoto(Request $request)
    {
        if ($request->has('file')) {
            $fileName = $request->file->getClientOriginalName();
            $fileNameWithoutEx = pathinfo($fileName, PATHINFO_FILENAME);

            $request->file->move(public_path('uploads/students/'), $fileName);

            if ($request->fileName == 'نام فايل ها بر اساس كد ملي') {

                $student = Student::where('student_national_number', $fileNameWithoutEx)->update([
                    'student_student_photo' => 'uploads/students/' . $fileName,
                ]);
            }
            if ($request->fileName == 'نام فايل ها بر اساس شماره دانش آموزي') {

                $student = Student::where('student_student_number', $fileNameWithoutEx)->update([
                    'student_student_photo' => 'uploads/students/' . $fileName,
                ]);
            }

        }

        return back();
    }

    public function export(Request $request)
    {

        session()->put('import_data', $request->import_data);
        $header = [];
        foreach ($request->import_data as $item) {
            switch ($item) {
                case 'firstname':
                    $header[] = 'نام ';
                    break;
                case 'lastname':
                    $header[] = 'نام خانوادگی';
                    break;
                case 'certificate_number':
                    $header[] = 'شماره شناسنامه ';
                    break;
                case 'national_number':
                    $header[] = 'کد ملی ';
                    break;
                case 'father_name':
                    $header[] = 'نام پدر ';
                    break;
                case 'father_mobile':
                    $header[] = 'موبایل پدر ';
                    break;
                case 'mother_mobile':
                    $header[] = 'موبایل مادر ';
                    break;
                case 'birthday':
                    $header[] = 'تاریخ تولد ';
                    break;

                case 'student_number':
                    $header[] = 'شماره دانش آموزی ';
                    break;
                case 'home_tel':
                    $header[] = 'تلفن منزل ';
                    break;
                case 'student_mobile':
                    $header[] = 'موبایل دانش آموز ';
                    break;
                case 'prev_school':
                    $header[] = ' نام مدرسه قبلی ';
                    break;
            }
        }
        $export = new StudentsExport([$header]);

        return Excel::download($export, 'invoices.xlsx');

    }

    public function import(Request $request)
    {
        $result =  Excel::import(new StudentsImport, request()->file('file'));

        if($result){
            return view('User.Students.ImportData')->with('success','اطلاعات با موفقیت ثبت شد');
        }else{
            return view('User.Students.ImportData')->with('errors','خطا در ثبت اطلاعات');
        }
        return back();
    }

    public function Student($id)
    {
        $data = Student::where('student_id', $id)->get()->first();
        return view('User.Students.student', compact('data'));
    }

    public function EditInfo(Request $request)
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

        }else{
            $fileName ="";
        }
        Student::where('student_id', $request->id_student)->update([

            'student_firstname' => $request->firstname,
            'student_lastname' => $request->lastname,
            'student_certificate_number' => $request->certificate_number,
            'student_national_number' => $request->national_number,
            'student_father_name' => $request->father_name,
            'student_father_mobile' => $request->father_mobile,
            'student_mother_mobile' => $request->mother_mobile,
            'student_birthday' => $request->birthday,
            'student_student_number' => $request->student_number,
            'student_home_tel' => $request->home_tel,
            'student_student_mobile' => $request->student_mobile,
            'student_prev_school' => $request->prev_school,
            'student_student_photo' => $fileName,
        ]);

        return back()->with('success', 'اطلاعات باموفقیت ویرایش شد');
    }
}
