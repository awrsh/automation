<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BasicModel;

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
}
