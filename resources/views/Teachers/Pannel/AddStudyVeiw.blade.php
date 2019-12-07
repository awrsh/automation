@extends('Layouts.Teachers.Template');

@section('content')
<div class="container-fluid">





    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>تعریف الگوی مطالعاتی</h3>
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

            <form action=" {{route('Teachers.WorkSpace.InsertStudy')}} " method="post">
                @csrf
                <div class="mb-4">
                    <div class="row">
                        <div class=" form-group col-md-4">
                            <label for=""> عنوان الگو</label>
                            <input name="studies_name" type="text" class="form-control" placeholder=""
                                value=" {{old('studies_name')}} ">
                        </div>

                        <div class="col-md-6 text-center mt-4">
                            <label class="card-title mt-2 "> بازه زمانی :
                            </label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" value="یک سال" @if ( old('studies_date')=='یک سال' ) checked @endif
                                    id="customRadioInline1" name="studies_date" class="custom-control-input ">
                                <label class="custom-control-label" for="customRadioInline1"> یک سال </label>
                            </div>
                            {{-- <div class="custom-control custom-radio custom-control-inline">
                                                                      <input type="radio" value="شش ماه"  id="customRadioInline2" name="studies_date" class="custom-control-input"
                                                                      @if ( old('studies_date') == 'شش ماه' )
                                                                      checked
                                                                  @endif>
                                                                      <label class="custom-control-label" for="customRadioInline2"> شش ماه </label>
                                                                  </div> --}}
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" value="انتخاب بازه زمانی" id="customRadioInline3"
                                    name="studies_date" class="custom-control-input" @if (
                                    old('studies_date')=='انتخاب بازه زمانی' ) checked @endif>
                                <label class="custom-control-label" for="customRadioInline3"> انتخاب بازه زمانی </label>
                            </div>
                        </div>


                    </div>
                    <div class="row date__picker" style="display:none">
                        <div class="col-md-5  mt-2">

                            <label for="">از تاریخ</label>
                            <input type="text" value=" {{old('case_start_date')}} " name="case_start_date"
                                class="form-control text-right date-picker-shamsi-list" dir="ltr" autocomplete="off">
                        </div>
                        <div class="col-md-5  mt-2">
                            <label for="">تا تاریخ</label>
                            <input type="text" value=" {{old('case_end_date')}} " name="case_end_date"
                                class="form-control text-right date-picker-shamsi-list" dir="ltr" autocomplete="off">

                        </div>

                    </div>
                    <div class="row">
                        <div class=" form-group col-md-4 ">
                            <label for="" class="  pt-3"> <span class="text-danger">*</span> پایه </label>
                            <select id="basic" name="basic" class=" custom-select  mb-3">
                                <option value="  ">انتخاب مورد</option>
                                @php


                                $basics = \App\Models\BasicModel::where('section_id',$section_id)->get();

                                @endphp
                                @foreach ($basics as $item)
                                <option value="{{$item->basic_id}}" @if ( old('basic')==$item->basic_id )
                                    selected=""
                                    @endif>{{$item->basic_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class=" form-group col-md-4 ">
                            <label for="" class="  pt-3"> <span class="text-danger">*</span> درس: </label>
                            <select id="basic" name="lesson_name" class=" custom-select  mb-3">
                                <option value="  ">انتخاب مورد</option>
                                @php


                                $teacher_lessons = Auth::Guard('teacher')->user()->teacher_lessons()->get();


                                @endphp
                                @foreach ($teacher_lessons as $item)
                                <option value="{{$item->lesson_name}}" @if ( old('basic')==$item->basic_id )
                                    selected=""
                                    @endif>{{$item->lesson_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class=" form-group col-md-4 ">
                            <label for="" class="  pt-3"> <span class="text-danger">*</span> کلاس: </label>
                            <select id="basic" name="class_name" class=" custom-select  mb-3">
                                <option value="  ">انتخاب مورد</option>
                                @php


                                $teacher_lessons = Auth::Guard('teacher')->user()->teacher_lessons()->get();


                                @endphp
                                @foreach ($teacher_lessons as $item)
                                <option value="{{$item->class_name}}" @if ( old('basic')==$item->basic_id )
                                    selected=""
                                    @endif>{{$item->class_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class=" form-group col-md-4 ">
                                <label for="ww" class="  pt-3"> <span class="text-danger">*</span> حد مطلوب الگو (برحسب دقیقه) </label>
                               <input type="number" name="studies_count" id="ww" class="form-control">
                            </div>


                        {{-- <div class=" form-group col-md-4 ">
                            <label for="" class="  pt-3"> <span class="text-danger">*</span> کلاس </label>
                            <select id="class" name="class" class=" custom-select  mb-3">
                            </select>
                        </div> --}}

                        {{-- <div class=" form-group col-md-4 ">
                                                <label for="" class="  pt-3"> <span class="text-danger">*</span> درس </label>
                                                <select id="lesson" name="lesson" class=" custom-select  mb-3">
                                                  <option value="">انتخاب مورد</option>
                                                </select>
                                                </div> --}}


                    </div>

                    {{-- <div class=" row">
                                             <div class=" form-group col-md-6 form-inline">
                                                <label for="">مدت زمان بر حسب دقیقه (مثلا : 20)</label>
                                                <input type="text" name="studies_count" class=" form-control mr-2" value=" {{old('studies_count')}}
                    ">
                </div>
        </div> --}}
        <div id="lesson" class=" row">

        </div>



        <div class="row">
            <div class="col-md-12  mb-3">

                <button type="submit" class=" btn btn-primary"> افزودن مورد</button>
            </div>
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

         $('input[name=studies_date]').change(function(){
          if($(this).val() == 'انتخاب بازه زمانی'){
            $('.date__picker').fadeIn()
         }else{
          $('.date__picker').fadeOut()
         }
         })
      
//       $.ajaxSetup({

// headers: {
//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// }
// });

// $("#basic").change(function(e){
  
//     e.preventDefault();
  
//     var basic_id = $(this).val();

//     $.ajax({

//       type:'POST',
//       url:'{{route("Teachers.WorkSpace.getTeacherClasses")}}',
//       data:{basic_id:basic_id,},
//       success:function(data){
      
//         if (data !== '') {   
//         $('#class').html(data[0])
//         $('#lesson').html(data[1])
//         }
//       }

//     });

//   });

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