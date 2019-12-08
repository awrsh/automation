<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Teacher extends Authenticatable
{
    protected $guarded = [];
    protected $primaryKey ='id';

    public function teacher_lessons()
    {
        return $this->hasMany(TeacherLessons::class,'teacher_id','id');
    }
}
