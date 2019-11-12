<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $guarded = ['student_id'];
    protected $primaryKey = 'student_id';
}
