<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/bundle.css" type="text/css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/css/app.css" type="text/css">
    <title>Document</title>
    <style>
        .flex__column {
            display: flex;
            flex-direction: column;
            align-items: center;



            padding: 10px;
            cursor: default !important;
        }



        .flex__column>span {
            margin-top: 7px;
        }


        .__table {
            border: 1px solid;
            padding: 3px;
            max-width: 680px;
            text-align: center;
        }
    </style>
</head>

<body dir="rtl" style="background:#fff;padding-top:10px;">



    <div class="card">


        <div class="card-header">
            <div class="" style="display:flex;justify-content: space-between;margin-top:30px;
                     height:130px;border:1px solid;    padding:10px 12px 0 12px;">
                <div style="display: flex;
                      flex-direction: column;
                      justify-content: flex-end;">
                    <img class="logo" src="" alt="">
                    <p>  پایه:
                        
                        @php
                            $basic_id = \App\Models\ClassModel::where('class_id',$student->student_student_class)->first()
                    ->basic_id;
                        @endphp
                   {{\App\Models\BasicModel::where('basic_id',$basic_id)->first()->basic_name}}
                     </p>
                </div>
                <p>{{session()->get('ManagerSis')['name']}}
                </p>
                <div style="display: flex;
                      flex-direction: column;
                      justify-content: flex-end;">
                    <p>سال تحصیلی: 98</p>
                </div>

            </div>



        </div>

        <div class="card-body container ">
            <div class=" col-md-6 offset-md-3 ">
                    <div class="__table">
                            <div class="profile row">
                                <div class="col-sm-6 p-3">
                                    <div class="d-flex">
                                        <div class="">
                                            @if ($student->student_student_photo )
            
                                            <img src=" {{route('BaseUrl')}}/uploads/Teachers/Profile/{{$teacher->teacher_fullname}}/{{$teacher->teacher_profile}}"
                                                style="width: 100px;" class="img-thumbnail" alt="">
                                            @else
                                            <img src="{{route('BaseUrl')}}/Pannel/img/avatar.jpg" style="width: 100px;"
                                                class="img-thumbnail" alt="">
            
                                            @endif
                                        </div>
                                        <div class=" " style="margin: 10px 20px;">
                                            <div>
                                                {{$student->student_firstname .' - ' . $student->student_lastname}}
                                            </div>
                                            <div>
                                                {{$student->getClass->class_name}}
                                            </div>
                                        </div>
            
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered ">
                                    <thead>
                                        <tr>
                                            <th>نام درس</th>
                                            <th> ضریب درس</th>
                                            <th> نمره</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center" id="content-student">
                                        @php
                                        $sum_scores=[];
                                        $sum_zarib=[];
                                        @endphp
                                        @foreach ($report_card_lessons as $lesson)
                                        <tr>
                                            <td>{{$lesson->lesson_name}}</td>
                                            <td>{{$lesson->lesson_zarib}}</td>
                                            <td>
                                                @if($tt=\App\ReportCardStudentModel::where('report_card_id',$lesson->report_card_id)
                                                ->where('student_id',$student->student_id)
                                                ->where('report_card_lessons',$lesson->lesson_id)->first()
                                                )
                                                {{$tt->report_card_score}}
                                                @php
            
                                                array_push($sum_scores,$lesson->lesson_zarib * $tt->report_card_score);
                                                array_push($sum_zarib,$lesson->lesson_zarib);
            
            
                                                @endphp
                                                @else
                                                وارد نشده
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
            
                                </table>
                                <div class="text-center bg-secondary">
                                    <span>معدل: </span>
                                    <span>
                                        @php
                                        $Avg = array_sum($sum_scores) / array_sum($sum_zarib);
                                        echo $Avg;
            
            
                                        @endphp
            
                                    </span>
                                </div>
                            </div>
            
                        </div>
            </div>
        </div>
    </div>

    </div>




    <script>
        // window.addEventListener('load',function(){

//   window.print()
// })

    </script>
</body>

</html>