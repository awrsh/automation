@extends('Layouts.Teachers.Template');

@section('content')
<div class="container-fluid">





    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3> گزارش انظباطی دانش اموز </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                   
                <li class="breadcrumb-item"><a href="{{ route('Teachers.WorkSpace.DisciplineList') }}">گزارش انظباطی</a></li>
                    <li class="breadcrumb-item active" aria-current="page" >گزارش انظباطی دانش اموز
                    </li>

                </ol>
            </nav>
        </div>
        


    </div>



    
        <div class="card">
       
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
                            <div class=" col-sm-6">
                              
                                                                
                                <div class="text-left">
                                  <a href="#" class=" btn btn-sm btn-secondary">دریافت pdf</a>
                             
                                </div>
                             
                            </div>
                        </div>
        
                         
                        
                        

                       


                @if (count($student->getCasesLaw))
                <div class="accordion custom-accordion">
                        @foreach ($student->getCasesLaw as $key=>$case)
                        <div class="accordion-row {{$key == 0 ? 'open':''}}">
                            <a href="#" class="accordion-header">
                                <span>{{\App\Models\DisciplineLawsModel::where('law_id',$case->law_id)->first()->law_title }} 
                                </span>
                                <span>{{\Morilog\Jalali\Jalalian::forge($case->case_date)->format('%B %d، %Y')}}</span>
                                <i class="accordion-status-icon close fa fa-chevron-up"></i>
                                <i class="accordion-status-icon open fa fa-chevron-down"></i>
                            </a>
                            <div class="accordion-body">
                                <p> {{ $case->case_descriotion}}  </p>
                                
                            </div>
                        </div>
                        @endforeach
  
                </div>  
                @else
                <p>مورد انظباطی ثبت نشده است</p>
                @endif
                                
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

@endsection

@section('css')
<link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/dataTable/responsive.bootstrap.min.css"
    type="text/css">
    
    <!-- begin::datepicker -->
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker/daterangepicker.css">
    <!-- end::datepicker -->
<style>
.breadcrumb-item.active {
    color: #04d67f;
}
</style>
@endsection