<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentsContorller extends Controller
{

    public function setPhoto(Request $request)
    {
        if ($request->has('file')) {
            $fileName = $request->file->getClientOriginalName();
            $fileNameWithoutEx = pathinfo($fileName, PATHINFO_FILENAME);

            $request->file->move(public_path('uploads/students/', $fileName));

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

        return \back();
    }

    public function import(Request $request)
    {

        session()->put('import_data', $request->import_data);

        // Excel::load($request->file('file')->getRealPath(), function ($reader) {
        //     foreach ($reader->toArray() as $key => $row) {
        //         $data['A'] = $row['stir'];
        //         $data['B'] = $row['lit_num'];
        //         $data['C'] = $row['berildi'];
        //         $data['D'] = $row['gacha'];
        //         \dd($row);
        //         // if(!empty($data)) {
        //         //     DB::table('data')->insert($data);
        //         // }
        //     }
        // });

        Excel::import(new StudentsImport, request()->file('file'));

        return back();
    }

    public function Student($id)
    {
        $data = Student::where('student_id', $id)->get()->first();
        return view('User.Students.student', compact('data'));
    }

}
