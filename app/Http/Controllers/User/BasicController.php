<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BasicModel;
use App\Models\ClassModel;

class BasicController extends Controller
{
    public function AddBasic()
    {
        return view('User.Students.Classification.AddBasic');
    }

    public function InsertBasic(Request $request)
 {

    $Class = BasicModel::insert([
        'basic_name'=>$request->basic_name,
        'section_id'=> $request->section_id
        ]);

    if ($Class) {
     return back()->with('success','مقطع با موفقیت افزوده شد');
    }
    return back()->with('errors','خطا در ارسال درخواست');
 }


 public function Ajax(Request $request)
 {
     $basic_id = $request->student_class;
    $basics =  ClassModel::where('basic_id',$basic_id )->get();
    $options='<option>انتخاب کنید </option>';
   foreach ($basics as $item) {
     $options .= ' <option value="'. $item->class_id .'">'.$item->class_name.'</option>';
   }

   return $options;
 }
}
