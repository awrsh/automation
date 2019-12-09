<?php

namespace App\Http\Controllers\User\activityClass;

use App\ExerciseDailyModel;
use App\ExerciseScoresModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExerciseController extends Controller
{
    public function exerciseAddDaily()
    {
        return view('User.ActivityClass.AddExercise');
    }

    public function InsertExerciseAddDaily(Request $request)
    {


        $request->validate([
            'lesson' => 'required',
            'class' => 'required',
            'date' => 'required'


        ], [
            'lesson.required' => 'نام درس را انتخاب کنید',
            'class.required' => 'نام کلاس را انتخاب کنید',
            'date.required' => 'تاریخ را وارد کنید',

        ]);

        ExerciseDailyModel::create([
            'exercise_name' => $request->title,
            'lesson_id' => $request->lesson,
            'exercise_date' => $request->date,
            'class_id' => $request->class
        ]);
        return back()->with('success', 'ثبت تکلیف با موفقیت انجام شد');
    }


    public function ScoreExercise()
    {
        return view('User.ActivityClass.ExerciseScore');
    }


    public function getExercise()
    {
        $str = "";
        $lessens = ExerciseDailyModel::where('class_id', \request()->class_id)->where('lesson_id', \request()->lesson_id)->get();
        if (count($lessens)) {
            $date = $lessens[0]->exercise_date;
            foreach ($lessens as $item) {

                $str .= "<option value='$item->exercise_id'>$item->exercise_name</option>";
            }
            return response([$str, $date]);
        } else {
            $str .= "<option value=''>تمرینی  پیدا نشد</option>";
            return response([$str, '']);
        }
    }

    public function getExerciseDate()
    {

        $date = ExerciseDailyModel::where('exercise_id', \request()->exercise_id)->first()->exercise_date;
        return response($date);
    }

    public function insertScoreExercise(Request $request)
    {

        $request->validate([
            'lesson' => 'required',
            'class' => 'required',



        ], [
            'lesson.required' => 'نام درس را انتخاب کنید',
            'class.required' => 'نام کلاس را انتخاب کنید',


        ]);

        if (strlen(implode($request->scores)) == 0) {
            return back()->with('Error', 'موردی ثبت نشد');
        } else {
            foreach (\request()->scores as $key => $item) {
                if ($item !== null) {

                    if (ExerciseScoresModel::where(['student_id' => $key, 'exercise_date' => $this->convertDate(request()->date_ex)])->count()) {
                        ExerciseScoresModel::where(['student_id' => $key, 'exercise_date'=> $this->convertDate(request()->date_ex)])->update([
                            'exercise_date' => $this->convertDate(request()->date_ex),
                            'score' => $item,
                            'student_id' => $key,
                        ]);
                    } else {
                        ExerciseScoresModel::create([
                            'exercise_date' => $this->convertDate(request()->date_ex),
                            'score' => $item,
                            'student_id' => $key,
                        ]);
                    }
                }
            }
            return back()->with('success', 'ثبت نمرات با موفقیت انجام شد');
        }
    }
}
