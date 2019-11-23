<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisciplineLawsModel extends Model
{
    protected $table = 'discipline_laws';
    protected $primaryKey = 'law_id';
    protected $guarded = [];

    public function relatedBasic()
    {
        return $this->belongsTo(BasicModel::class,'basic_id','basic_id');
    }
}
