@extends('Layouts.Teachers.Template');

@section('content')
<div class="container-fluid">





    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3> وضعیت مطالعاتی </h3>
            {{-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>
                    <li class="breadcrumb-item"><a href="#">مطالعاتی</a></li>
                    <li class="breadcrumb-item active" aria-current="page">وضعیت مطالعاتی
                    </li>

                </ol>
            </nav> --}}
        </div>



    </div>




    <div class="card">
        <div class="card-header">
            <h6 class="text-muted">فرم شامل کلاس های مرتبط با معلم میشود</h6>
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

            <form id="form" action="  " method="post">
                @csrf

                <div class="row">
                    <div class=" form-group col-md-4 ">
                        <label for="" class="  pt-3"> <span class="text-danger">*</span> پایه </label>
                        <select id="basic" name="basic" class=" custom-select  mb-3">
                            <option value="  ">انتخاب مورد</option>
                            @php

                            $section =
                            \App\Models\School::where('school_id',auth()->guard('teacher')->user()->school_id)->first()->school_sections;

                            $basics = \App\Models\BasicModel::where('section_id',$section)->get();
                            @endphp
                            @foreach ($basics as $item)
                            <option value=" {{$item->basic_id}} ">{{$item->basic_name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>


                <div class="row date__picker">
                    <div class="col-md-5  ">

                        <label for="">از تاریخ</label>
                        <input type="text" id="case_start_date" name="case_start_date"
                            class="form-control text-right date-picker-shamsi-list" dir="ltr" autocomplete="off">
                    </div>
                    <div class="col-md-5  ">
                        <label for="">تا تاریخ</label>
                        <input type="text" id="case_end_date" name="case_end_date"
                            class="form-control text-right date-picker-shamsi-list" dir="ltr" autocomplete="off">

                    </div>

                </div>
                <div class="row">
                    <div class="form-group">
                        <label for="">نام درس: </label>
                        
                        <select class="custom-select" name="lesson_id" id="">
                            <option value="">باز کردن فهرست انتخاب</option>
                            @foreach ( as $item)
                                
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12  my-3 button__wrapper">

                        <button type="submit" class=" btn btn-primary"> نمایش</button>
                    </div>

                </div>


            </form>







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

console.log({basic,start_date,end_date})
$.ajax({

type:'POST',
url:'{{route("Teachers.WorkSpace.getStudyingReport")}}',
data:{
  basic:basic,
  start_date:start_date,
  end_date:end_date
},
success:function(data){
 
    $('#content').html(data)
    $('.button__wrapper').html(' <button type="submit" class=" btn btn-primary"> نمایش</button>')
   

},
        error:function(data){
   
            $('.button__wrapper').html(' <button type="submit" class=" btn btn-primary"> نمایش</button>')
       alert('لطفا ورودی ها را تکمیل کنید')
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