<?php

namespace App\Http\Controllers\User\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LessonModel;
use App\Models\BasicModel;

class ReportController extends Controller
{
    public function ClassAvgView()
    {
        return view('User.Reports.ClassAvgReport');
    }

    public function ClassAvg(Request $request)
    {
        // dd(\App\Models\ClassModel::where('basic_id',1)->get());
        $lessons = LessonModel::where('basic_id',$request->basic)->get();
       $classLists = \App\Models\ClassModel::where('basic_id',1)->get()->chunk(3);
        $basic= BasicModel::where('basic_id',$request->basic)->first()->basic_name;
        return view('User.Reports.ClassAvgPDF',compact(['basic','lessons','classLists']));
    }
}
