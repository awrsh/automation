<?php

namespace App\Http\Controllers\User\Discipline;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\DisciplineCaseModel;
use App\Models\DisciplineLawsModel;
use App\Models\DisciplineNumberModel;
use App\Models\School;
use App\Models\Student;
use Morilog\Jalali\Jalalian;

class DisciplineController extends Controller
{
    public function AddCase(Request $request)
    {



        $request->validate([
            'case_date' => 'required',
            'law_id' => 'required',
            'case_effect' => 'required',
            

        ], [

            'case_date.required' => 'زمان ثبت الزامی است',
            'law_id.required' => 'لطفا عنوان مورد را انتخاب نمایید',
            'case_effect.required' => 'تاثیر مورد انظباطی روی نمره را وارد کنید',
            
        ]);

           
        DisciplineCaseModel::create([
            'student_id' => $request->student_id,
            'case_date' => $this->convertDate($request->case_date),
            'law_id' => $request->law_id,
            'case_descriotion' => $request->case_descriotion,
            'case_effect' => $request->case_effect,
        ]);


        return back()->with('success', 'مورد انضباطی با موفقیت ثبت شد');
    }
   

    public function getChart(Request $request)
    {
        $id = $request->id;

        $cases = DisciplineCaseModel::where('student_id', $id)->get();
        $list = '
        <h5 class="text-center">لیست موارد انضباطی</h5>
        <ul class="list-group list-group-flush">';
        foreach ($cases as $key => $item) {
            $list .= '
            <li class="list-group-item p-l-0 p-r-0">
            <h5 class="primary-font">
                <a href="#">' . $item->relatedLow->law_title . '</a>
            </h5>
            <p class="text-mutedx mb-1">' . $item->case_descriotion . ' </p>
            <div class="text-muted font-size-13">
                
                
                <span>' . $item->case_date . '</span>
            </div>
        </li>
            ';
        }
        $list .= '</ul>';

        return $list;
    }






    public function DisciplineShow(Student $student)
    {

        return view('User.Discipline.DisciplineReportStudent',compact('student'));
       
    }




    public function AddCases()
    {
        return view('User.Discipline.AddCases');
    }

    public function InsertCases(Request $request)
    {


        $request->validate([
            'case_date' => 'required',
            'law_id' => 'required',
            'case_effect' => 'required',
            'student_ids' => 'required'

        ], [

            'case_date.required' => 'زمان ثبت الزامی است',
            'law_id.required' => 'لطفا عنوان مورد را انتخاب نمایید',
            'case_effect.required' => 'تاثیر مورد انظباطی روی نمره را وارد کنید',
            'student_ids.required' => 'دانش اموزان مورد نظر را علامت بزنید'
        ]);


        $students = $request->student_ids;

        foreach ($students as  $student) {

            DisciplineCaseModel::create([
                'case_date' => $this->convertDate($request->case_date),
                'student_id' => $student,
                'law_id' => $request->law_id,
                'case_descriotion' => $request->case_descriotion,
                'case_effect' => $request->case_effect,
            ]);
        }


        return back()->with('success', 'مورد انضباطی دسته جمعی با موفقیت ثبت شد');
    }

    public function changeBasicForLaw(Request $request)
    {
        if($request->basic_id == null) $request->basic_id = 1;
        $classes = ClassModel::where('basic_id',$request->basic_id)->get();
        return view('User.Discipline.Add_point',compact('classes'));
    }

    public function AddPoints()
    {
        
        $classes = ClassModel::where('basic_id',1)->get();
        return view('User.Discipline.Add_point',compact('classes'));
    }

