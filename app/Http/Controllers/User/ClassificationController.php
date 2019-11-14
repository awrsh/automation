<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClassModel;

class ClassificationController extends Controller
{
 public function AddClass()
 {
     return view('User.Students.Classification.AddClass');
 }

 public function InsertClass(Request $request)
 {


    $validatedData = $request->validate([
        'class_name' => 'required|unique:class',
        'basic_id' => 'required',
    ],[
        'class_name.required' => 'نام کلاس الزامی است',
        'class_name.unique' => 'نام کلاس از قبل وجود دارد',
        'basic_id.required' => 'پایه را انتخاب کنید',
    ]);


    $Class = ClassModel::insert([
        'class_name'=>$request->class_name,
        'basic_id'=> $request->basic
        ]);

    if ($Class) {
     return back()->with('success','مقطع با موفقیت افزوده شد');
    }
    return back()->with('errors','خطا در ارسال درخواست');
 }
}
