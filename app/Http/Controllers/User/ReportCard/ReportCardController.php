<?php

namespace App\Http\Controllers\User\ReportCard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportCardController extends Controller
{
    public function AddReportCard()
    {
       return view('User.ReportCard.AddReportCard');
    }
}
