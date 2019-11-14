<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'schools';
    protected $guarded = [];
    protected $primaryKey = 'school_id';


    public function Students()
    {
        return $this->hasMany(Student::class,'school_id','student_id');
    }


}
