<?php

namespace App\Http\Controllers\User\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function ClassAvgView()
    {
        return view('User.Reports.ClassAvgReport');
    }

    public function ClassAvg(Request $request)
    {
        dd($request->all());
    }
}
