@extends('Layouts.Pannel.Template')
@section('content')
    <div class="container-fluid">
        <!-- begin::page header -->
        <div class="page-header">
            <div>
                <h3>ثبت تکلیف کلاسی</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">صحفه اصلی</a></li>
                        <li class="breadcrumb-item"><a href="#">فعالیت کلاسی</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">ثبت تکلیف </a>
                        </li>

                    </ol>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                @if(\Session::has('success'))
                    <div class="alert text-center alert-success">
                        <p>  {{\Session::get('success')}}</p>
                    </div>
                    @endif
                <form action="{{route('activity_class.SubmitExerciseAdddaily')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class=" form-group col-md-4 ">
                            <label for="" class="  pt-3"> <span class="text-danger">*</span> عنوان تکلیف </label>
                            <input type="text"  name="title" class="form-control " >

                        </div>
                    </div>
                    <div class="row">

                        <div class=" form-group col-md-4 ">
                            <label for="" class="  pt-3"> <span class="text-danger">*</span> پایه </label>
                            <select id="basic" name="basic" class=" custom-select  mb-3">
                                <option value="  ">انتخاب مورد</option>
                                @php
                                    $sis = session()->get('ManagerSis')['sections'];
                                    if ($sis==4) {
                                      $basics =  \App\Models\BasicModel::where('section_id',2)->Orwhere('section_id',3)->get();
                                    }else{
                                      $basics =  \App\Models\BasicModel::where('section_id', $sis )->get();
                                    }
                                @endphp
                                @foreach ($basics as $item)
                                    <option value="{{$item->basic_id}}" @if ( old('basic') == $item->basic_id )
                                    selected=""
                                        @endif>{{$item->basic_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class=" form-group col-md-4 ">
                            <label for="" class="  pt-3"> <span class="text-danger">*</span> درس </label>
                            <select id="lesson" name="lesson" class=" custom-select  mb-3">
                                <option value="">انتخاب مورد</option>

                            </select>
                        </div>

                        <div class=" form-group col-md-4 ">
                            <label for="" class="  pt-3"> <span class="text-danger">*</span> کلاس </label>
                            <select id="class" name="class" class=" custom-select  mb-3">
                            </select>
                        </div>

                        <div class="col-md-4  mb-5">

                            <label for=""> تاریخ تحویل تکلیف</label>
                            <input type="text" value=" {{old('date')}} "  name="date" class="form-control  date-picker-shamsi-list" dir="ltr" autocomplete="off">
                        </div>

                     </div>
                    <button class="btn btn-primary">
                        ثبت تکلیف
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')

    <script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.js"></script>
    <script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.fa.min.js"></script>
    <script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker/daterangepicker.js"></script>
    <script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/datepicker.js"></script>
    <!-- end::datepicker -->

    <script>
        $(document).ready(function (e) {

            $.ajaxSetup({

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#basic").change(function (e) {

                e.preventDefault();

                var basic_id = $(this).val();

                $.ajax({

                    type: 'POST',
                    url: '../Studing/getStudyClasses',
                    data: {basic_id: basic_id,},
                    success: function (data) {

                        if (data !== '') {

                            $('#class').html(data[0])

                        }
                    }

                });

            });


            $("#basic").change(function (e) {

                e.preventDefault();

                var basic_id = $(this).val();

                $.ajax({

                    type: 'POST',
                    url: 'getlessens',
                    data: {basic_id: basic_id,},
                    success: function (data) {

                        if (data !== '') {

                            $('#lesson').html(data)

                        }
                    }

                });

            });

            $("#class").change(function (e) {

                e.preventDefault();

                var class_id = $(this).val();

                $.ajax({

                    type: 'POST',
                    url: 'getstudent',
                    data: {class_id: class_id,},
                    success: function (data) {

                        if (data !== '') {

                            $('#content-student').html(data)

                        }
                    }

                });

            });

        })


    </script>
@endsection
@section('css')
    <!-- begin::datepicker -->
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker/daterangepicker.css">
    <!-- end::datepicker -->
    <style>
        #ui-datepicker-div{
            z-index: 3000!important;
        }
    </style>
@endsection
