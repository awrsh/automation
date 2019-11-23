<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisciplineCaseModel extends Model
{
    protected $table = 'discipline_case';
    protected $primaryKey = 'case_id';
    protected $guarded = [];

    public function relatedLow()
    {
        return $this->belongsTo(DisciplineLawsModel::class,'law_id','law_id');
    }
}
