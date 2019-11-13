<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = 'class';
    protected $guarded = 'class_id';
    public function basics()
    {
        return $this->hasOne(BasicModel::class,'basic_id','basic_id');
    }
}
