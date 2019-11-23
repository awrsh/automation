<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExerciseDailyController extends Controller
{
    public function AddExercise()
    {
        return view('User.Exersice.AddExercise');
    }
    public function AddResponsible()
    {
        return view('User.Exercise.AddResponsible');
    }
}
