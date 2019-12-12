<?php

namespace App\Http\Controllers\User\ReportCard;

use App\LessonModel;
use App\Models\Student;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\ReportCardModel;
use App\Http\Controllers\Controller;
use App\ReportCardStudentModel;
use Illuminate\Support\Facades\Auth;

class ReportCardController extends Controller
{
    public function AddReportCard()
    {
        return view('User.ReportCard.AddReportCard');
    }

    public function getReportCardClasses(Request $request)
    {
        $classes = ClassModel::where('basic_id', $request->basic_id)->get();
        $options = ' <option selected="">باز کردن فهرست انتخاب</option>';
        foreach ($classes as $item) {
            $options .= ' <option value="' . $item->class_id . '">' . $item->class_name . '</option>';
        }



        $lesson_array =  LessonModel::where('basic_id', $request->basic_id)->get();






        $table = '<table class="table table-striped table-bordered example2">
            <thead>
                <tr>
                    <th>ردیف</th>
                    <th>نام درس</th>
                    <th> حداکثر نمره</th>
                    <th> ضریب درس</th>
                    <th>جزو کارنامه</th>
                   
                 
                </tr>
            </thead>
            <tbody>';
        $i = 1;

        foreach ($lesson_array as $key => $item) {


            $table .= ' <tr>
                        <td>' . $key++ . ' </td>
                        <td>' . $item->lesson_name . '</td>
                        <td>                       
                            <input name="max_score[' . $item->id . ']" type="text" value="20" style="width: 50px">         
                        </td>
                        <td>                       
                        <input name="zarib[' . $item->id . ']" type="text" value="1" style="width: 50px">         
                        </td>
                        <td>                       
                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="1"
                                                                   name="status[' . $item->id . ']"
                                                                   class="custom-control-input switch"
                                                                   id="ss' . $i . '"
                                                                   checked>
                                                            <label class="custom-control-label"
                                                                   for="ss' . $i . '"></label>
                                                        </div>
                        </td>

                        

                        
                 </tr>';
            $i++;
        }



        $table .= '</tbody>

        </table>';
        return response([$options, $table]);
    }


    public function InsertReportCard(Request $request)
    {
        $request->validate([
            'card_name' => 'required',
            'class' => 'required',
            'azmoon_group' => 'required',
            'basic' => 'required',
        ], [
            'card_name.required' => 'عنوان کارنامه را وارد کنید',
            'class.required' => 'کلاس را انتخاب کنید',
            'azmoon_group.required' => 'گروه ازمون را انتخاب کنید',
            'basic.required' => 'پایه را انتخاب کنید',
        ]);

        $card = ReportCardModel::create([
            'report_card_name' => $request->card_name,
            'class_id' => $request->class,
            'azmoon_group' => $request->azmoon_group,
            'school_id' => session()->get('ManagerSis')['id']
        ]);

        if ($request->status !== null) {
            foreach ($request->status as $key => $item) {

                if ($request->max_score[$key] !== null) {
                    $card->reportCardLessons()->create([
                        'lesson_id' => $key,
                        'lesson_name' => LessonModel::where('id', $key)->first()->lesson_name,
                        'lesson_zarib' => $request->zarib[$key] !== null ? $request->zarib[$key] : 1,
                        'lesson_score' => $request->max_score[$key]
                    ]);
                }
            }
            return back()->with('success', 'کارنامه با موفقیت ثبت شد');
        } else {
            return back()->with('Error', 'هیچ موردی انتخاب نشده است');
        }
    }


    public function InsertScore()
    {
        return view('User.ReportCard.ReportCardStudent');
    }

    public function getReportCards(Request $request)
    {

        $report_cards = ReportCardModel::where('class_id', $request->class_id)
            ->where('school_id', session()->get('ManagerSis')['id'])->get();

        $str = "<option value=''>باز کردن فهرست انتخاب</option>";


        foreach ($report_cards as $item) {
            $str .= "<option value='$item->id'>$item->report_card_name (گروه ازمون $item->azmoon_group)</option>";
        }
        return response($str);
    }


    public function getReportCardLessons(Request $request)
    {
        $lessons = ReportCardModel::find($request->report_card)->reportCardLessons;
        $str = "<option value=''>باز کردن فهرست انتخاب</option>";
        foreach ($lessons as  $lesson) {
            $str .= "<option value='$lesson->lesson_id'>$lesson->lesson_name (نمره از $lesson->lesson_zarib)</option>";
        }
        return response($str);
    }
    public function getStudents(Request $request)
    {
        $str = "";
        $i = 1;
        $student = Student::where('student_student_class', \request()->class_id)->get();
        foreach ($student as $item) {
            $str .= "<tr>
                    <td>$i</td>
                     <td>$item->student_firstname - $item->student_lastname</td>
                     <td> $item->student_national_number</td>
                      <td> $item->student_student_number</td>
                       <td><input name='scores[$item->student_id]' class='form-control col-md-2 col-sm-12' type='number'></td>
                        </tr> ";
            $i++;
        }
        return response($str);
    }



    public function InsertStudentScores(Request $request)
    {

        if (strlen(implode($request->scores)) == 0) {
            return back()->with('Error', 'هیچ نمره ای برای ثبت وارد نشد');
        } else {
            foreach ($request->scores as $key => $score) {
                $rr = ReportCardStudentModel::where('student_id', $key)
                    ->where('report_card_lessons', $request->lesson)
                    ->where('report_card_id', $request->report_card)->get();
                if ($rr->count()) {
                    ReportCardStudentModel::where('student_id', $key)
                        ->where('report_card_lessons', $request->lesson)
                        ->where('report_card_id', $request->report_card)->update([
                            'report_card_score' => $score !== null ? $score : $rr[0]->report_card_score

                        ]);
                } else {
                    ReportCardStudentModel::create([
                        'report_card_lessons' => $request->lesson,
                        'report_card_score' => $score !== null ? $score : 'وارد نشده',
                        'report_card_id' => $request->report_card,
                        'student_id' => $key
                    ]);
                }
            }

            return back()->with('success', 'نمرات با موفقیت اضافه شد');
        }
    }


    public function ClassesReportCardView()
    {
        return view('User.ReportCard.ClassesReportCard');
    }

    public function ClassesPDF(Request $request)
    {

        dd(ReportCardModel::where('azmoon_group',$request->azmoon_group)
        ->where('class_id',$request->class)
        ->where('school_id',session()->get('ManagerSis')['id'])
        ->first());

        return view('');



    }
}
