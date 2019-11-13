<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasicModel extends Model
{
    protected $table = 'basic';
    public function section()
    {
        return $this->hasOne(SectionModel::class,'section_id','sections_id');
    }
}
