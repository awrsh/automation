@extends('Layouts.Students.Template');

@section('content')
<div class="container-fluid">
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3 style="color: #b1a3a3;
            text-shadow: 0 1px 1px black;"> گزارش انظباطی دانش اموز </h3>
            {{-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>
                    <li class="breadcrumb-item"><a href="#">مطالعاتی</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">گزارش انظباطی دانش اموز</a>
                    </li>

                </ol>
            </nav> --}}
        </div>
        


    </div>



    
        <div class="card">
            <div class=" card-header">
                <h6 >
                    لیست موارد انظباطی 
                </h6>
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

                        {{-- <div class="profile row">
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
                            
                        </div> --}}
        
                      

                @if (count($student->getCasesLaw))
                <div class="accordion custom-accordion">
                        @foreach ($student->getCasesLaw as $key=>$case)
                        <div class="accordion-row {{$key == 0 ? 'open':''}}">
                            <a href="#" class="accordion-header">
                                <span>عنوان: {{\App\Models\DisciplineLawsModel::where('law_id',$case->law_id)->first()->law_title }} 
                                </span>
                                <span>تاریخ: {{\Morilog\Jalali\Jalalian::forge($case->case_date)->format('%B %d، %Y')}}</span>
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

@endsection

@section('css')

@endsection