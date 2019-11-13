@extends('Layouts.Pannel.Template');

@section('content')

    <div class="container">
        <div class="row">
            <div class=" col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>


                @endif

                @if (\Session::has('success'))
                    <div class="alert alert-success text-center">
                        <p>{{ \Session::get('success') }}</p>
                    </div><br />
                @endif
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> ثبت نام دانش اموز</h5>
                        <form id="form1" method="post" action=" {{route('Student.Register')}} " enctype="multipart/form-data" class="needs-validation" novalidate>
                            <div id="wizard2">
                                @csrf

                                <section>

                                    <div class="row">
                                        <div class="form-group col-md-6 wd-xs-300">
                                            <label>نام</label>
                                            <input type="text" class="form-control"  id="firstname" name="firstname"  required>

                                        </div><!-- form-group -->
                                        <div class="form-group col-md-6 wd-xs-300">
                                            <label>نام خانوادگی</label>
                                            <input type="text" class="form-control"  name="lastname"  required>

                                        </div><!-- form-group -->
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6 wd-xs-300">
                                            <label>شماره شناسنامه</label>
                                            <input type="text" class="form-control"  name="certificate_number"  required>

                                        </div><!-- form-group -->
                                        <div class="form-group col-md-6 wd-xs-300">
                                            <label> کد ملی</label>
                                            <input type="text" class="form-control"  name="national_number"  required>

                                        </div><!-- form-group -->
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 wd-xs-300">
                                            <label>نام پدر</label>
                                            <input type="text" class="form-control"  name="father_name"  required>

                                        </div><!-- form-group -->
                                        <div class="form-group col-md-6 wd-xs-300">
                                            <label>  موبایل پدر</label>
                                            <input type="text" name="father_mobile" id="father_mobile" required class="form-control text-right" >

                                        </div><!-- form-group -->
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 wd-xs-300">
                                            <label> موبایل مادر</label>
                                            <input type="text" class="form-control"  id="mother_mobile" required name="mother_mobile"  >

                                        </div><!-- form-group -->
                                        <div class="form-group col-md-6 wd-xs-300">
                                            <label> تاریخ تولد</label>
                                            <input type="text" id="" name="birthday"  required class="form-control text-right date-picker-shamsi-list" dir="ltr" >

                                        </div><!-- form-group -->
                                    </div>

                                </section>
                                <section>


                                    <div class="row">





                                        <div class="form-group col-md-6 wd-xs-300">
                                            <label> مقطع دانش آموز</label>

                                            <select id="student_section" required name="student_section" class="custom-select mb-3">
                                                <option selected="">باز کردن فهرست انتخاب</option>
                                                @foreach (\App\models\SectionModel::all(); as $item)
                                                    <option value=" {{$item->sections_id}} ">{{$item->sections_name}}</option>
                                                @endforeach

                                            </select>
                                        </div><!-- form-group -->
                                        <div class="form-group col-md-6 wd-xs-300">
                                            <label>  پایه دانش آموز</label>

                                            <select id="student_basic"  required name="student_basic" class="custom-select mb-3">



                                            </select>
                                        </div><!-- form-group -->
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 wd-xs-300">
                                            <label> کلاس دانش آموز</label>
                                            <select required name="student_class" id="student_class" class="custom-select mb-3">
                                                <option selected="">باز کردن فهرست انتخاب</option>


                                            </select>
                                        </div><!-- form-group -->
                                        <div class="form-group col-md-6 wd-xs-300">
                                            <label>  شماره دانش اموزی</label>
                                            <input type="text"  name="student_number" required class="form-control text-right" dir="ltr" >

                                        </div><!-- form-group -->
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 wd-xs-300">
                                            <label> تلفن منزل</label>
                                            <input type="text"  name="home_tel" required class="form-control" >

                                        </div><!-- form-group -->
                                        <div class="form-group col-md-6 wd-xs-300">
                                            <label>   موبایل دانش اموز</label>
                                            <input type="text" name="student_mobile" required class="form-control text-right" dir="ltr" >

                                        </div><!-- form-group -->
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 wd-xs-300">
                                            <label> نام مدرسه قبلی</label>
                                            <input type="text"  name="prev_school" class="form-control" required >

                                        </div><!-- form-group -->
                                        <div class="form-group col-md-6 wd-xs-300">
                                            <label> اپلود عکس(3X4) </label>
                                            <input type="file" id="target"  name="student_photo"  class="form-control-file text-right" dir="rtl" >

                                        </div><!-- form-group -->
                                    </div>

                                    <div class="row">
                                        <div class=" form-group col-md-6">
                                            <button type="submit" class="btn btn-primary">ارسال</button>
                                        </div>
                                    </div>
                                </section>

                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>



@endsection


@section('css')

    <!-- begin::form wizard -->
    <link rel="stylesheet" href=" {{route('BaseUrl')}}/Pannel/assets/vendors/form-wizard/jquery.steps.css" type="text/css">
    <style>
        input.error{
            background: rgb(255, 255, 255) !important;
            border: 1px solid #ff5368 !important;
            color: #ed1636 !important;
        }
        .border-top { border-top: 1px solid #e5e5e5; }
        .border-bottom { border-bottom: 1px solid #e5e5e5; }
        .border-top-gray { border-top-color: #adb5bd; }

        .box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }

        .lh-condensed { line-height: 1.25; }

    </style>
    <!-- end::form wizard -->

    <!-- begin::datepicker -->
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker/daterangepicker.css">
    <!-- end::datepicker -->
@endsection

@section('js')
    <!-- begin::form wizard -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.js"></script>
    {{-- <script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/form-wizard.js"></script> --}}
    <script>

        (function () {
            'use strict';
            window.addEventListener('load', function () {
                var massage = " ورودی ها را کامل کنید";
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                            alert(massage);
                        }
                        form.classList.add('was-validated');

                    }, false);
                });
            }, false);

            $.ajaxSetup({

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#student_section").change(function(e){
                e.preventDefault();
                var student_section = $(this).val();
                $.ajax({

                    type:'POST',
                    url:'send_section',
                    data:{student_section:student_section},
                    success:function(data){
                        if (data !== '') {

                            $('#student_basic').html(data)
                        }else{
                            $('#student_basic').html('<option>برای مقطع مربوطه پایه ای وجود ندارد </option>')
                        }

                    }

                });

            });



            $("#student_basic").change(function(e){
                e.preventDefault();
                var student_class = $(this).val();
                $.ajax({

                    type:'POST',
                    url:'send_basic',
                    data:{student_class:student_class},
                    success:function(data){
                        console.log(data)
                        if (data !== '<option>انتخاب کنید </option>') {

                            $('#student_class').html(data)
                        }else{
                            $('#student_class').html('<option>برای مقطع مربوطه پایه ای وجود ندارد </option>')
                        }

                    }

                });

            });







        })();





    </script>
    <script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/toast.js"></script>
    <!-- end::form wizard -->



    <!-- begin::datepicker -->
    <script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.js"></script>
    <script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.fa.min.js"></script>
    <script src="{{route('BaseUrl')}}/Pannel/assets/vendors/datepicker/daterangepicker.js"></script>
    <script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/datepicker.js"></script>
    <!-- end::datepicker -->


@endsection
