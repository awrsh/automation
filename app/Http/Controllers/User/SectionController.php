<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BasicModel;
use App\Models\SectionModel;

class SectionController extends Controller
{
    public function AddSection()
    {
        return view('User.Students.Classification.AddSection');
    }

    public function InsertSection(Request $request)
    {
      
        $validatedData =    $request->validate([
            'sections_name' => 'unique:section',
         
        ],[
           
            'sections_name.unique' => 'نام مقطع از قبل وجود دارد'
        ]);

       $section = SectionModel::insert([
           'sections_name'=>$request->section_name,
           'school_id'=> 1
           ]);

       if ($section) {
        return back()->with('success','مقطع با موفقیت افزوده شد');
       }
       return back()->with('errors','خطا در ارسال درخواست');
    }


    public function Ajax(Request $request)
    {
        $section_id = $request->student_section;
       $basics =  BasicModel::where('section_id',$section_id )->get();
       $options=' <option selected="">باز کردن فهرست انتخاب</option>';
      foreach ($basics as $item) {
        $options .= ' <option value="'. $item->basic_id .'">'.$item->basic_name.'</option>';
      }

      return $options;
    }
}
