<?php

namespace App;


use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class ExerciseDaily extends Model
{
    protected $guarded =[];
    protected $primaryKey ='exercise_id';

    public function student()
    {
        return $this->belongsToMany(Student::class,'exercise_daily_student','student_id','exercise_id');
    }
}
