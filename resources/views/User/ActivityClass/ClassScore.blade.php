@extends('Layouts.Pannel.Template')
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
            <form action="{{route('activity_class.classScoreInsert')}}" method="post">
                @csrf
                <div class="row">
                    <div class=" form-group col-md-4 ">
                        <label for="" class="  pt-3"> <span class="text-danger">*</span> پایه </label>
                        <select id="basic" name="basic" class=" custom-select  mb-3">
                            <option value="  ">انتخاب مورد</option>
                            @php
                            $sis = session()->get('ManagerSis')['sections'];
                            if ($sis==4) {
                            $basics = \App\Models\BasicModel::where('section_id',2)->Orwhere('section_id',3)->get();
                            }else{
                            $basics = \App\Models\BasicModel::where('section_id', $sis )->get();
                            }
                            @endphp
                            @foreach ($basics as $item)
                            <option value="{{$item->basic_id}}" @if ( old('basic')==$item->basic_id )
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


                    <div class="col-md-4 mb-3">
                        <label for="">گروه ازمون</label>
                        <select name="examin_group" class="custom-select form-control custom-select-sm mb-3">
                            <option value="تکوینی 1">تکوینی 1</option>
                            <option value="پایانی 1">پایانی 1</option>
                            <option value="تکوینی 2">تکوینی 2</option>
                            <option value="پایانی 2">پایانی 2</option>
                            <option value="ماهانه مهر">ماهانه مهر</option>
                            <option value="ماهانه آبان">ماهانه آبان</option>
                            <option value="ماهانه بهمن">ماهانه بهمن</option>
                            <option value="ماهانه اسفند">ماهانه اسفند</option>
                            <option value="ماهانه اردیبهشت">ماهانه اردیبهشت</option>
                        </select>
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
                </div>
                <button class="btn btn-primary">
                    ثبت اطلاعات
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

                        if (data.length !== 0) {

                            $('#lesson').html(data)

                            }else{
                            $('#lesson').html('<option>درسی برای این پایه ثبت نشده است</option>')
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