<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonModel extends Model
{
    protected $table = 'lessons';
    protected $guarded = [];

    public function getRelatedStudies()
    {
        return $this->hasMany(StudiesModel::class,'lesson_id','id');
    }

    public function getRelatedStudySpecialClass($class_id)
    {
        return $this->getRelatedStudies()->where('class_id',$class_id)->get();
    }
}
