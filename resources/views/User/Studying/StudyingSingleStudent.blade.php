@extends('Layouts.Pannel.Template');

@section('content')
<div class="container-fluid">





    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3> کارنامه دانش اموز </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>
                    <li class="breadcrumb-item"><a href="#">مطالعاتی</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">کارنامه دانش اموز</a>
                    </li>

                </ol>
            </nav>
        </div>
        


    </div>



    
        <div class="card">
       
            <div class=" card-header">


                        
            </div>
                <div class="card-body">
                 
        
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
                            <div class="col-sm-6 p-3 mb-5">
                                <div class="d-flex">
                                    <div class=" col-sm-6 col-md-3">
                                       @if ($student->student_student_photo )
                                       
                                    <img src=" {{route('BaseUrl')}}/uploads/students/{{$student->student_student_photo}}" style="width: 100px;" class="img-thumbnail" alt="">
                                        @else
                                        <img src="{{route('BaseUrl')}}/Pannel/img/avatar.jpg" style="width: 100px;" class="img-thumbnail" alt="">

                                       @endif
                                    </div>
                                    <div class="col-md-9 mt-3">
                                        <p class=" lead">{{$student->student_firstname .' _ '. $student->student_lastname}}</p>
                                        <p class="">کلاس {{$student->getClass->class_name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="table-responsive">
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
                                            $studyCount= $student->getStudies()->where('lesson_id',$lesson->id)->first()->studies_students_count;
                                        @endphp
                                    @else
                                            @php
                                                $studyCount =0;
                                            @endphp
                                    @endif




                                   @if($studyModel= \App\StudiesModel::where('lesson_id',$lesson->id)
                                   ->where('class_id',$student->getClass->class_id)
                                   ->first() != null)
                                       
                                    @php
                                    $studies_id= \App\StudiesModel::where('lesson_id',$lesson->id)
                                   ->where('class_id',$student->getClass->class_id)
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
 





<div id="content">

</div>












                               
                </div>
            </div>
        

    









</div>
@endsection

@section('js')
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/jquery.dataTables.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/dataTables.responsive.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/datatable.js"></script>
<!-- begin::datepicker -->
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.fa.min.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker/daterangepicker.js"></script>
<script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/datepicker.js"></script>
<!-- end::datepicker -->

<script>
        $(document).ready(function(e){
    
 $.ajaxSetup({

   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});


$("#form").submit(function(e){
e.preventDefault();
$('.button__wrapper').html('<button class="btn btn-primary" type="button" disabled> <span class="spinner-border spinner-border-sm m-l-5" role="status" aria-hidden="true"></span> در حال بارگذاری ... </button>')
var basic = $(this).find('#basic').val();
var start_date = $(this).find('#case_start_date').val();
var end_date = $(this).find('#case_end_date').val();

// console.log({basic,start_date,end_date})
$.ajax({

type:'POST',
url:'getStudyingReportList',
data:{
  basic:basic,
  start_date:start_date,
  end_date:end_date
},
success:function(data){
 
    $('#content').html(data)
    $('.button__wrapper').html(' <button type="submit" class=" btn btn-primary"> نمایش</button>')
   

}

       });

   });

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