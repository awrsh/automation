<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SectionModel;

class SectionController extends Controller
{
    public function AddSection()
    {
        return view('User.Students.Classification.AddSection');
    }

    public function InsertSection(Request $request)
    {

       $section = SectionModel::insert([
           'sections_name'=>$request->section,
           'school_id'=> 1
           ]);

       if ($section) {
        return back()->with('success','مقطع با موفقیت افزوده شد');
       }
       return back()->with('errors','خطا در ارسال درخواست');
    }
}
