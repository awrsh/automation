<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MainController extends Controller
{
    public function index()
    {
        return view("Admin.AddSchool");
    }

    public function ListSchool()
    {
    
    
        return view("Admin.ListSchool");
    }


}
