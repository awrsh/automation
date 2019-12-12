<?php

namespace App\Models;

use App\ExerciseDaily;
use App\ExerciseScoresModel;
use App\StudiesModel;
use App\StudiesStudentsModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Student extends  Authenticatable
{
    

    protected $table = 'students';
    protected $guarded = [];
    protected $primaryKey = 'student_id';
    
   
    public function getClass()
    {
        return $this->belongsTo(ClassModel::class,'student_student_class','class_id');
    }

    public function getBasic()
    {
        $basic_id =  $this->getClass()->first()->basic_id;
        return BasicModel::where('basic_id',$basic_id)->first()->basic_name;
    }
    public function getBasicId()
    {
        $basic_id =  $this->getClass()->first()->basic_id;
        return BasicModel::where('basic_id',$basic_id)->first()->basic_id;
    }

    
    public function getCasesLaw()
    {
       
        return $this->hasMany(DisciplineCaseModel::class,'student_id','student_id');
    }

    public function getStudies()
    {
        return $this->hasMany(StudiesStudentsModel::class,'student_id','student_id');
    }
    
     public function exercise_dailies()
    {
        return $this->belongsToMany(ExerciseDaily::class,'exercise_daily_student','student_id','exercise_id');
    }
    

    public function exercise_scores()
    {
        return $this->hasMany(ExerciseScoresModel::class,'student_id','student_id');
    }

    
}
