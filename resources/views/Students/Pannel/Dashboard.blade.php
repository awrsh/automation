@extends('Layouts.Students.Template');

@section('content')
<div class="container-fluid">





    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3 style="color: #b1a3a3;
            text-shadow: 0 1px 1px black;"> داشبورد </h3>
            {{-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>
                    <li class="breadcrumb-item"><a href="#">مطالعاتی</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">کارنامه دانش اموز</a>
                    </li>

                </ol>
            </nav> --}}
        </div>
   
    </div>

        <div class="card">
       
            <div class=" card-header">


                    @if(\Session::has('success'))
                    <div class="alert alert-success">
                    <p>
                      {{\Session::get('success')}}
                    </p>
                    </div>
                    @endif
    
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif


                    <div class="profile row">
                            <div class="col-sm-6 p-3">
                                <div class="d-flex">
                                    <div class=" col-sm-6 col-md-3">
                                       @if ($student->student_student_photo )
                                       
                                    <img src=" {{route('BaseUrl')}}/uploads/students/{{$student->student_student_photo}}" style="width: 100px;" class="img-thumbnail" alt="">
                                        @else
                                        <img src="{{route('BaseUrl')}}/Pannel/img/avatar.jpg" style="width: 100px;" class="img-thumbnail" alt="">

                                       @endif
                                    </div>
                                    <div class="col-md-9 ">
                                        <p class=" lead">{{$student->student_firstname .' _ '. $student->student_lastname}}</p>
                                        <p class="">کلاس {{$student->getClass->class_name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
            </div>
                <div class="card-body">
                 
                    <div class=" mb-5">
                            <h5>
                                    میزان مطالعه یک هفته گذشته شما
                            </h5>
                    </div>
                        
                    <div class=" row">
                           <div class=" col-md-12">
                                <canvas id="chart_demo_4"></canvas>
                           </div>

                    </div>
                                   
                    
        
                        {{-- <div class="table-responsive">
                            <table class="table">
                                <thead class=" thead-light">
                                <tr>
                                        		 		
                                    <th scope="col">درس</th>
                                    <th scope="col">میزان مطالعه (دقیقه)</th>
                                    <th scope="col">حد مطلوب مطالعه(دقیقه)</th>
                                    <th scope="col">وضعیت</th>
                                </tr>
                                </thead>
                                <tbody>
                              


                                    @foreach ($lessons as $lesson)
                  
                                    
                                    @if($studyStudentList= $student->getStudies()->where('lesson_id',$lesson->id)->first() != null)
                                       
                                        @php
                                            $studyCount= $user->getStudies()->where('lesson_id',$lesson->id)->first()->studies_students_count;
                                        @endphp
                                    @else
                                            @php
                                                $studyCount =0;
                                            @endphp
                                    @endif




                                   @if($studyModel= \App\StudiesModel::where('lesson_id',$lesson->id)
                                   ->where('class_id',$user->getClass->class_id)
                                   ->first() != null)
                                       
                                    @php
                                    $studies_id= \App\StudiesModel::where('lesson_id',$lesson->id)
                                   ->where('class_id',$user->getClass->class_id)
                                   ->first()->id;
                                      
                                        $StudyNormalCount= \App\StudiesModel::where('id',$studies_id)->first()->studies_count;
                                    @endphp
                                   @else
                                        @php
                                            $StudyNormalCount =0;
                                        @endphp
                                   @endif
                                    <tr>
                                        <td scope="row"> {{$lesson->lesson_name}} </td>
                                        <td>{{$studyCount}}</td>
                                        <td>{{ $StudyNormalCount}}</td>
                                        @if ($studyCount > $StudyNormalCount)
                                            <td>
                                                مطلوب
                                            </td>
                                            @else
                                            <td>
                                                    نامطلوب
                                                </td>
                                            @endif
                                        
                                        
                                   </tr>
                                    @endforeach




                                   
                               
                             
                                </tbody>
                            </table>
                        </div>       
  --}}

















                               
                </div>
            </div>
        

    









</div>
@endsection

@section('js')

<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/charts/chart.min.js"></script>{{-- <script src="{{route('BaseUrl')}}/Pannel/assets/vendors/charts/charts.js"></script> --}}
<script>
$(document).ready(function () {
	
	Chart.defaults.global.defaultFontFamily = '"primary-font", "segoe ui", "tahoma"';

    var chartColors = {
        primary: {
            base: '#3f51b5',
            light: '#c0c5e4'
        },
        danger: {
            base: '#f2125e',
            light: '#fcd0df'
        },
        success: {
            base: '#0acf97',
            light: '#cef5ea'
        },
        warning: {
            base: '#ff8300',
            light: '#ffe6cc'
        },
        info: {
            base: '#00bcd4',
            light: '#e1efff'
        },
        dark: '#37474f',
        facebook: '#3b5998',
        twitter: '#55acee',
        linkedin: '#0077b5',
        instagram: '#517fa4',
        whatsapp: '#25D366',
        dribbble: '#ea4c89',
        google: '#DB4437',
        borderColor: '#e8e8e8',
        fontColor: '#999'
    };
    chart_demo_4();
    function chart_demo_4() {
       console.log()
        if ($('#chart_demo_4').length) {
            var ctx = document.getElementById("chart_demo_4").getContext("2d");
            var densityData = {
                backgroundColor: chartColors.success.base,
                data: <?php echo json_encode($study_count); ?> ,
                label: "میزان مطالعه برحسب دقیقه میباشد"
            };
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($lessons_name); ?> ,
                    datasets: [densityData]
                },
                options: {
                    scaleFontColor: "#FFFFFF",
                    legend: {
                        display: true,
                        labels: {
                            fontColor: chartColors.fontColor
                        }
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor,
                                min: 0,
                                max: 100,
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    }
});

</script>
@endsection
@section('css')
<link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/responsive.bootstrap.min.css"
    type="text/css">
    
    <!-- begin::datepicker -->
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker/daterangepicker.css">
    <!-- end::datepicker -->

@endsection