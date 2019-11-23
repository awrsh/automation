<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudiesModel extends Model
{
    protected $table = 'studies';
    protected $guarded =[];

    public function getRelatedStudiesStudent()
    {
        return $this->hasMany(StudiesStudentsModel::model,'studies_id','id');
    }
}
