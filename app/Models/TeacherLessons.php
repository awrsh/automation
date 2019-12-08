<?php

namespace App\Models;

use App\LessonModel;
use Illuminate\Database\Eloquent\Model;

class TeacherLessons extends Model
{
    protected $table = 'teacher_lessons';
    
    public function Lesson()
    {
        return $this->belongsTo(LessonModel::class, 'lesson_id', 'id');
    }
}
