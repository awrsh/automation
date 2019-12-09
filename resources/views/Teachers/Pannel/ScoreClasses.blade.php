@extends('Layouts.Teachers.Template')
@section('content')
<div class="container-fluid">
    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3>ثبت نمره کلاسی</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">صحفه اصلی</a></li>
                    <li class="breadcrumb-item"><a href="#">فعالیت کلاسی</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">ثبت نمره کلاسی</a>
                    </li>

                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(\Session::has('success'))
            <div class="alert text-center alert-success">
                <p> {{\Session::get('success')}}</p>
            </div>
            @endif

            @if(\Session::has('Error'))
            <div class="alert text-center alert-danger">
                <p> {{\Session::get('Error')}}</p>
            </div>
            @endif
            <form action="{{route('Teachers.WorkSpace.InsertClassScores')}}" method="post">
                @csrf
                <div class="row">


                    <div class="form-group col-md-5">
                        <label for="">نام درس: </label>

                        <select class="custom-select" name="lesson_id" id="lesson_id">
                            <option value="">باز کردن فهرست انتخاب</option>

                            @foreach(array_unique(auth()->guard('teacher')->user()->teacher_lessons()->pluck('lesson_name','lesson_id')->toArray())
                            as $key=>$item)
                            );

                            <option value="{{$key}}">{{$item}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-5">
                        <label for="">نام کلاس: </label>

                        <select class="custom-select" name="class_id" id="class_id">
                            <option value="">باز کردن فهرست انتخاب</option>
                            @foreach(array_unique(auth()->guard('teacher')->user()->teacher_lessons()->pluck('class_name','class_id')->toArray())
                            as $key=>$item)
                            <option value="{{$key}}">{{$item}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4  mb-3">

                        <label for=""> آزمون: </label>
                        <select class="custom-select" name="azmoon_group" id="azmoon_group">
                            <option value="">باز کردن فهرست انتخاب</option>
                            <option value="تکوینی 1">تکوینی 1</option>
                            <option value="پایانی 1">پایانی 1</option>
                            <option value="تکوینی 2">تکوینی 2</option>
                            <option value="پایانی 2">پایانی 2</option>
                            <option value="ماهانه مهر">ماهانه مهر</option>
                            <option value="ماهانه آبان">ماهانه آبان</option>
                            <option value="ماهانه بهمن">ماهانه بهمن</option>
                            <option value="ماهانه اسفند">ماهانه اسفند</option>
                            <option value="ماهانه اردیبهشت">ماهانه اردیبهشت</option>

                        </select> </div>
                </div>



                <div class="table-responsive">
                    <table class="table table-striped table-bordered  ">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>نام و نام خانوادگی</th>
                                <th>نام پدر</th>
                                <th>نمره</th>
                            </tr>
                        </thead>
                        <tbody class="text-center" id="content-student">
                        </tbody>
                    </table>

                </div>
                <div class="row">
                    <div class="col-md-4  mb-3 ">
                        <button class="btn btn-primary btn__submit " disabled="">
                            وارد کردن
                        </button>
                    </div>
                </div>
        </div>
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

            $("#class_id").change(function (e) {

                e.preventDefault();


                $('.btn__submit').attr('disabled',false)
                var class_id = $(this).val();

                $.ajax({

                    type: 'POST',
                    url: '{{route("Teachers.WorkSpace.getStudents")}}',
                    data: {class_id: class_id,},
                    success: function (data) {


                            $('#content-student').html(data)


                        
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

                            $('#content-student').html(data)

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
    #ui-datepicker-div {
        z-index: 3000 !important;
    }
</style>
@endsection