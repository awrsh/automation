<?php

namespace App\Models;

use App\ReportCardStudentModel;
use Illuminate\Database\Eloquent\Model;

class ReportCardModel extends Model
{
    protected $table ='report_card';
    protected $guarded =[];
    // protected $with = 'reportCardStudents';
    public function reportCardLessons()
    {
        return $this->hasMany(ReportCardLessons::class,'report_card_id','id');
    }

    public function reportCardStudents()
    {
        return $this->hasMany(ReportCardStudentModel::class,'report_card_id','id');
    }

}