    public function InsertPoints(Request $request)
    {
    

        $request->validate([
            'examin_group' => 'required',
            'start_time' => 'required',
            'expire_time' => 'required',
            'discipline_points' => 'required'

        ], [

            'start_time.required' => 'برای گروه ازمون انتخاب شده تاریخ را انتخاب کنید',
            'expire_time.required' => '',
            'case_effect.required' => 'تاثیر مورد انظباطی روی نمره را وارد کنید',
            'discipline_points.required' => 'دانش اموزان مورد نظر را علامت بزنید'
        ]);


        $students = $request->discipline_points;


       
  
            foreach ($students as $key => $student ) {
               
              if ($student != null) {
                if ( DisciplineNumberModel::where(['student_id'=> $key,'number_group'=>$request->examin_group])->count()) {
                    DisciplineNumberModel::where(['number_group'=>$request->examin_group,'student_id'=>$key])->update([
                        'number_score' => $student,
                        'number_date_start' => $this->convertDate($request->start_time),
                        'number_date_end' => $this->convertDate($request->expire_time),
                    ]);
                }else{
                    DisciplineNumberModel::create([
                        'number_group' => $request->examin_group,
                        'student_id' => $key,
                        'number_score' => $student,
                        'number_date_start' => $this->convertDate($request->start_time),
                        'number_date_end' => $this->convertDate($request->expire_time),
                    ]);  
                }
               }
              
            }
       
        return back()->with('success', 'نمرات با موفقیت ثبت شد');
    }



    public function DisciplineLists()
    {
       

        $classes = ClassModel::where('basic_id',1)->get();
        return view('User.Discipline.DisciplineLists',compact('classes'));
    }


    public function changeBasic(Request $request)
    {
        $classes = ClassModel::where('basic_id',$request->basic)->get();
        return view('User.Discipline.DisciplineLists',compact('classes'));
    }



    public function DefineLow()
    {
        return view('User.Discipline.DefineLow');
    }

    public function InsertLow(Request $request)
    {
        
        
        $request->validate([
            'law_title' => 'required | unique:discipline_laws',
            'law_type' => 'required',
            'low_count' => 'required',
            'law_num' => 'required'

        ], [

            'law_title.required' => 'عنوان الزامی است',
            'law_title.unique' => 'موردی با این عنوان وجود دارد',
            'law_type.required' => ' نوع مورد را انتخاب نمایید',
            'low_count.required' => 'ضریب ایین نامه انظباطی را وارد کنید',
            'law_num.required' => 'ضریب ایین نامه انظباطی را وارد کنید'
        ]);


       $dd= DisciplineLawsModel::create([
                'law_title' => $request->law_title,
                'law_type' => $request->law_type,	
                'law_count' => $request->low_count,
                'law_num' => $request->law_num,
                'basic_id' => $request->basic
        ]);

        $tr ='<tr>
        <td>'.$dd->law_title.'</td>
        <td>'.$dd->law_type.'</td>
        <td>'.$dd->law_count.'</td>
        <td>'.$dd->law_num.'</td>
        <td>'.$dd->relatedBasic->basic_name.'</td>
        <td> <a href="'.route('Discipline.DeleteLow',$dd).' " class=" text-danger"> <i class=" fa fa-trash fa-2x"></i> </a> </td>

    </tr>';

        return $tr;
    }

    public function AbsenceAndDelayList()
    {

       $section = School::where('school_name',session()->get('ManagerSis')['name'])->first()->school_sections;
        return view('User.Discipline.AbsenceAndDelayList',compact('section'));
    }

