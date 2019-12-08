@extends('Layouts.Students.Template');

@section('content')
<div class="container-fluid">





    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3 style="color: #a4aac1;
            text-shadow: 0 1px 1px black;"> ثبت مطالعات</h3>
            {{-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>
                    <li class="breadcrumb-item"><a href="#">انضباطی</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">تعریف الگوی مطالعاتی</a>
                    </li>

                </ol>
            </nav> --}}
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

            @if(\Session::has('Error'))
            <div class="alert alert-danger">
                <p>
                    {{\Session::get('Error')}}
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

            <form action=" {{route('Student.WorkSpace.StudyingReportInsert')}} " method="post">
                @csrf
                <div class="mb-4">
                    <div class="row">
                        <div class="col-md-4  mb-3">

                            <label for=""> تاریخ انجام مطالعه </label>
                            <input type="text" value=" {{old('case_start_date')}} " name="studies_students_date"
                                class="form-control text-right date-picker-shamsi-list" dir="ltr" autocomplete="off">
                        </div>
                    </div>
                    <div class=" row">
                        <div class="col-md-6">
                            <h6 class="card-title mb-1">درس </h6>
                            <select name="lesson_id" id="lesson_id" class="custom-select  mb-3">
                               <option value="">باز کردن فهرست انتخاب</option>
                                @foreach ($lessons as $lesson)
                                <option value="{{$lesson->id}}">{{$lesson->lesson_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    
                            <div class="col-md-6">
                                <h6 class="card-title mb-1">الگوی مطالعه درس</h6>
                                <select name="study_model" id="study_model" class="custom-select  mb-3">
                                   
                                </select>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-md-6">
                                        <h6 class="card-title mb-1">میزان مطالعه شما بر حسب دقیقه: </h6>
                                        <input type="number" name="count" id="">
                                    </div>
                        </div>

                    <div class="row">
                        <div class="col-md-12  my-3">

                            <button type="submit" class=" btn btn-primary btn__info"> ثبت اطلاعات</button>
                        </div>
                    </div>


            </form>


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
          
    //    $('.btn__info').prop('disabled',true)
    //    $('.ee').blur(function(){

    //     if($(this).val() == ''){
    //     $('.btn__info').prop('disabled',true)
    //    }else{
    //     $('.btn__info').prop('disabled',false)
    //    }
    //    })
     
    $.ajaxSetup({

headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$("#lesson_id").change(function(e){
e.preventDefault();
var lesson_id = $(this).val();
$.ajax({

    type:'POST',
    url:'{{route("Students.WorkSpace.getStudyModel")}}',
    data:{lesson_id:lesson_id},
    success:function(data){
        console.log(data.length)
        if (data.length !== 51) {
            
            $('#study_model').html(data)
        }else{
            $('#study_model').html('<option value="0">الگوی فعالی برای این درس وجود ندارد</option>')
        }

    }

});

});


})
  


       
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