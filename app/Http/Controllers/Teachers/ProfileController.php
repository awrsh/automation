<?php

namespace App\Http\Controllers\Teachers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Teacher;

class ProfileController extends Controller
{
    public function EditProfile(Teacher $teacher)
    {
        dd($teacher);
    }
}