    function getAbsenceAndDelayList(Request $request)
    {

        
        $validatedData =    $request->validate([
            'basic' => 'required',
            'type' => 'required',
            'date' => 'required',
         
        ],[
           
            'basic.required' => 'پایه را مشخص کنید',
            'date.required' => 'تاریخ را مشخص کنید'
        ]);

      
       


        
      $classes=ClassModel::where('basic_id',$request->basic)->get();
        

        $class_lists = ' <h5 class="card-title">   لیست '.$request->type.' </h5>';


        $class_lists .='<ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">';

        foreach ($classes as $key=>$item){
        
        if ($key == 0){
            $class_lists .=  '<li class="nav-item">
                <a class="nav-link active" id="pills-'.$item->class_id.'-tab" data-toggle="pill" href="#pills-'.$item->class_id.'" role="tab" aria-controls="pills-home" aria-selected="true"> '.$item->class_name.'</a>
        </li>';
         } else{
            $class_lists .= '<li class="nav-item">
               <a class="nav-link " id="pills-'.$item->class_id.'-tab" data-toggle="pill" href="#pills-'.$item->class_id.'" role="tab" aria-controls="pills-home" aria-selected="true"> '.$item->class_name.'</a>
        </li>';
         }
        }


        $class_lists .= '</ul>
    ';




      
    $class_lists .='<div class="tab-content my-5" id="pills-tabContent2">';

foreach ($classes as $key=>$item){
          if ($key == 0){
            $class_lists .='  <div class="tab-pane fade show active" id="pills-'.$item->class_id.'" role="tabpanel" aria-labelledby="pills-all-tab">
                  ';

                  $class_lists .= '
                  <table class="table table-striped table-bordered example2">
                  <thead>
                      <tr>
                      <th>ردیف</th>
                      <th> نام و نام خانوادگی </th>
                      <th>کد ملی  </th>
                      <th>شماره دانش اموزی</th>
                      <th>  توضیح '.$request->type.'  </th>
              
                       
                      </tr>
                  </thead>
                  <tbody>
                  ';
          if(\App\Models\Student::where('student_student_class',$item->class_id)->whereHas('getCasesLaw',function($query) use($request){
            $query->where('case_date',$this->convertDate($request->date))->whereHas('relatedLow',function($query2) use($request){
                $query2->where('law_title',$request->type);
            });
    })->count()){       
            foreach ( \App\Models\Student::where('student_student_class',$item->class_id)->whereHas('getCasesLaw',function($query) use($request){
                    $query->where('case_date',$this->convertDate($request->date))->whereHas('relatedLow',function($query2) use($request){
                        $query2->where('law_title',$request->type);
                    });
            })->get() as $student){
                            $class_lists .=' <tr>
                            <td> '.($key+1).' </td>
                            <td>'.$student->student_firstname.' '.$student->student_lastname.'</td>
                            <td>'.$student->student_national_number.'</td>
                            <td>'.$student->student_student_number.'</td>
                          
                            <td >'.$student->getCasesLaw[0]->case_descriotion  .'</td>
          
                     </tr>';
                          }

                        }else{
                            $class_lists .='  <td>موردی برای نمایش در این تاریخ وجود ندارد</td>
              ';
                        }
                          $class_lists .='  </tbody>
                                    
                          </table></div>
              ';
          }else{

            $class_lists .='<div class="tab-pane fade" id="pills-'.$item->class_id.'" role="tabpanel" aria-labelledby="pills-all-tab">
      ';
      $class_lists .= '
      <table class="table table-striped table-bordered example2">
      <thead>
          <tr>
              <th>ردیف</th>
              <th> نام و نام خانوادگی </th>
              <th>کد ملی  </th>
              <th>شماره دانش اموزی</th>
              <th>  توضیح '.$request->type.'  </th>
              
              
           
          </tr>
      </thead>
      <tbody>
      ';

      if(\App\Models\Student::where('student_student_class',$item->class_id)->whereHas('getCasesLaw',function($query) use($request){
        $query->where('case_date',$this->convertDate($request->date))->whereHas('relatedLow',function($query2) use($request){
            $query2->where('law_title',$request->type);
        });
})->count()){  
            foreach ( \App\Models\Student::where('student_student_class',$item->class_id)->whereHas('getCasesLaw',function($query) use($request){
                    $query->where('case_date',$this->convertDate($request->date))->whereHas('relatedLow',function($query2) use($request){
                        $query2->where('law_title',$request->type);
                    });
            })->get() as $student){
                $class_lists .=' <tr>
                            <td> '.($key+1).' </td>
                            <td>'.$student->student_firstname.' '.$student->student_lastname.'</td>
                            <td>'.$student->student_national_number.'</td>
                            <td>'.$student->student_student_number.'</td>
                          
                            <td >'.$student->getCasesLaw[0]->case_descriotion .'</td>
          
          
                     </tr>';
              }
            }else{
                $class_lists .=' <td>موردی برای نمایش در این تاریخ وجود ندارد</td>
  ';
            }
              $class_lists .='  </tbody>
                                    
              </table></div>
  ';
          }
}

$class_lists .='</div>';


return $class_lists;


    }

    public function DeleteLow(DisciplineLawsModel $item)
    {
        $item->delete();
        return back()->with('success','مورد انظباطی با موفقیت حذف شد');
    }
}
