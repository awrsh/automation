<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudiesStudentsModel extends Model
{
    protected $table = 'studies_students';
    protected $guarded =[];

    public function StudyName()
    {
        return $this->belongsTo(StudiesModel::class,'studies_id','id');
    }
}
