<?php

namespace App\Http\Controllers\User;

use App\PersonelModel;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LessonModel;
use App\Models\ClassModel;
use App\Models\TeacherLessons;

class PermissionsController extends Controller
{
    public function index()
    {
        return view('User.Permission.Permission');
    }

    public function AddPesonals(Request $request)
    {
        PersonelModel::create(
            [
                "personel_name" => $request->fullname,
                "personel_education" => $request->Education,
                "personel_username" => $request->username,
                "personel_password" => $request->password,
                "personel_codenational" => $request->certificate_number,
                "personel_phone" => $request->phone_number,
                "personel_tel" => $request->telphone,
                "personel_address" => $request->Address,
                "personel_role" => $request->responsibility,
                "personel_permissions" => $request->permissions,
                "personel_status" => 'off',
                "school_id" => session()->get('ManagerSis')['id'],
            ]
        );
        return \back()->with('succsses', 'پرسنل با موفقعیت ثبت شد');
    }

    public function StatusPesonals()
    {

        $id_personal = request()->post('id_personal');
        $status = request()->post('status');
        if ($status == "off") {
            PersonelModel::where('personel_id', $id_personal)->update([
                'personel_status' => $status,
            ]);
            return 'off';
        } else {
            PersonelModel::where('personel_id', $id_personal)->update([
                'personel_status' => $status,
            ]);
            return 'on';
        }

    }

    public function Pesonals()
    {
        return view('User.Personals.AddPersonals');
    }

    public function ListPersonals()
    {
        return view('User.Personals.ListPersonals');
    }

    public function Teachers()
    {
        return view('User.Personals.AddTeachers');
    }

    public function ListTeachers()
    {
        return view('User.Personals.ListTeachers');
    }

    public function AddTeachers(Request $request)
    {
        $teacher = Teacher::create([
            'teacher_fullname'=>$request->fullname,
            'teacher_pw'=>$request->password,
            'teacher_password'=>md5($request->password),
            'teacher_email'=>$request->email,
            'teacher_mobile'=>$request->phone_number,
            'teacher_tel'=>$request->telphone,
            'teacher_address'=>$request->Address,
            'teacher_birthday'=>$request->date,
            'teacher_Education'=>$request->Education,
            'teacher_certificate_code'=>$request->certificate_number,
            'school_id'=>session()->get('ManagerSis')['id']
         ]);
         $data = Teacher::where('id',$teacher->id)->first()['id'];
         return redirect(\route('Teachers.RegisterStop',$data));
    }

    public function RegisterStop($data)
    {
      $data=Teacher::where('id',$data)->first();
      return view('User.Personals.SetLessonsTeacher',compact('data'));
    }
    public function SaveTeachers(Request $request)
    {
        if ($request->class==null) {
            return back();
        }
       $nameClass=ClassModel::where('class_id',$request->class)->first()['class_name'];
       $nameLesson=LessonModel::where('id',$request->lesson)->first()['lesson_name'];
      TeacherLessons::create([
         'class_id'=>$request->class,
         'lesson_id'=>$request->lesson,
         'class_name'=>$nameClass,
         'lesson_name'=>$nameLesson,
         'teacher_id'=>$request->id,
         ]);
         return \back();
    }
    public function DeleteTeacher($id)
    {
        Teacher::where('id',$id)->delete();
        TeacherLessons::where('teacher_id',$id)->delete();
        return back();
    }
    public function DeleteTeacherLesson($id)
    {
        TeacherLessons::where('id',$id)->delete();
        return back();
    }
    public function ShowTeacher($id)
    {
       $data = Teacher::where('id',$id)->first();
       return view('User.Personals.ShowTeacher',compact('data'));
    }

    public function EditTeacher(Request $request)
    {
        Teacher::where('id',$request->EditId)->update(
            [
                'teacher_fullname'=>$request->fullname,
                'teacher_pw'=>$request->password,
                'teacher_password'=>md5($request->password),
                'teacher_email'=>$request->email,
                'teacher_mobile'=>$request->phone_number,
                'teacher_tel'=>$request->telphone,
                'teacher_address'=>$request->Address,
                'teacher_birthday'=>$request->date,
                'teacher_Education'=>$request->Education,
                'teacher_certificate_code'=>$request->certificate_number,
            ]
        );
        return back();
    }

    public function DeletePersonal($id)
    {
        PersonelModel::where('personel_id',$id)->delete();
        return back();
    }

    public function EditPersonal($id)
    {
       $data = PersonelModel::where('personel_id',$id)->first();
       return view('User.Personals.ShowPersonal',compact('data'));
    }
    public function SEditPersonal(Request $request)
    {
        PersonelModel::find($request->EditId)->update(
            [
                "personel_name" => $request->fullname,
                "personel_education" => $request->Education,
                "personel_username" => $request->username,
                "personel_password" => $request->password,
                "personel_codenational" => $request->certificate_number,
                "personel_phone" => $request->phone_number,
                "personel_tel" => $request->telphone,
                "personel_address" => $request->Address,
                "personel_role" => $request->responsibility,
                "personel_permissions" => $request->permissions, 
            ]
        );
        return back();
    }
}
