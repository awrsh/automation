<?php

namespace App\Models;

use App\StudiesModel;
use App\StudiesStudentsModel;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
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

    
    public function getCasesLaw()
    {
       
        return $this->hasMany(DisciplineCaseModel::class,'student_id','student_id');
    }

    public function getStudies()
    {
        return $this->hasMany(StudiesStudentsModel::class,'student_id','student_id');
    }


    
}
